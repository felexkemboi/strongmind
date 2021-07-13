<?php

namespace App\Http\Controllers\Misc;

use App\Http\Controllers\Controller;
use App\Http\Resources\GroupTypeResource;
use App\Models\Misc\GroupType;
use Exception;
use Illuminate\Database\QueryException;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Symfony\Component\HttpFoundation\Response;

/**
 * Class GroupTypeController
 * @package App\Http\Controllers\Misc
 * @group Misc
 */
class GroupTypeController extends Controller
{
    /**
     * All Group Types
     * @return JsonResponse
     * @authenticated
     */
    public function index(): JsonResponse
    {
        $group_types = GroupType::query()->select(['id', 'name', 'slug'])->get();
        return $this->commonResponse(true, 'success', $group_types, Response::HTTP_OK);

    }

    /**
     * Create Group Type
     * @param Request $request
     * @return JsonResponse
     * @bodyParam  name string required GroupType Name
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
                $record_exists = GroupType::firstWhere('slug', $slug);
                if ($record_exists) {
                    return $this->commonResponse(false, 'Record already exists!', '', Response::HTTP_UNPROCESSABLE_ENTITY);
                } else {
                    $record = GroupType::create([
                        'name' => $request->get('name'),
                        'slug' => $slug,
                    ]);
                    return $this->commonResponse(true, 'Record created successfully!', new GroupTypeResource($record), Response::HTTP_CREATED);
                }
            } catch (QueryException $ex) {
                return $this->commonResponse(false, $ex->errorInfo[2], '', Response::HTTP_UNPROCESSABLE_ENTITY);
            } catch (Exception $ex) {
                return $this->commonResponse(false, $ex->getMessage(), '', Response::HTTP_UNPROCESSABLE_ENTITY);
            }
        }
    }

    /**
     * Update Group Type
     * @param Request $request
     * @param $id
     * @urlParam id integer required The ID of the group type. Example:1
     * @return JsonResponse
     * @bodyParam  name string required GroupType Name.
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
                $record = GroupType::firstWhere('id', $id);
                if (!$record) {
                    return $this->commonResponse(false, 'Record not found!', '', Response::HTTP_NOT_FOUND);
                } else {
                    $slug = Str::slug($request->get('name'));
                    $record->update([
                        'name' => $request->get('name'),
                        'slug' => $slug,
                    ]);
                    $record->fresh();
                    return $this->commonResponse(true, 'Record updated successfully!', new GroupTypeResource($record), Response::HTTP_CREATED);
                }
            } catch (QueryException $ex) {
                return $this->commonResponse(false, $ex->errorInfo[2], '', Response::HTTP_UNPROCESSABLE_ENTITY);
            } catch (Exception $ex) {
                return $this->commonResponse(false, $ex->getMessage(), '', Response::HTTP_UNPROCESSABLE_ENTITY);
            }
        }
    }

    /**
     * Delete GroupType by Id
     * @param int $id
     * @urlParam id integer required The ID of the GroupType. Example:1
     * @return JsonResponse
     * @authenticated
     */
    public function delete(int $id): JsonResponse
    {
        $record = GroupType::find($id);
        if ($record) {
            $record->delete();
            return $this->commonResponse(true, 'Record deleted!', '', Response::HTTP_OK);
        } else {
            return $this->commonResponse(false, 'Record not found!', '', Response::HTTP_NOT_FOUND);
        }
    }
}
