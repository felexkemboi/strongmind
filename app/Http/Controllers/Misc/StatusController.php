<?php

namespace App\Http\Controllers\Misc;

use App\Http\Controllers\Controller;
use App\Http\Resources\StatusResource;
use App\Models\Misc\Status;
use Exception;
use Illuminate\Database\QueryException;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Symfony\Component\HttpFoundation\Response;

/**
 * Class StatusController
 * @package App\Http\Controllers\Misc
 * @group Dynamic Fields
 */
class StatusController extends Controller
{
    /**
     * All Statuses
     * @return JsonResponse
     * @authenticated
     */
    public function index(): JsonResponse
    {
        $statuses = Status::query()->select(['id', 'name', 'slug', 'client_entry_phase'])->orderBy('created_at','ASC')->get();
        return $this->commonResponse(true, 'success', $statuses, Response::HTTP_OK);
    }

    /**
     * Create Status
     * @param Request $request
     * @return JsonResponse
     * @bodyParam  name string required Status Name
     * @bodyParam client_entry_phase boolean required . Is the status a client phase entry?
     * @authenticated
     */
    public function create(Request $request): JsonResponse
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
        ]);
        if ($validator->fails()) {
            return $this->commonResponse(false, Arr::flatten($validator->messages()->get('*')), '', Response::HTTP_UNPROCESSABLE_ENTITY);
        } else {
            try {
                $slug = Str::slug($request->get('name'));
                $record_exists = Status::firstWhere('slug', $slug);
                if ($record_exists) {
                    return $this->commonResponse(false, 'Record already exists!', '', Response::HTTP_UNPROCESSABLE_ENTITY);
                } else {
                    $record = Status::create([
                        'name' => $request->get('name'),
                        'slug' => $slug,
                        'client_entry_phase' => $request->get('client_entry_phase'),
                    ]);
                    if($request->get('client_entry_phase')){
                        $otherStatuses = Status::whereNotIn('id', [$record->id])->get();
                        foreach ($otherStatuses as $otherStatus) {
                            $statusToUpdate = Status::find($otherStatus->id);
                            if($statusToUpdate){
                              $statusToUpdate->update(['client_entry_phase' =>  0]);
                            }
                        }
                    }
                    return $this->commonResponse(true, 'Record created successfully!', new StatusResource($record), Response::HTTP_CREATED);
                }
            } catch (QueryException $ex) {
                return $this->commonResponse(false, $ex->errorInfo[2], '', Response::HTTP_UNPROCESSABLE_ENTITY);
            } catch (Exception $ex) {
                return $this->commonResponse(false, $ex->getMessage(), '', Response::HTTP_UNPROCESSABLE_ENTITY);
            }
        }
    }

    /**
     * Update Status
     * @param Request $request
     * @param $id
     * @urlParam id integer required The ID of the status. Example:1
     * @bodyParam client_entry_phase boolean required . Is the status a client phase entry?
     * @return JsonResponse
     * @bodyParam  name string  Status Name.
     * @authenticated
     */
    public function update(Request $request, $id): JsonResponse
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
        ]);
        if ($validator->fails()) {
            return $this->commonResponse(false, Arr::flatten($validator->messages()->get('*')), '', Response::HTTP_UNPROCESSABLE_ENTITY);
        } else {
            try {
                $record = Status::firstWhere('id', $id);
                if (!$record) {
                    return $this->commonResponse(false, 'Record not found!', '', Response::HTTP_NOT_FOUND);
                } else {
                    $slug = Str::slug($request->get('name'));
                    $record->update([
                        'name' => $request->get('name'),
                        'slug' => $slug,
                        'client_entry_phase' => $request->get('client_entry_phase'),
                    ]);
                    $record->fresh();

                    if($request->get('client_entry_phase')){
                        $otherStatuses = Status::whereNotIn('id', [$record->id])->get();
                        foreach ($otherStatuses as $otherStatus) {
                            $statusToUpdate = Status::find($otherStatus->id);
                            if($statusToUpdate){
                              $statusToUpdate->update(['client_entry_phase' =>  0]);
                            }
                        }
                    }
                    return $this->commonResponse(true, 'Record updated successfully!', new StatusResource($record), Response::HTTP_CREATED);
                }
            } catch (QueryException $ex) {
                return $this->commonResponse(false, $ex->errorInfo[2], '', Response::HTTP_UNPROCESSABLE_ENTITY);
            } catch (Exception $ex) {
                return $this->commonResponse(false, $ex->getMessage(), '', Response::HTTP_UNPROCESSABLE_ENTITY);
            }
        }
    }

    /**
     * Delete Status by Id
     * @param int $id
     * @urlParam id integer required The ID of the status. Example:1
     * @return JsonResponse
     * @authenticated
     */
    public function delete(int $id): JsonResponse
    {
        $record = Status::find($id);
        if ($record) {
            $record->delete();
            return $this->commonResponse(true, 'Status deleted!', '', Response::HTTP_OK);
        } else {
            return $this->commonResponse(false, 'Status not found!', '', Response::HTTP_NOT_FOUND);
        }
    }

}
