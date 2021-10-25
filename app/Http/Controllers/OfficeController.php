<?php

namespace App\Http\Controllers;

use App\Http\Resources\Programs\ProjectResource;
use App\Http\Resources\UserResource;
use Exception;
use App\Models\User;
use App\Models\Office;
use Illuminate\Support\Arr;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Log;
use App\Http\Resources\OfficeResource;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\Validator;
use Symfony\Component\HttpFoundation\Response;

use function Psy\debug;

/**
 * Class OfficeController
 * @package App\Http\Controllers
 * @group Offices
 * APIs for managing offices
 */
class OfficeController extends Controller
{
    /**
     * All offices
     * @return JsonResponse
     * @authenticated
     */
    public function all(): JsonResponse
    {
        $offices = Office::query()->latest()
            ->get();
        return $this->commonResponse(true, 'success', OfficeResource::collection($offices), Response::HTTP_OK);
    }

    /**
     * create office
     * @param Request $request
     * @return JsonResponse
     * @bodyParam  country_id integer  County ID .
     * @bodyParam  name string required Office Name
     * @authenticated
     */
    public function create(Request $request): JsonResponse
    {
        $validator = Validator::make($request->all(), [
            'country_id' => 'nullable',
            'name' => 'required|unique:offices',
        ]);
        if ($validator->fails()) {
            return $this->commonResponse(false, Arr::flatten($validator->messages()->get('*')), '', Response::HTTP_UNPROCESSABLE_ENTITY);
        } else {
            try {
                $office = Office::create($validator->validated());
                return $this->commonResponse(true, 'Office created successfully!', new OfficeResource($office), Response::HTTP_CREATED);
            } catch (QueryException $ex) {
                return $this->commonResponse(false, $ex->errorInfo[2], '', Response::HTTP_UNPROCESSABLE_ENTITY);
            } catch (Exception $ex) {
                return $this->commonResponse(false, $ex->getMessage(), '', Response::HTTP_UNPROCESSABLE_ENTITY);
            }
        }
    }

    /**
     * update office
     * @param Request $request
     * @param $id
     * @urlParam id integer required The ID of the office. Example:1
     * @return JsonResponse
     * @bodyParam  country_id integer  County ID .
     * @bodyParam  name string required Office Name .
     * @bodyParam  active integer  Active Status . Example: 1
     * @authenticated
     */
    public function update(Request $request, $id): JsonResponse
    {
        $validator = Validator::make($request->all(), [
            'country_id' => 'nullable',
            'name' => 'required',
            'active' => 'nullable',
        ]);
        if ($validator->fails()) {
            return $this->commonResponse(false, Arr::flatten($validator->messages()->get('*')), '', Response::HTTP_UNPROCESSABLE_ENTITY);
        } else {
            try {
                $office = Office::find($id);
                if ($office) {
                    $office->update($validator->validated());
                    return $this->commonResponse(true, 'Office updated successfully!', new OfficeResource($office), Response::HTTP_CREATED);
                } else {
                    return $this->commonResponse(false, 'Office not found!', '', Response::HTTP_NOT_FOUND);
                }
            } catch (QueryException $ex) {
                return $this->commonResponse(false, $ex->errorInfo[2], '', Response::HTTP_UNPROCESSABLE_ENTITY);
            } catch (Exception $ex) {
                return $this->commonResponse(false, $ex->getMessage(), '', Response::HTTP_UNPROCESSABLE_ENTITY);
            }
        }
    }

    /**
     * List All Office Users
     * @param $id
     * @urlParam id integer required Office ID . Example:1
     * @return JsonResponse
     * @authenticated
     */
    public function members($id): JsonResponse
    {
        try{
            $office = Office::with('country','members','programs')->find($id);
            if(!$office){
                return $this->commonResponse(false,'Office Not Found','',Response::HTTP_NOT_FOUND);
            }
            $members = User::isActive()
                ->hasAcceptedInvite()
                ->with('office','timezone')
                ->where(function($query) use($office){
                    $query->where('office_id',$office->id);
                })->paginate(10);
            return $this->commonResponse(true,'Success',UserResource::collection($members)->response()->getData(true), Response::HTTP_OK);
        }catch(QueryException $exception){
            return $this->commonResponse(false, $exception->errorInfo[2], '', Response::HTTP_UNPROCESSABLE_ENTITY);
        }
        catch(Exception $exception){
            Log::critical('Something went wrong fetching office users. ERROR: '.$exception->getTraceAsString());
            return $this->commonResponse(false, $exception->getMessage(), '', Response::HTTP_UNPROCESSABLE_ENTITY);
        }
    }

    /**
     * List All Office Projects
     * @param $id
     * @urlParam id integer required Office ID . Example:1
     * @return JsonResponse
     * @authenticated
     */

    public function programs($id): JsonResponse
    {
        try{
            $office = Office::find($id);
            if(!$office){
                return $this->commonResponse(false,'Office Not Found','',Response::HTTP_NOT_FOUND);
            }else{
                $projects = $office->programs;
                return $this->commonResponse(true,'Success',ProjectResource::collection($projects), Response::HTTP_OK);
            }
        }catch(QueryException $exception){
            return $this->commonResponse(false, $exception->errorInfo[2], '', Response::HTTP_UNPROCESSABLE_ENTITY);
        }
        catch(Exception $exception) {
            Log::critical('Something went wrong fetching office users. ERROR: ' . $exception->getTraceAsString());
            return $this->commonResponse(false, $exception->getMessage(), '', Response::HTTP_UNPROCESSABLE_ENTITY);
        }
    }

    /**
     * Delete an office
     * @param $id
     * @urlParam id integer required Office ID . Example:1
     * @return JsonResponse
     * @authenticated
     */
    public function delete($id) {
        if(Office::where('id', $id)->exists()) {
          $office = Office::find($id);

          if($office->delete()){
            return $this->commonResponse(true, 'Office Deleted successfully!', '', Response::HTTP_OK);
          }
          return $this->commonResponse(false, 'Office not Deleted!', 'Office has related records', Response::HTTP_NOT_IMPLEMENTED);
        }

        return $this->commonResponse(false, 'Office not Delete!', 'Office does not exist', Response::HTTP_NOT_FOUND);
      }
}
