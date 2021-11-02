<?php

namespace App\Http\Controllers;

use App\Models\ClientPhoneOwnership;
use Illuminate\Database\QueryException;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Exception;

/**
 * Class ClientPhoneOwnershipController
 * @package App\Http\Controllers
 * @group Clients
 */
class ClientPhoneOwnershipController extends Controller
{
    /**
     * List Client Phone Ownerships
     *
     * @param Request $request
     * @return JsonResponse
     * @authenticated
     */
    public function __invoke(Request $request): JsonResponse
    {
        try{
            $clientPhoneOwnershipData = ClientPhoneOwnership::select(['id','name'])->latest()->get();
            return $this->commonResponse(true,'Success',$clientPhoneOwnershipData,Response::HTTP_OK);
        }catch (QueryException $ex) {
            return $this->commonResponse(false, $ex->errorInfo[2], '', Response::HTTP_UNPROCESSABLE_ENTITY);
        }  catch (Exception $ex) {
            return $this->commonResponse(false, $ex->getMessage(), '', Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }
}
