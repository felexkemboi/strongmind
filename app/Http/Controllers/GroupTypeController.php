<?php

namespace App\Http\Controllers;

use Exception;
use App\Models\GroupType;
use Illuminate\Http\JsonResponse;
use Illuminate\Database\QueryException;
use Symfony\Component\HttpFoundation\Response;
use App\Http\Requests\CreateGroupTypeRequest;

/**
 * GroupTypes Endpoints
 * Class GroupTypeController
 * @package App\Http\Controllers\Groups
 * @group Dynamic Fields
 */
class GroupTypeController extends Controller
{
    /**
     * List Group Types
     *
     * @return JsonResponse
     * @authenticated
     */

    public function index(): JsonResponse
    {
        $grouptypes = GroupType::all();
        return $this->commonResponse(true, 'success', $grouptypes, Response::HTTP_OK);
    }

    /**
     * Create  GroupType
     * @param CreateGroupTypeRequest $request
     * @return JsonResponse
     * @bodyParam name string required The Group Type's Name
     * @authenticated
     */
    public function create(CreateGroupTypeRequest $request): JsonResponse
    {
        try {
            $groupType = new GroupType();
            $groupType->name = $request->name;
            if ($groupType->save()) {
                return $this->commonResponse(true, 'Group Type created successfully!', '', Response::HTTP_CREATED);
            }
            return $this->commonResponse(false, 'Failed to create Group Type', '', Response::HTTP_UNPROCESSABLE_ENTITY);
        } catch (QueryException $ex) {
            return $this->commonResponse(false, $ex->errorInfo[2], '', Response::HTTP_UNPROCESSABLE_ENTITY);
        } catch (Exception $ex) {
            return $this->commonResponse(false, $ex->getMessage(), '', Response::HTTP_UNPROCESSABLE_ENTITY);
        }
    }

    /**
     * Get GroupType by Id
     * @param int $id
     * @return JsonResponse
     * @urlParam id integer required The ID of the Group Type Example:1
     * @authenticated
     */
    public function show(int $id): JsonResponse
    {
        $groupType = GroupType::find($id);
        if ($groupType) {
            return $this->commonResponse(true, 'success', $groupType, Response::HTTP_OK);
        } else {
            return $this->commonResponse(false, 'GroupType Not Found!', '', Response::HTTP_NOT_FOUND);
        }
    }

    /**
     * Edit GroupType
     * @param CreateGroupTypeRequest $request
     * @param int $id
     * @return JsonResponse
     * @bodyParam name string required The Group Type' Name
     * @authenticated
     */

    public function update(CreateGroupTypeRequest $request, int $id): JsonResponse
    {
        try {
            $groupType = GroupType::find($id);
            if($groupType){
                $groupType->name = $request->name;
                if ($groupType->save()) {
                    return $this->commonResponse(true, 'Group Type updated successfully!', '', Response::HTTP_CREATED);
                }
            }
            return $this->commonResponse(false, 'Failed to update Group Type', 'GroupType Not Found', Response::HTTP_UNPROCESSABLE_ENTITY);
        } catch (QueryException $ex) {
            return $this->commonResponse(false, $ex->errorInfo[2], '', Response::HTTP_UNPROCESSABLE_ENTITY);
        } catch (Exception $ex) {
            return $this->commonResponse(false, $ex->getMessage(), '', Response::HTTP_UNPROCESSABLE_ENTITY);
        }
    }

    /**
     * Delete GroupType
     * @param int $id
     * @urlParam id integer required The ID of the Group Type. Example:1
     * @return JsonResponse
     * @authenticated
     */
    public function destroy(int $id): JsonResponse
    {
        $groupType = GroupType::find($id);
        if ($groupType) {
            $groupType->delete();
            return $this->commonResponse(true, 'Group Type deleted', '', Response::HTTP_OK);
        } else {
            return $this->commonResponse(false, 'Group Type not found!', '', Response::HTTP_NOT_FOUND);
        }
    }
}
