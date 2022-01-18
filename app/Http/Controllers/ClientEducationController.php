<?php

namespace App\Http\Controllers;

use App\Models\ClientEducationLevel;
use Illuminate\Database\QueryException;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Exception;
use Symfony\Component\HttpFoundation\Response;

/**
 * Class ClientEducationController
 * @package App\Http\Controllers
 * @group Clients
 */
class ClientEducationController extends Controller
{
    /**
     * List Client Education
     *
     * @param Request $request
     * @return JsonResponse
     * @authenticated
     */
    public function __invoke(Request $request): JsonResponse
    {
        try{
            $clientEducationData = ClientEducationLevel::select(['id','name'])->latest()->get();
        return $this->commonResponse(true,'Success',$clientEducationData,Response::HTTP_OK);
        }catch (QueryException $ex) {
            return $this->commonResponse(false, $ex->errorInfo[2], '', Response::HTTP_UNPROCESSABLE_ENTITY);
        }  catch (Exception $ex) {
            return $this->commonResponse(false, $ex->getMessage(), '', Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }
}
