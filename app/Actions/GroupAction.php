<?php


namespace App\Actions;

use Exception;
use Carbon\Carbon;
use App\Models\User;
use App\Models\Group;
use App\Models\Office;
use App\Models\Client;
use App\Models\GroupClient;
use App\Traits\ApiResponser;
use Illuminate\Http\Request;
use App\Models\ClientBioData;
use App\Helpers\CountryHelper;
use App\Services\GroupService;
use Illuminate\Http\JsonResponse;
use App\Http\Requests\GroupRequest;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;
use App\Http\Resources\GroupResource;
use Illuminate\Database\QueryException;
use App\Http\Requests\GroupUpdateRequest;
use App\Http\Requests\GroupClientRequest;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Symfony\Component\HttpFoundation\Response;

class GroupAction
{
    use ApiResponser;

    public function listGroups(Request $request): JsonResponse
    {
        try{
            $groups = Group::query()->with('sessions','groupType');
            $filter = $request->get('filter');
            $name = $request->get('name');
            $project = $request->get('project_id');
            $lastSession = $request->get('last_session');
            $staff = $request->get('staff');
            $sort   = $request->get('sort');
            $filterParams = ['staff','ongoing','group_member'];
            $sortParams = ['name','last_session','date'];
            $paginationItems = $request->get('pagination_items');

            //get the user id and name from staff_id
            $user = User::select('id','name')->firstWhere(function (Builder $query) use($staff){
                $query->where('name','ILIKE','%'.$staff.'%');
            });

            //search by name
            if($request->has('name') && $request->filled('name')){
                $groups = $groups->where(function (Builder $query) use($name){
                    $query->where('name','ILIKE','%'.$name.'%');
                });
            }

            //search by last_session
            if($request->has('last_session') && $request->filled('last_session')){
                $groups = $groups->where(function (Builder $query) use($lastSession){
                    $query->where('last_session','=', Carbon::parse($lastSession)->format('d M Y'));
                });
            }

            //filter by project
            if($request->has('project_id') && $request->filled('project_id')){
                $groups = $groups->where(function (Builder $query) use($project){
                    $query->where('project_id','=', $project);
                });
            }

            //search by staff name
            if($request->has('staff') && $request->filled('staff')){
                if($user){
                    $groups =  $groups->where(function(Builder $query) use($user){
                        $query->where('staff_id','=',$user->id);
                    });
                }else{
                    return $this->commonResponse(false,'Staff Not Found','', Response::HTTP_NOT_FOUND);
                }
            }

            if($request->has('sort') && $request->filled('sort')){
                //sort by name
                if($sort === $sortParams[0]){
                    $groups = $groups->orderBy('name','DESC');
                }elseif ($sort === $sortParams[1]){ //sort by last_session
                    $groups = $groups->orderBy('last_session','DESC');
                }elseif ($sort === $sortParams[2]){ //sort by creation date
                    $groups = $groups->orderBy('created_at','DESC');
                }
            }

            //custom pagination
            if($request->has('pagination_items') && $request->filled('pagination_items')){
                $groups = Group::query()->with('sessions','groupType')->latest()->paginate((int)$paginationItems);
                return $this->commonResponse(true,'Success',
                    GroupResource::collection($groups)->response()->getData(true),
                    Response::HTTP_OK);
            }

            $groups = $groups->latest()->paginate(10);
            return $this->commonResponse(true,'Success', GroupResource::collection($groups)->response()->getData(true), Response::HTTP_OK);
        }catch (QueryException $queryException){
            return $this->commonResponse(false,$queryException->errorInfo[2],'', Response::HTTP_UNPROCESSABLE_ENTITY);
        }catch (Exception $exception){
            Log::critical('Failed to list groups. ERROR: '.$exception->getTraceAsString());
            return $this->commonResponse(false,$exception->getMessage(),'', Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    public function createGroup(GroupRequest $request): JsonResponse
    {
        try{
            $office = Office::findOrFail($request->office_id);
            if($newGroup = Group::create(array_merge($request->validated(),
                ['staff_id' => auth()->id(),
                    'last_session' => null,
                ]))){
                $countryCode = CountryHelper::getCountyCodeByOffice($office->id);
                $newGroup->update([
                    'group_id' => $countryCode->long_code.'-'.Carbon::now()->format('y').'-'.$newGroup->id
                ]);
                $groupItem = Group::with('sessions','staff','groupType','attendance')->findOrFail($newGroup->id);
                $user = Auth::user();
                activity('group')
                ->performedOn($groupItem)
                ->causedBy($user)
                ->log('Created group '.$groupItem->name);
                return $this->commonResponse(true,'Group Created Successfully',GroupService::viewGroupDetails($groupItem), Response::HTTP_CREATED);
            }
            return $this->commonResponse(false,'Failed to create group','', Response::HTTP_UNPROCESSABLE_ENTITY);
        }catch (ModelNotFoundException $exception){
            return $this->commonResponse(false,$exception->getMessage(),'', Response::HTTP_NOT_FOUND);
        }
        catch (QueryException $queryException){
            return $this->commonResponse(false,$queryException->errorInfo[2],'', Response::HTTP_UNPROCESSABLE_ENTITY);
        }catch (Exception $exception){
            return $this->commonResponse(false,$exception->getMessage(),'', Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    public function viewGroupItem(int $id): JsonResponse
    {
        try{
            $group = Group::with('sessions','staff','groupType','attendance','clients')->findOrFail($id);
            return $this->commonResponse(false,'Success',  GroupService::viewGroupDetails($group) ,Response::HTTP_OK);
        }catch (QueryException $queryException){
            return $this->commonResponse(false,$queryException->errorInfo[2],'', Response::HTTP_UNPROCESSABLE_ENTITY);
        }catch (ModelNotFoundException $exception){
            return $this->commonResponse(false,'Group Does Not Exist','', Response::HTTP_NOT_FOUND);
        }
        catch (Exception $exception){
            Log::critical('Failed to display group details. ERROR: '.$exception->getTraceAsString());
            return $this->commonResponse(false,$exception->getMessage(),'',Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    public function terminateGroup(int $id): JsonResponse
    {
        try{
            $group = Group::with('sessions','staff','groupType','attendance')->findOrFail($id);
            if($group->ongoing === Group::SESSION_TERMINATED){
                return $this->commonResponse(false,'Group Session is terminated, no action required',GroupService::getGroupData($group), Response::HTTP_UNPROCESSABLE_ENTITY);
            }
            $group->update(['ongoing' => Group::SESSION_TERMINATED]);
            $user = Auth::user();
            activity('group')
            ->performedOn($group)
            ->causedBy($user)
            ->log('Terminated group '.$group->name);
            return $this->commonResponse(true,'Group terminated successfully',GroupService::viewGroupDetails($group), Response::HTTP_OK);
        }
        catch (ModelNotFoundException $exception){
            return $this->commonResponse(false,'Group Does Not Exist','', Response::HTTP_NOT_FOUND);
        }
        catch (QueryException $queryException){
            return $this->commonResponse(false,$queryException->errorInfo[2],'', Response::HTTP_UNPROCESSABLE_ENTITY);
        }
        catch (Exception $exception){
            return $this->commonResponse(false,$exception->getMessage(),'', Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    public function updateGroupItem(GroupUpdateRequest $request, int $id): JsonResponse
    {
        try {
            $group = Group::with('sessions','staff','groupType','attendance')->findOrFail($id);
            $office_id = $request->office_id ?? $group->office_id;
            $office = Office::findOrFail($office_id);
            $countryCode = null;
            if($office){
                $countryCode = CountryHelper::getCountyCodeByOffice($office->id);
            }
            $group->update(array_merge($request->validated(),
            [
                'name' => $request->name ?? $group->name,
                'group_type_id' => $request->group_type_id ?? $group->group_type_id,
                'last_session' => $request->last_session !== null ? Carbon::parse($request->last_session)->format('d M Y') : $group->last_session,
                'office_id' => $request->office_id ?? $group->office_id,
                'project_id' => $request->project_id ?? $group->project_id,
                'cycle_id' => $request->cycle_id ?? $group->cycle_id,
                'fascilitator_id' => $request->fascilitator_id ?? $group->fascilitator_id,
                'supervisor_id' => $request->supervisor_id ?? $group->supervisor_id,
                'therapy_mode_id' => $request->therapy_mode_id ?? $group->therapy_mode_id,
                'mode_of_delivery_id' => $request->mode_of_delivery_id ?? $group->mode_of_delivery_id,
                'group_allocation_date' => $request->group_allocation_date !== null ? Carbon::parse($request->group_allocation_date)->format('d M Y') : $group->group_allocation_date,
                'group_id' => $request->office_id !== null ? $countryCode->long_code.'-'.Carbon::now()->format('y').'-'.$group->id : $group->group_id
            ]));
            $user = Auth::user();
            activity('group')
            ->performedOn($group)
            ->causedBy($user)
            ->log('Updated group '.$group->name);
            return $this->commonResponse(true, 'Group Updated Successfully', GroupService::viewGroupDetails($group), Response::HTTP_OK);
        }
        catch (ModelNotFoundException $exception) {
            return $this->commonResponse(false, $exception->getMessage(), '', Response::HTTP_NOT_FOUND);
        }
        catch (QueryException $exception) {
            return $this->commonResponse(false, $exception->errorInfo[2], '', Response::HTTP_UNPROCESSABLE_ENTITY);
        } catch (Exception $exception) {
            return $this->commonResponse(false, $exception->getMessage(), '', Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    public function deleteGroup(int $id): JsonResponse
    {
        try{
            $group = Group::with('sessions','staff','groupType','attendance')->findOrFail($id);
            $group->delete();
            $user = Auth::user();
            activity('group')
            ->performedOn($group)
            ->causedBy($user)
            ->log('Deleted group '.$group->name);
            return $this->commonResponse(true,'Group Deleted Successfully','', Response::HTTP_OK);
        }catch (ModelNotFoundException $exception){
            return $this->commonResponse(false,'Group Does Not Exist','', Response::HTTP_NOT_FOUND);
        }
        catch (QueryException $exception){
            return $this->commonResponse(false,$exception->errorInfo[2],'', Response::HTTP_UNPROCESSABLE_ENTITY);
        }catch (Exception $exception){
            return $this->commonResponse(false,$exception->getMessage(),'', Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    public function addClientsToGroup(GroupClientRequest $request, int $id): JsonResponse
    {
        try{
            $clientIds = [];
            foreach (explode(',', $request->client_id) as $client_id) {
                array_push($clientIds,(int)$client_id);
            }
            $existing = GroupClient::select('client_id')->where('group_id', $id)->get();
            $existingClients = [];


            foreach ($existing as $client){
                array_push($existingClients,$client->client_id);
            }

            $clients = Client::whereIn('id', $clientIds)->get();
            $group = Group::findOrFail($id);

            foreach ($clients as $client){
                if (!in_array($client->id, $existingClients)){
                    GroupClient::create(
                        [
                            'client_id' => $client->id,
                            'group_id'  => $group->id
                        ]
                    );
                }
            }
            $user = Auth::user();
            activity('group')
                ->performedOn($group)
                ->causedBy($user)
                ->log('Add clients to group '.$group->name);

            $groupClients = GroupClient::select('client_id')->where('group_id', $id)->count();
            $group->total_clients = $groupClients;
            $group->save();

            return $this->commonResponse(true,'Clients Added Successfully',GroupService::viewGroupDetails($group), Response::HTTP_CREATED);
        }catch (ModelNotFoundException $exception){
            return $this->commonResponse(false,'Group Does Not Exist','', Response::HTTP_NOT_FOUND);
        }
        catch (QueryException $exception){
            return $this->commonResponse(false,$exception->errorInfo[2],'', Response::HTTP_UNPROCESSABLE_ENTITY);
        }catch (Exception $exception){
            return $this->commonResponse(false,$exception->getMessage(),'', Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    public function listClientsByGroupId(int $id): JsonResponse
    {
        try{
            $group = Group::with('clients','sessions','attendance')->findOrFail($id);
            $groupClientData = $group->clients->transform(function($client) use($group){
                $clientBioData = ClientBioData::select('client_id','first_name','last_name')->firstWhere(function(Builder $query) use($client) {
                    $query->where('client_id', $client->client_id);
                });
                return [
                    'groupId' => $group->id,
                    'clientId' => $clientBioData->client_id,
                    'clientName' => $clientBioData->first_name .' '.$clientBioData->last_name,
                    'sessions' => $group->sessions->filter(function($session) use($group){
                        return $session->group_id === $group->id;
                    })->transform(function($session) use($clientBioData, $group){
                        $attendance = $group->attendance->filter(function($attendance) use($session, $clientBioData){
                            return $attendance->session_id === $session->id && $attendance->client_id === $clientBioData->client_id;
                        })->transform(function($data){
                            return [
                                'attended' => $data->attended ,
                                'reason' => $data->reason
                            ];
                        });
                        return [
                            'sessionId' => $session->id,
                            'sessionDate' => $session->session_date ,
                            'attendance' => $attendance
                        ];
                    })
                ];
            });
            return $this->commonResponse(true,'success',$groupClientData, Response::HTTP_OK);
        }catch (ModelNotFoundException $exception){
            return $this->commonResponse(false,'Group Does Not Exist','', Response::HTTP_NOT_FOUND);
        }
        catch (QueryException $exception){
            return $this->commonResponse(false,$exception->errorInfo[2],'', Response::HTTP_UNPROCESSABLE_ENTITY);
        }catch (Exception $exception){
            return $this->commonResponse(false,$exception->getMessage(),'', Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    public function listClientsByStaff(int $id): JsonResponse
    {
        try {
            $group = Group::with('clients','sessions','attendance')->findOrFail($id);
            $groupClientData = $group->clients->transform(function($client) use($group){
                $clientBioData = ClientBioData::select('client_id','first_name','last_name')->firstWhere(function(Builder $query) use($client){
                    $query->where('client_id', $client->client_id);
                });
                return [
                    'group_id' => $group->id,
                    'client_id' => $clientBioData->client_id,
                    'name' => $clientBioData->first_name .' '.$clientBioData->last_name,
                    'sessions' => $group->sessions->filter(function($session) use($group){
                        return $session->group_id === $group->id;
                    })->transform(function($session) use($clientBioData, $group){
                        $attendance = $group->attendance->filter(function($attendance) use($session, $clientBioData){
                            return $attendance->session_id === $session->id && $attendance->client_id === $clientBioData->client_id;
                        })->transform(function($data){
                            return [
                                'attended' => $data->attended,
                                'reason' => $data->reason
                            ];
                        });
                        return [
                            'sessionId' => $session->id,
                            'sessionDate' => $session->session_date,
                            'attendance' => $attendance
                        ];
                    })
                ];
            });
            return $this->commonResponse(true,'success',$groupClientData, Response::HTTP_OK);
        } catch (ModelNotFoundException $exception) {
            return $this->commonResponse(false, 'Group Does Not Exist', '', Response::HTTP_NOT_FOUND);
        } catch (QueryException $exception) {
            return $this->commonResponse(false, $exception->errorInfo[2], '', Response::HTTP_UNPROCESSABLE_ENTITY);
        } catch (Exception $exception) {
            return $this->commonResponse(false, $exception->getMessage(), '', Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

}
