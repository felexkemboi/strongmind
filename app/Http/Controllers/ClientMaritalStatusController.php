<?php

namespace App\Http\Controllers;

use Illuminate\Database\QueryException;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use App\Models\ClientMaritalStatus;
use Symfony\Component\HttpFoundation\Response;
use Exception;

/**
 * Class ClientMaritalStatusController
 * @package App\Http\Controllers
 * @group Clients
 */
class ClientMaritalStatusController extends Controller
{
    /**
     * List Client Marital Statuses
     *
     * @param Request $request
     * @return JsonResponse
     * @authenticated
     */
    public function __invoke(Request $request): JsonResponse
    {
        try{
            $clientMaritalStatuses = ClientMaritalStatus::select(['id','name'])->latest()->get();
            return $this->commonResponse(true,'Success',$clientMaritalStatuses,Response::HTTP_OK);
        }catch (QueryException $ex) {
            return $this->commonResponse(false, $ex->errorInfo[2], '', Response::HTTP_UNPROCESSABLE_ENTITY);
        }  catch (Exception $ex) {
            return $this->commonResponse(false, $ex->getMessage(), '', Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }
}
