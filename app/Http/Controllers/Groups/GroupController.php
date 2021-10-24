<?php

namespace App\Http\Controllers\Groups;

use App\Http\Controllers\Controller;
use App\Http\Requests\GroupRequest;
use App\Http\Requests\GroupUpdateRequest;
use App\Models\Group;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Database\QueryException;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Log;
use Symfony\Component\HttpFoundation\Response;
use Exception;

/**
 * Groups Endpoints
 * Class GroupController
 * @package App\Http\Controllers\Groups
 * @group Groups
 */
class GroupController extends Controller
{
    /**
     * List Groups
     *
     * @return JsonResponse
     * @authenticated
     */
    public function index(): JsonResponse
    {
        //handle authorization here
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

    /**
     * Create Group
     *
     * @param GroupRequest $request
     * @bodyParam name string required.
     * @bodyParam group_type_id integer required.
     * @return JsonResponse
     * @authenticated
     */
    public function store(GroupRequest $request): JsonResponse
    {
        //handle permission and authorization here
        try{
            if(Group::create(array_merge($request->validated(),['staff_id' => auth()->id()]))){
                return $this->commonResponse(true,'Group Created Successfully','', Response::HTTP_CREATED);
            }
            return $this->commonResponse(false,'Failed to create group','', Response::HTTP_UNPROCESSABLE_ENTITY);
        }catch (QueryException $queryException){
            return $this->commonResponse(false,$queryException->errorInfo[2],'', Response::HTTP_UNPROCESSABLE_ENTITY);
        }catch (Exception $exception){
            return $this->commonResponse(false,$exception->getMessage(),'', Response::HTTP_INTERNAL_SERVER_ERROR);
        }

    }

    /**
     * Display Group Details
     *
     * @param int $id
     * @return JsonResponse
     * @authenticated
     */
    public function show(int $id): JsonResponse
    {
        //handle authorization here
        try{
            $group = Group::with('groupType','staff')->findOrFail($id);
            return $this->commonResponse(false,'Success',$group->only('id','name','last_session','ongoing'),Response::HTTP_OK);
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

    /**
     * Update Group
     *
     * @param GroupUpdateRequest $request
     * @param int
     * @bodyParam name string required
     * @bodyParam group_type_id integer
     * @return JsonResponse
     * @authenticated
     */
    public function update(GroupUpdateRequest $request, int $id): JsonResponse
    {
        //handle authorization here
        try{
            $group = Group::with('groupType','staff')->findOrFail($id);
            if($group->update($request->validated())){
                return $this->commonResponse(true,'Group Updated Successfully',$group->only('id','name','last_session','ongoing'), Response::HTTP_OK);
            }
            return $this->commonResponse(false,'Failed To Update Group','', Response::HTTP_UNPROCESSABLE_ENTITY);
        }catch (ModelNotFoundException $exception){
            return $this->commonResponse(false,'Group Does Not Exist','', Response::HTTP_NOT_FOUND);
        }
        catch (QueryException $exception){
            return $this->commonResponse(false,$exception->errorInfo[2],'', Response::HTTP_UNPROCESSABLE_ENTITY);
        }catch (Exception $exception){
            return $this->commonResponse(false,$exception->getMessage(),'', Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    /**
     * Delete Group
     *
     * @param int $id
     * @return JsonResponse
     * @authenticated
     */
    public function destroy(int $id): JsonResponse
    {
        //handle authorization here
        try{
            $group = Group::with('groupType','staff')->findOrFail($id);
            if($group->delete()){
                return $this->commonResponse(true,'Group Deleted Successfully','', Response::HTTP_OK);
            }
            return $this->commonResponse(false,'Failed To Delete Group','', Response::HTTP_UNPROCESSABLE_ENTITY);
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
