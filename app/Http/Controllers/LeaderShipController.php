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
            $leadershipNameExist = LeaderShip::where('name',$request->name)->exists();
            if(!$leadershipNameExist){
                $leadership = new LeaderShip();
                $leadership->name = $request->name;
                if ($leadership->save()) {
                    return $this->commonResponse(true, 'LeaderShip created successfully!', $leadership, Response::HTTP_CREATED);
                }
            }
            return $this->commonResponse(false, 'Failed to create LeaderShip', 'Leadership Name already used', Response::HTTP_UNPROCESSABLE_ENTITY);
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
        $leadership = LeaderShip::find($id);
        if ($leadership) {
            return $this->commonResponse(true, 'success', $leadership, Response::HTTP_OK);
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
            $leadership = LeaderShip::find($id);
            if($leadership){
                $leadershipNameExist = LeaderShip::where('name',$request->name)->exists();
                if(!$leadershipNameExist){
                    if($leadership->update([
                        'name' => $request->name
                    ])) {
                        return $this->commonResponse(true, 'Leadership Updated successfully!', $leadership, Response::HTTP_CREATED);
                    }
                }
                return $this->commonResponse(true, 'Failed to update LeaderShip!', 'Leadership name already exist', Response::HTTP_CREATED);
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
        $leadership = LeaderShip::find($id);
        if ($leadership) {
            $leadership->delete();
            return $this->commonResponse(true, 'LeaderShip deleted', '', Response::HTTP_OK);
        } else {
            return $this->commonResponse(false, 'LeaderShip not found!', '', Response::HTTP_NOT_FOUND);
        }
    }
}
