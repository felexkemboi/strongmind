<?php


namespace App\Actions;


use App\Helpers\CountryHelper;
use App\Http\Requests\GroupRequest;
use App\Http\Requests\GroupUpdateRequest;
use App\Models\Group;
use App\Models\Office;
use App\Traits\ApiResponser;
use Carbon\Carbon;
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
            $groups = Group::with('groupType','staff','sessions','therapyMode','deliveryMode','supervisor','fascilitator','cycle','project','office')
                ->latest()
                ->get()
                ->transform(function ($group){
                return [
                    'id' => $group->id,
                    'group_id' => $group->group_id,
                    'name' => $group->name,
                    'sessions' => $group->sessions->transform(function($session){
                        return $session->session_date;
                    }),
                    'last_session' => $group->last_session !== null ? Carbon::parse($group->last_session)->format('d M Y') : null,
                    'ongoing' => $group->ongoing === Group::SESSION_ONGOING ? 'Ongoing' : 'Terminated',
                    'therapy_mode_id' => $group->therapy_mode_id,
                    'office_id' => $group->office_id,
                    'project_id' => $group->project_id,
                    'cycle_id' => $group->cycle_id,
                    'fascilitator_id' => $group->fascilitator_id,
                    'supervisor_id' => $group->supervisor_id,
                    'mode_of_delivery_id' => $group->mode_of_delivery_id,
                    'group_allocation_date' => $group->group_allocation_date,
                    'staff' => $group->staff,
                    'groupType' => $group->groupType,
                    'therapyMode' => $group->therapyMode,
                    'deliveryMode' => $group->deliveryMode,
                    'supervisor' => $group->supervisor,
                    'fascilitator' => $group->fascilitator,
                    'cycle' => $group->cycle,
                    'project' => $group->project,
                    'office' => $group->office
                ];
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
            if($newGroup = Group::create(array_merge($request->validated(),
                ['staff_id' => auth()->id(),
                    'last_session' => $request->last_session !== null ? Carbon::parse($request->last_session)->format('d M Y') : null,
                ]))){
                $office = Office::find($request->office_id);
                if($office){
                    $countryCode = CountryHelper::getCountyCodeByOffice($office->id);
                    $newGroup->update([
                        'group_id' => $countryCode->long_code.'-'.Carbon::now()->format('y').'-'.$newGroup->id
                    ]);
                }
                $groupItem = Group::with('groupType','staff','sessions','therapyMode','deliveryMode','supervisor','fascilitator','cycle','project','office')->findOrFail($newGroup->id);
                return $this->commonResponse(true,'Group Created Successfully',$groupItem, Response::HTTP_CREATED);
            }
            return $this->commonResponse(false,'Failed to create group','', Response::HTTP_UNPROCESSABLE_ENTITY);
        }catch (QueryException $queryException){
            return $this->commonResponse(false,$queryException->errorInfo[2],'', Response::HTTP_UNPROCESSABLE_ENTITY);
        }catch (Exception $exception){
            return $this->commonResponse(false,$exception->getMessage(),'', Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    public function viewGroupItem(int $id): JsonResponse
    {
        try{
            $group = Group::with('groupType','staff','sessions','therapyMode','deliveryMode','supervisor','fascilitator','cycle','project','office')->findOrFail($id);
            return $this->commonResponse(false,'Success',$group,Response::HTTP_OK);
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
            $group = Group::with('groupType','staff','sessions','therapyMode','deliveryMode','supervisor','fascilitator','cycle','project','office')->findOrFail($id);
            if($group->ongoing === Group::SESSION_TERMINATED){
                return $this->commonResponse(false,'Group Session is terminated, no action required',$group, Response::HTTP_UNPROCESSABLE_ENTITY);
            }
            $group->update(['ongoing' => Group::SESSION_TERMINATED]);
            return $this->commonResponse(true,'Group terminated successfully',$group, Response::HTTP_OK);
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
            $group = Group::with('groupType','staff','sessions','therapyMode','deliveryMode','supervisor','fascilitator','cycle','project','office')->findOrFail($id);
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
            return $this->commonResponse(true, 'Group Updated Successfully', $group, Response::HTTP_OK);
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
            $group = Group::with('groupType','staff','sessions','therapyMode','deliveryMode','supervisor','fascilitator','cycle','project','office')->findOrFail($id);
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
}
