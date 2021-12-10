<?php

namespace App\Http\Controllers;

use Exception;
use App\Models\ClientStatus;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\JsonResponse;
use Illuminate\Database\QueryException;
use Illuminate\Http\RedirectResponse;
use Symfony\Component\HttpFoundation\Response;
use App\Http\Requests\CreateClientStatusRequest;

/**
 * APIs for managing ClientStatus
 *
 * Class ClientStatusController
 * @package App\Http\Controllers
 * @group Dynamic Fields
 *
 */

class ClientStatusController extends Controller
{
    /**
     * All Client Status.
     * @authenticated
     * @return JsonResponse
     */

    public function index(): JsonResponse
    {
        try {
            $statuses = ClientStatus::all();
            return $this->commonResponse(true, 'success', $statuses, Response::HTTP_OK);
        }catch (QueryException $queryException){
            return $this->commonResponse(false,$queryException->errorInfo[2],'', Response::HTTP_UNPROCESSABLE_ENTITY);
        }catch (Exception $exception){
            return $this->commonResponse(false, $exception->getMessage(),'', Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    /**
     * Create  Client Status
     * @param CreateClientStatusRequest $request
     * @return JsonResponse
     * @bodyParam name string required The Client Status' Name
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
            return $this->commonResponse(false, $ex->getMessage(), '', Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    /**
     * Get Client Status by Id
     * @param int $id
     * @return JsonResponse
     * @urlParam id integer required The ID of the client status.Example:1
     * @authenticated
     */
    public function show(int $id): JsonResponse
    {
        try{
            $clientStatus = ClientStatus::findOrFail($id);
            return $this->commonResponse(true, 'success', $clientStatus, Response::HTTP_OK);
        }catch (QueryException $queryException){
            return $this->commonResponse(false, $queryException->errorInfo[2],'', Response::HTTP_UNPROCESSABLE_ENTITY);
        }catch (ModelNotFoundException $modelNotFoundException){
            return $this->commonResponse(false,$modelNotFoundException->getMessage(),'', Response::HTTP_NOT_FOUND);
        }catch (Exception $exception){
            return $this->commonResponse(false,$exception->getMessage(),'', Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    /**
     * Edit Client Status
     * @param CreateClientStatusRequest $request
     * @param int $id
     * @return JsonResponse
     * @bodyParam name string required The Client Status' Name
     * @authenticated
     */

    public function update(CreateClientStatusRequest $request, int $id): JsonResponse
    {
        try {
            $clientStatus = ClientStatus::find($id);
            if($clientStatus){
                $clientStatus->name = $request->name;
                if ($clientStatus->save()) {
                    return $this->commonResponse(true, 'Client Status updated successfully!', '', Response::HTTP_CREATED);
                }
            }
            return $this->commonResponse(false, 'Failed to update Client Status', 'Client Status Not Found', Response::HTTP_UNPROCESSABLE_ENTITY);
        } catch (QueryException $ex) {
            return $this->commonResponse(false, $ex->errorInfo[2], '', Response::HTTP_UNPROCESSABLE_ENTITY);
        } catch (Exception $ex) {
            return $this->commonResponse(false, $ex->getMessage(), '', Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    /**
     * Delete Client Status
     * @param int $id
     * @urlParam id integer required The ID of the Client Status. Example:1
     * @return JsonResponse
     * @authenticated
     */
    public function destroy(int $id): JsonResponse
    {
        try{
            $clientStatus = ClientStatus::findOrFail($id);
            $clientStatus->delete();
            return $this->commonResponse(true, 'Client Status deleted', '', Response::HTTP_OK);
        }catch (QueryException $queryException){
            return $this->commonResponse(false, $queryException->errorInfo[2],'', Response::HTTP_UNPROCESSABLE_ENTITY);
        }catch (ModelNotFoundException $modelNotFoundException){
            return $this->commonResponse(false, $modelNotFoundException->getMessage(),'', RedirectResponse::HTTP_NOT_FOUND);
        }catch (Exception $exception){
            return $this->commonResponse(false, $exception->getMessage(),'', Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }
}
