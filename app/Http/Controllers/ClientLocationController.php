<?php

namespace App\Http\Controllers;

use App\Models\ClientDistrict;
use App\Models\ClientMunicipality;
use App\Models\ClientParish;
use App\Models\ClientSubCounty;
use App\Models\ClientVillage;
use Illuminate\Database\QueryException;
use Exception;
use Illuminate\Http\JsonResponse;
use Symfony\Component\HttpFoundation\Response;

/**
 * EndPoints that list client locations
 *
 * Class ClientLocationController
 * @package App\Http\Controllers
 * @group Client Locations
 */
class ClientLocationController extends Controller
{
    /**
     * @return JsonResponse
     * @authenticated
     */
    public function districts(): JsonResponse
    {
        try {
            $districts = ClientDistrict::select(['id','name'])->latest()->get();
            return $this->commonResponse(true,'Success',$districts,Response::HTTP_OK);
        }catch (QueryException $queryException){
            return $this->commonResponse(false,$queryException->errorInfo[2],'',Response::HTTP_UNPROCESSABLE_ENTITY);
        }catch (Exception $exception){
            return $this->commonResponse(false,$exception->getMessage(),'', Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    /**
     * @return JsonResponse
     * @authenticated
     */
    public function subCounties():JsonResponse
    {
        try {
            $subCounties = ClientSubCounty::with('district')->select(['id','name','district_id'])->latest()->get();
            return $this->commonResponse(true,'Success',$subCounties,Response::HTTP_OK);
        }catch (QueryException $queryException){
            return $this->commonResponse(false,$queryException->errorInfo[2],'',Response::HTTP_UNPROCESSABLE_ENTITY);
        }catch (Exception $exception){
            return $this->commonResponse(false,$exception->getMessage(),'', Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    /**
     * @return JsonResponse
     * @authenticated
     */
    public function municipalities(): JsonResponse
    {
        try {
            $municipalities = ClientMunicipality::with('district')->select(['id','name','district_id'])->latest()->get();
            return $this->commonResponse(true,'Success',$municipalities,Response::HTTP_OK);
        }catch (QueryException $queryException){
            return $this->commonResponse(false,$queryException->errorInfo[2],'',Response::HTTP_UNPROCESSABLE_ENTITY);
        }catch (Exception $exception){
            return $this->commonResponse(false,$exception->getMessage(),'', Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    /**
     * @return JsonResponse
     * @authenticated
     */
    public function villages(): JsonResponse
    {
        try {
            $villages = ClientVillage::with('district')->select(['id','name','district_id'])->latest()->get();
            return $this->commonResponse(true,'Success',$villages,Response::HTTP_OK);
        }catch (QueryException $queryException){
            return $this->commonResponse(false,$queryException->errorInfo[2],'',Response::HTTP_UNPROCESSABLE_ENTITY);
        }catch (Exception $exception){
            return $this->commonResponse(false,$exception->getMessage(),'', Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    /**
     * @return JsonResponse
     * @authenticated
     */
    public function parish(): JsonResponse
    {
        try {
            $parish = ClientParish::with('district')->select(['id','name','district_id'])->latest()->get();
            return $this->commonResponse(true,'Success',$parish,Response::HTTP_OK);
        }catch (QueryException $queryException){
            return $this->commonResponse(false,$queryException->errorInfo[2],'',Response::HTTP_UNPROCESSABLE_ENTITY);
        }catch (Exception $exception){
            return $this->commonResponse(false,$exception->getMessage(),'', Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }
}
