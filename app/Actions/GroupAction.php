<?php


namespace App\Actions;


use App\Http\Requests\GroupRequest;
use App\Http\Requests\GroupUpdateRequest;
use App\Http\Resources\GroupResource;
use App\Models\Group;
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
            $groups = Group::with('groupType','staff')->latest()->get()->transform(function ($group){
                return [
                    'id' => $group->id,
                    'name' => $group->name,
                    'last_session' => $group->last_session !== null ? Carbon::parse($group->last_session)->format('d M Y') : null,
                    'ongoing' => $group->ongoing === Group::SESSION_ONGOING ? 'Ongoing' : 'Terminated',
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
            if($group = Group::create(array_merge($request->validated(),['staff_id' => auth()->id()]))){
                return $this->commonResponse(true,'Group Created Successfully',$group->only('id', 'name', 'last_session', 'ongoing'), Response::HTTP_CREATED);
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
            $group = Group::with('staff','groupType')->findOrFail($id);
            return $this->commonResponse(false,'Success',$group->only('id', 'name', 'last_session', 'ongoing'),Response::HTTP_OK);
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
            $group = Group::with('staff','groupType')->findOrFail($id);
            if($group->ongoing === Group::SESSION_TERMINATED){
                return $this->commonResponse(false,'No action required',$group->only('id', 'name', 'last_session', 'ongoing'), Response::HTTP_UNPROCESSABLE_ENTITY);
            }
            $group->update(['ongoing' => Group::SESSION_TERMINATED]);
            return $this->commonResponse(true,'Group terminated successfully',$group->only('id', 'name', 'last_session', 'ongoing'), Response::HTTP_OK);
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
            $group = Group::with('staff','groupType')->findOrFail($id);
            $group->update($request->validated());
            return $this->commonResponse(true, 'Group Updated Successfully', $group->only('id', 'name', 'last_session', 'ongoing'), Response::HTTP_OK);
        }
        catch (ModelNotFoundException $exception) {
            return $this->commonResponse(false, 'Group Does Not Exist', '', Response::HTTP_NOT_FOUND);
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
            $group = Group::with('staff','groupType')->findOrFail($id);
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
