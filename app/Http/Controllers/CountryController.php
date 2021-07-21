<?php

namespace App\Http\Controllers;

use App\Http\Resources\CountryResource;
use App\Models\Country;
use Exception;
use Illuminate\Database\QueryException;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;
use Symfony\Component\HttpFoundation\Response;

/**
 * Class CountryController
 * @package App\Http\Controllers
 * @group Shared
 * APIs for managing countries
 */
class CountryController extends Controller
{
    /**
     * All Countries
     * @return JsonResponse
     */
    public function all(): JsonResponse
    {
        $countries = Country::paginate(10);
        return $this->commonResponse(true, 'success', CountryResource::collection($countries)->response()->getData(true), Response::HTTP_OK);
    }

    /**
     * All Active Countries
     * @return JsonResponse
     */
    public function activeCountries(): JsonResponse
    {
        $countries = Country::query()->active()->get();
        return $this->commonResponse(true, 'success', CountryResource::collection($countries), Response::HTTP_OK);
    }
    /**
     * Activate or deactivate country
     * @param Request $request
     * @return JsonResponse
     * @bodyParam  country_id integer required County ID .
     * @authenticated
     *
     */
    public function toggleStatus(Request $request): JsonResponse
    {
        $validator = Validator::make($request->all(), [
            'country_id' => 'required|integer',
        ]);
        if ($validator->fails()) {
            return $this->commonResponse(false, Arr::flatten($validator->messages()->get('*')), '', Response::HTTP_UNPROCESSABLE_ENTITY);
        } else {
            try {
                $country = Country::where('id', $request->country_id)->first();
                if($country){
                    $status=$country->active;
                    if($status==1){
                        $country->update(['active' => 0]);
                    }
                    else{
                        $country->update(['active' => 1]);
                    }
                    return $this->commonResponse(true, 'Country status updated successfully!', '', Response::HTTP_CREATED);
                }
                else{
                    return $this->commonResponse(false, 'Country not found!', '', Response::HTTP_NOT_FOUND);

                }
            } catch (QueryException $ex) {
                return $this->commonResponse(false, $ex->errorInfo[2] ,'', Response::HTTP_UNPROCESSABLE_ENTITY);
            } catch (Exception $ex) {
                return $this->commonResponse(false, $ex->getMessage(), '', Response::HTTP_UNPROCESSABLE_ENTITY);
            }
        }
    }

    /**
     * Activate Country
     * @param Request $request
     * @bodyParam country_id integer required County ID .
     * @return JsonResponse
     * @authenticated
     */
    public function activate(Request $request): JsonResponse
    {
        $validator = Validator::make($request->all(),['country_id' => 'required']);
        if($validator->fails()){
            return $this->commonResponse(false,Arr::flatten($validator->messages()->get('*')),'',Response::HTTP_UNPROCESSABLE_ENTITY);
        }
        try{
            $country = Country::where('id',$request->country_id)->first();
            if(!$country){
                return $this->commonResponse(false,'Country Not Found','',Response::HTTP_NOT_FOUND);
            }
            $status = $country->active;
            if($status === Country::STATUS_ACTIVE){
                return $this->commonResponse(false,'Country status is active','',Response::HTTP_UNPROCESSABLE_ENTITY);
            }
            if($country->update(['active' => Country::STATUS_ACTIVE])){
                return $this->commonResponse(true, 'Country activated successfully!', '', Response::HTTP_CREATED);
            }
            return $this->commonResponse(false,'Country status not updated','',Response::HTTP_EXPECTATION_FAILED);
        }catch (QueryException $exception){
            return $this->commonResponse(false,$exception->errorInfo[2],'',Response::HTTP_UNPROCESSABLE_ENTITY);
        }catch (Exception $exception){
            Log::critical('');
            return $this->commonResponse(false,$exception->getMessage(),'',Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }
    /**
     * Deactivate Country
     * @param Request $request
     * @bodyParam country_id integer required County ID .
     * @return JsonResponse
     * @authenticated
     */
    public function deactivate(Request $request): JsonResponse
    {
        $validator = Validator::make($request->all(),['country_id' => 'required']);
        if($validator->fails()){
            return $this->commonResponse(false,Arr::flatten($validator->messages()->get('*')),'',Response::HTTP_UNPROCESSABLE_ENTITY);
        }
        try{
            $country = Country::where('id',$request->country_id)->first();
            if(!$country){
                return $this->commonResponse(false,'Country Not Found','',Response::HTTP_NOT_FOUND);
            }
            $status = $country->active;
            if($status === Country::STATUS_INACTIVE){
                return $this->commonResponse(false,'Country status is inactive','',Response::HTTP_UNPROCESSABLE_ENTITY);
            }
            if($country->update(['active' => Country::STATUS_INACTIVE])){
                return $this->commonResponse(true, 'Country deactivated successfully!', '', Response::HTTP_CREATED);
            }
            return $this->commonResponse(false,'Country status not updated','',Response::HTTP_EXPECTATION_FAILED);
        }catch (QueryException $exception){
            return $this->commonResponse(false,$exception->errorInfo[2],'',Response::HTTP_UNPROCESSABLE_ENTITY);
        }catch (Exception $exception){
            Log::critical('');
            return $this->commonResponse(false,$exception->getMessage(),'',Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }
}
