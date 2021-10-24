<?php

namespace App\Http\Controllers;

use Exception;
use App\Models\ClientStatus;
use Illuminate\Http\JsonResponse;
use Illuminate\Database\QueryException;
use Symfony\Component\HttpFoundation\Response;
use App\Http\Requests\CreateClientStatusRequest;

/**
 * Class ClientStatusController
 * @package App\Http\Controllers
 * @group ClientStatus
 * APIs for managing ClientStatus
 */

class ClientStatusController extends Controller
{
    /**
     * All Client Status.
     * @group Client Status
     * @authenticated
     * @return \Illuminate\Http\Response
     */

    public function index(): JsonResponse
    {
        $statuses = ClientStatus::all();
        return $this->commonResponse(true, 'success', $statuses, Response::HTTP_OK);
    }


    /**
     * Create  Client Status
     * @group  Client Status
     * @param CreateClientStatusRequest $request
     * @bodyParam name string required The Client Status' Name
     * @return \Illuminate\Http\Response
     * @authenticated
     */


    public function create(CreateClientStatusRequest $request): JsonResponse
    {
        try {
            $status = new ClientStatus();
            $status->name = $request->name;
            if ($status->save()) {
                return $this->commonResponse(true, 'Client Status created successfully!', '', Response::HTTP_CREATED);
            }
            return $this->commonResponse(false, 'Failed to create Client Status', '', Response::HTTP_UNPROCESSABLE_ENTITY);
        } catch (QueryException $ex) {
            return $this->commonResponse(false, $ex->errorInfo[2], '', Response::HTTP_UNPROCESSABLE_ENTITY);
        } catch (Exception $ex) {
            return $this->commonResponse(false, $ex->getMessage(), '', Response::HTTP_UNPROCESSABLE_ENTITY);
        }
    }

    /**
     * Get Client Status by Id
     * @group Client Status.
     * @param int $id
     * @urlParam id integer required The ID of the client status.Example:1
     * @return \Illuminate\Http\Response
     * @authenticated
     */
    public function show(int $id): JsonResponse
    {
        $clientsatus = ClientStatus::find($id);
        if ($clientsatus) {
            return $this->commonResponse(true, 'success', $clientsatus, Response::HTTP_OK);
        } else {
            return $this->commonResponse(false, 'Client Status Not Found!', '', Response::HTTP_NOT_FOUND);
        }
    }

    /**
     * Edit Client Status
     * @group Client Status
     * @param CreateClientStatusRequest $request
     * @bodyParam name string required The Client Status' Name
     * @return JsonResponse
     * @authenticated
     */

    public function update(CreateClientStatusRequest $request, int $id): JsonResponse
    {
        try {
            $clientsatus = ClientStatus::find($id);
            if($clientsatus){
                $clientsatus->name = $request->name;
                if ($clientsatus->save()) {
                    return $this->commonResponse(true, 'Client Status updated successfully!', '', Response::HTTP_CREATED);
                }
            }
            return $this->commonResponse(false, 'Failed to update Client Status', 'Client Status Not Found', Response::HTTP_UNPROCESSABLE_ENTITY);
        } catch (QueryException $ex) {
            return $this->commonResponse(false, $ex->errorInfo[2], '', Response::HTTP_UNPROCESSABLE_ENTITY);
        } catch (Exception $ex) {
            return $this->commonResponse(false, $ex->getMessage(), '', Response::HTTP_UNPROCESSABLE_ENTITY);
        }
    }

    /**
     * Delete Client Status
     * @group  Client Status
     * @param int $id
     * @urlParam id integer required The ID of the Client Status. Example:1
     * @return JsonResponse
     * @authenticated
     */
    public function destroy(int $id): JsonResponse
    {
        $clientsatus = ClientStatus::find($id);
        if ($clientsatus) {
            $clientsatus->delete();
            return $this->commonResponse(true, 'Client Status deleted', '', Response::HTTP_OK);
        } else {
            return $this->commonResponse(false, 'Client Status not found!', '', Response::HTTP_NOT_FOUND);
        }
    }
}
