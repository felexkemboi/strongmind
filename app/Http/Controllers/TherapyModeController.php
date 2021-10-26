<?php

namespace App\Http\Controllers;

use Exception;
use App\Models\TherapyMode;
use Illuminate\Http\JsonResponse;
use Illuminate\Database\QueryException;
use Symfony\Component\HttpFoundation\Response;
use App\Http\Requests\CreateTherapyModeRequest;

/**
 * APIs for managing TherapyMode
 *
 * Class TherapyModeController
 * @package App\Http\Controllers
 * @group Dynamic Fields
 *
 */

class TherapyModeController extends Controller
{
    /**
     * All TherapyMode
     * @group Therapy Mode
     * @authenticated
     * @return \Illuminate\Http\Response
     */

    public function index(): JsonResponse
    {
        $therapymodes = TherapyMode::all();
        return $this->commonResponse(true, 'success', $therapymodes, Response::HTTP_OK);
    }

    /**
     * Create  TherapyMode
     * @group  Therapy Mode
     * @param CreateTherapyModeRequest $request
     * @bodyParam name string required The TherapyMode's Name
     * @return \Illuminate\Http\Response
     * @authenticated
     */


    public function create(CreateTherapyModeRequest $request): JsonResponse
    {
        try {
            $status = new TherapyMode();
            $status->name = $request->name;
            if ($status->save()) {
                return $this->commonResponse(true, 'TherapyMode created successfully!', '', Response::HTTP_CREATED);
            }
            return $this->commonResponse(false, 'Failed to create TherapyMode', '', Response::HTTP_UNPROCESSABLE_ENTITY);
        } catch (QueryException $ex) {
            return $this->commonResponse(false, $ex->errorInfo[2], '', Response::HTTP_UNPROCESSABLE_ENTITY);
        } catch (Exception $ex) {
            return $this->commonResponse(false, $ex->getMessage(), '', Response::HTTP_UNPROCESSABLE_ENTITY);
        }
    }

    /**
     * Get TherapyMode by Id
     * @group Therapy Mode.
     * @param int $id
     * @urlParam id integer required The ID of the TherapyMode Example:1
     * @return \Illuminate\Http\Response
     * @authenticated
     */
    public function show(int $id): JsonResponse
    {
        $clientsatus = TherapyMode::find($id);
        if ($clientsatus) {
            return $this->commonResponse(true, 'success', $clientsatus, Response::HTTP_OK);
        } else {
            return $this->commonResponse(false, 'TherapyMode Not Found!', '', Response::HTTP_NOT_FOUND);
        }
    }

    /**
     * Edit TherapyMode
     * @group Therapy Mode
     * @param CreateTherapyModeRequest $request
     * @bodyParam name string required The TherapyMode' Name
     * @return JsonResponse
     * @authenticated
     */

    public function update(CreateTherapyModeRequest $request, int $id): JsonResponse
    {
        try {
            $clientsatus = TherapyMode::find($id);
            if($clientsatus){
                $clientsatus->name = $request->name;
                if ($clientsatus->save()) {
                    return $this->commonResponse(true, 'TherapyMode updated successfully!', '', Response::HTTP_CREATED);
                }
            }
            return $this->commonResponse(false, 'Failed to update TherapyMode', 'TherapyMode Not Found', Response::HTTP_UNPROCESSABLE_ENTITY);
        } catch (QueryException $ex) {
            return $this->commonResponse(false, $ex->errorInfo[2], '', Response::HTTP_UNPROCESSABLE_ENTITY);
        } catch (Exception $ex) {
            return $this->commonResponse(false, $ex->getMessage(), '', Response::HTTP_UNPROCESSABLE_ENTITY);
        }
    }

    /**
     * Delete TherapyMode
     * @group  Therapy Mode
     * @param int $id
     * @urlParam id integer required The ID of the TherapyMode. Example:1
     * @return JsonResponse
     * @authenticated
     */
    public function destroy(int $id): JsonResponse
    {
        $clientsatus = TherapyMode::find($id);
        if ($clientsatus) {
            $clientsatus->delete();
            return $this->commonResponse(true, 'TherapyMode deleted', '', Response::HTTP_OK);
        } else {
            return $this->commonResponse(false, 'TherapyMode not found!', '', Response::HTTP_NOT_FOUND);
        }
    }
}
