<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Exception;
use Illuminate\Database\QueryException;
use App\Http\Resources\OfficeResource;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Arr;
use App\Models\Office;
use Illuminate\Support\Facades\Validator;
use Symfony\Component\HttpFoundation\Response;

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
    * @bodyParam  name string required Office Name .
    *
    */
    public function create(Request $request): JsonResponse
    {
        $validator = Validator::make($request->all(), [
            'country_id' => 'nullable',
            'name' => 'required',
        ]);
        if ($validator->fails()) {
            return $this->commonResponse(false, Arr::flatten($validator->messages()->get('*')), '', Response::HTTP_UNPROCESSABLE_ENTITY);
        } else {
            try {
                $office=Office::create($validator->validated());
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
     * @return JsonResponse
     * @bodyParam  country_id integer  County ID .
     * @bodyParam  name string required Office Name .
     * @bodyParam  active integer  Active Status . Example: 1
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
                $office=Office::find($id);
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
}
