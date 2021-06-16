<?php

namespace App\Http\Controllers;

use App\Http\Resources\CountryResource;
use App\Models\Country;
use Exception;
use Illuminate\Database\QueryException;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
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
        $countries = Country::query()->select(['id', 'name', 'dialing_code','active'])
            ->get();
        return $this->commonResponse(true, 'success', CountryResource::collection($countries), Response::HTTP_OK);
    }

    /**
     * All Active Countries
     * @return JsonResponse
     */
    public function activeCountries(): JsonResponse
    {
        $countries = Country::query()->active()->select(['id', 'name', 'dialing_code','active'])
            ->get();
        return $this->commonResponse(true, 'success', CountryResource::collection($countries), Response::HTTP_OK);
    }
    /**
     * Activate or deactivate country
     * @param Request $request
     * @return JsonResponse
     * @bodyParam  country_id integer required County ID .
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
}
