<?php

namespace App\Http\Controllers\Programs;

use App\Http\Controllers\Controller;
use App\Models\Programs\ProgramMemberType;
use Illuminate\Database\QueryException;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use App\Http\Resources\Programs\ProgramMemberTypeResource;
use Exception;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;
use Symfony\Component\HttpFoundation\Response;

/**
 * Class ProgramMemberTypeController
 * @package App\Http\Controllers\Programs
 * @group Programs
 * API Endpoints Manage Program Member Types
 */
class ProgramMemberTypeController extends Controller
{
    /**
     * List Program Member Types
     *
     * @return JsonResponse
     * @authenticated
     */
    public function index(): JsonResponse
    {
        try{
            $memberTypes = ProgramMemberType::orderBy('name','ASC')->get();
            return $this->commonResponse(true,'Success', ProgramMemberTypeResource::collection($memberTypes) , Response::HTTP_OK);
        }catch (QueryException $queryException){
            return $this->commonResponse(false, $queryException->errorInfo[2],'', Response::HTTP_UNPROCESSABLE_ENTITY);
        }catch (Exception $exception){
            Log::critical('Failed to fetch project member types. ERROR: '.$exception->getTraceAsString());
            return $this->commonResponse(false,$exception->getMessage(),'', Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    /**
     *  Create Program Member Type
     *
     * @param Request $request
     * @return JsonResponse
     * @bodyParam name string required. The Member Type Name
     * @authenticated
     */
    public function store(Request $request): JsonResponse
    {
        $validator = Validator::make($request->all(),['name' => 'required|string|unique:program_member_types|min:3|max:20']);
        if($validator->fails()){
            return $this->commonResponse(false, Arr::flatten($validator->messages()->get('*')), '', Response::HTTP_UNPROCESSABLE_ENTITY);
        }
        try{
            $newMemberType = ProgramMemberType::create(['name' => $request->name]);
            if($newMemberType){
                return $this->commonResponse(true,'Project Member Type Created Successfully',new ProgramMemberTypeResource($newMemberType), Response::HTTP_OK);
            }
            return $this->commonResponse(false,'Failed To Create Member Type','', Response::HTTP_EXPECTATION_FAILED);
        }catch (QueryException $queryException){
            return $this->commonResponse(false,$queryException->errorInfo[2],'', Response::HTTP_UNPROCESSABLE_ENTITY);
        }catch (Exception $exception){
            Log::critical('Failed to add new project member type. ERROR: '.$exception->getTraceAsString());
            return $this->commonResponse(false,$exception->getMessage(), '', Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    /**
     * Program Member Type Details
     *
     * @param int $id
     * @urlParam id integer required The Member Type ID. Example 1
     * @return JsonResponse
     * @authenticated
     */
    public function show(int $id): JsonResponse
    {
        try{
            $memberType = ProgramMemberType::find($id);
            if(!$memberType){
                return $this->commonResponse(false,'Project Member Type Does Not Exist','', Response::HTTP_NOT_FOUND);
            }
            return $this->commonResponse(true,'Success',new ProgramMemberTypeResource($memberType), Response::HTTP_OK);
        }catch (QueryException $queryException){
            return $this->commonResponse(false,$queryException->errorInfo[2], '', Response::HTTP_UNPROCESSABLE_ENTITY);
        }catch (Exception $exception){
            Log::critical('Failed to fetch project member type details. ERROR: '.$exception->getTraceAsString());
            return $this->commonResponse(false,$exception->getMessage(),'', Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    /**
     * Update Program Member Type
     *
     * @param Request $request
     * @param int $id
     * @bodyParam name string required The program Member Type Name
     * @return JsonResponse
     * @authenticated
     */
    public function update(Request $request, int $id): JsonResponse
    {
        $validator = Validator::make($request->all(),['name' => 'required|string|min:3|max:20']);
        if($validator->fails()){
            return $this->commonResponse(false, Arr::flatten($validator->messages()->get('*')), '', Response::HTTP_UNPROCESSABLE_ENTITY);
        }
        try{
            $memberType = ProgramMemberType::find($id);
            if(!$memberType){
                return $this->commonResponse(false,'Project Member Type Does Not Exist','', Response::HTTP_NOT_FOUND);
            }
            $memberTypeUpdate = $memberType->update(['name' => $request->name]);
            if($memberTypeUpdate){
                return $this->commonResponse(true,'Project Member Type Updated Successfully',new ProgramMemberTypeResource($memberType), Response::HTTP_OK);
            }
            return $this->commonResponse(false,'Failed To Update Member Type','', Response::HTTP_EXPECTATION_FAILED);
        }catch (QueryException $queryException){
            return $this->commonResponse(false,$queryException->errorInfo[2],'', Response::HTTP_UNPROCESSABLE_ENTITY);
        }catch (Exception $exception){
            Log::critical('Failed to update project member type. ERROR: '.$exception->getTraceAsString());
            return $this->commonResponse(false,$exception->getMessage(), '', Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    /**
     * Delete Program Member Type
     *
     * @param int $id
     * @return JsonResponse
     * @urlParam id integer required The Program Member Type ID Example , 1
     * @authenticated
     */
    public function destroy(int $id): JsonResponse
    {
        try{
            $memberType = ProgramMemberType::find($id);
            if(!$memberType){
                return $this->commonResponse(false,'Project Member Type Does Not Exist','', Response::HTTP_NOT_FOUND);
            }
            if($memberType->delete()){
                return $this->commonResponse(true,'Project Member Type Deleted Successfully','', Response::HTTP_OK);
            }
            return $this->commonResponse(false,'Failed To Delete Project Member Type','', Response::HTTP_EXPECTATION_FAILED);
        }catch (QueryException $queryException){
            return $this->commonResponse(false,$queryException->errorInfo[2],'', Response::HTTP_UNPROCESSABLE_ENTITY);
        }catch (Exception $exception){
            Log::critical('Failed to delete project member type. ERROR: '. $exception->getTraceAsString());
            return $this->commonResponse(false,$exception->getMessage(),'', Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }
}
