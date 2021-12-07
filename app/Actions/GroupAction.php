<?php


namespace App\Actions;


use App\Helpers\CountryHelper;
use App\Http\Requests\GroupClientRequest;
use App\Http\Requests\GroupRequest;
use App\Http\Requests\GroupUpdateRequest;
use App\Http\Requests\SessionAttendanceRequest;
use App\Models\Client;
use App\Models\ClientBioData;
use App\Models\Group;
use App\Models\GroupClient;
use App\Models\GroupSession;
use App\Models\Office;
use App\Models\SessionAttendance;
use App\Services\GroupService;
use App\Traits\ApiResponser;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Database\QueryException;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Log;
use Symfony\Component\HttpFoundation\Response;
use Exception;

class GroupAction
{
    use ApiResponser;

    public function listGroups(): JsonResponse
    {
        try{
            $groups = Group::with('sessions')
                ->latest()
                ->get()
                ->transform(function ($group){
                    return GroupService::getGroupData($group);
            });
            return $this->commonResponse(true,'Success',$groups, Response::HTTP_OK);
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
                return $this->commonResponse(true,'Group Created Successfully',GroupService::viewGroupDetails($newGroup), Response::HTTP_CREATED);
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
            $group = Group::with('sessions','staff','groupType','attendance')->findOrFail($id);
            return $this->commonResponse(false,'Success',GroupService::viewGroupDetails($group),Response::HTTP_OK);
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
            $group = Group::with('sessions','clients','staff','groupType','attendance')->findOrFail($id);
            $clients = Client::whereIn('id', $request->client_id)->get();
            foreach ($clients as $client){
                GroupClient::create(
                    [
                        'client_id' => $client->id,
                        'group_id'  => $group->id
                    ]
                );
            }
            $group->update([
                'total_clients' => $group->clients->count()
            ]);
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
                $clientBioData = ClientBioData::select('id','first_name','last_name')->firstWhere(function(Builder $query) use($client) {
                    $query->where('client_id', $client->client_id);
                });
                return [
                    'group_id' => $group->id,
                    'client_id' => $clientBioData->id,
                    'name' => $clientBioData->first_name .' '.$clientBioData->last_name,
                    'sessions' => $group->sessions->filter(function($session) use($group){
                        return $session->group_id === $group->id;
                    })->transform(function($session) use($clientBioData, $group){
                        $attendance = $group->attendance->filter(function($attendance) use($session, $clientBioData){
                            return $attendance->session_id === $session->id && $attendance->client_id === $clientBioData->id;
                        })->first();
                        return [
                            'sessionId' => $session->id,
                            'sessionDate' => $session->session_date !== null ? Carbon::parse($session->session_date)->format('d M Y') : null,
                            'attended' => $attendance->attended ?? null,
                            'reason' => $attendance->reason ?? null
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
                $clientBioData = ClientBioData::select('id','first_name','last_name')->firstWhere(function(Builder $query) use($client){
                    $query->where('client_id', $client->client_id);
                });
                return [
                    'group_id' => $group->id,
                    'client_id' => $clientBioData->id,
                    'name' => $clientBioData->first_name .' '.$clientBioData->last_name,
                    'sessions' => $group->sessions->filter(function($session) use($group, $client){
                        return $session->group_id === $group->id;
                    })->transform(function($session) use($clientBioData, $group){
                        $attendance = $group->attendance->filter(function($attendance) use($session, $clientBioData){
                            return $attendance->session_id === $session->id && $attendance->client_id === $clientBioData->id;
                        })->first();
                        //dd($attendance->attended);
                        return [
                            'sessionId' => $session->id,
                            'sessionDate' => $session->session_date !== null ? Carbon::parse($session->session_date)->format('d M Y') : null,
                            'attended' => $attendance->attended ?? null,
                            'reason' => $attendance->reason ?? null
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
