<?php

namespace App\Http\Controllers;

use Exception;
use App\Models\LeaderShip;
use Illuminate\Http\JsonResponse;
use Illuminate\Database\QueryException;
use Symfony\Component\HttpFoundation\Response;
use App\Http\Requests\CreateLeaderShipRequest;

/**
 * APIs for managing LeaderShipController
 *
 * Class LeaderShipController
 * @package App\Http\Controllers
 * @group Dynamic Fields
 *
 */

class LeaderShipController extends Controller
{
    /**
     * All LeaderShips
     * @authenticated
     * @return JsonResponse
     */

    public function index(): JsonResponse
    {
        $leaderships = LeaderShip::all();
        return $this->commonResponse(true, 'success', $leaderships, Response::HTTP_OK);
    }

    /**
     * Create  LeaderShip
     * @param CreateLeaderShipRequest $request
     * @return JsonResponse
     * @bodyParam name string required The LeaderShip's Name
     * @authenticated
     */


    public function create(CreateLeaderShipRequest $request): JsonResponse
    {
        try {
            $status = new LeaderShip();
            $status->name = $request->name;
            if ($status->save()) {
                return $this->commonResponse(true, 'LeaderShip created successfully!', '', Response::HTTP_CREATED);
            }
            return $this->commonResponse(false, 'Failed to create LeaderShip', '', Response::HTTP_UNPROCESSABLE_ENTITY);
        } catch (QueryException $ex) {
            return $this->commonResponse(false, $ex->errorInfo[2], '', Response::HTTP_UNPROCESSABLE_ENTITY);
        } catch (Exception $ex) {
            return $this->commonResponse(false, $ex->getMessage(), '', Response::HTTP_UNPROCESSABLE_ENTITY);
        }
    }

    /**
     * Get LeaderShip by Id
     * @param int $id
     * @return JsonResponse
     * @urlParam id integer required The ID of the LeaderShip Example:1
     * @authenticated
     */
    public function show(int $id): JsonResponse
    {
        $clientsatus = LeaderShip::find($id);
        if ($clientsatus) {
            return $this->commonResponse(true, 'success', $clientsatus, Response::HTTP_OK);
        } else {
            return $this->commonResponse(false, 'LeaderShip Not Found!', '', Response::HTTP_NOT_FOUND);
        }
    }

    /**
     * Edit LeaderShip
     * @param CreateLeaderShipRequest $request
     * @param int $id
     * @return JsonResponse
     * @bodyParam name string required The LeaderShip' Name
     * @authenticated
     */

    public function update(CreateLeaderShipRequest $request, int $id): JsonResponse
    {
        try {
            $clientsatus = LeaderShip::find($id);
            if($clientsatus){
                $clientsatus->name = $request->name;
                if ($clientsatus->save()) {
                    return $this->commonResponse(true, 'LeaderShip updated successfully!', '', Response::HTTP_CREATED);
                }
            }
            return $this->commonResponse(false, 'Failed to update LeaderShip', 'LeaderShip Not Found', Response::HTTP_UNPROCESSABLE_ENTITY);
        } catch (QueryException $ex) {
            return $this->commonResponse(false, $ex->errorInfo[2], '', Response::HTTP_UNPROCESSABLE_ENTITY);
        } catch (Exception $ex) {
            return $this->commonResponse(false, $ex->getMessage(), '', Response::HTTP_UNPROCESSABLE_ENTITY);
        }
    }

    /**
     * Delete LeaderShip
     * @param int $id
     * @urlParam id integer required The ID of the LeaderShip. Example:1
     * @return JsonResponse
     * @authenticated
     */
    public function destroy(int $id): JsonResponse
    {
        $clientsatus = LeaderShip::find($id);
        if ($clientsatus) {
            $clientsatus->delete();
            return $this->commonResponse(true, 'LeaderShip deleted', '', Response::HTTP_OK);
        } else {
            return $this->commonResponse(false, 'LeaderShip not found!', '', Response::HTTP_NOT_FOUND);
        }
    }
}
