<?php

namespace App\Http\Controllers;

use App\Models\Country;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CountryController extends Controller
{
    /**
     * All Countries
     * @return JsonResponse
     */
    public function all(): JsonResponse
    {
        $countries=Country::query()->select(['id','name','dialing_code'])
        ->get();
        return $this->commonResponse(true,'success',$countries,Response::HTTP_OK);
    }
    /**
     * All Active Countries
     * @return JsonResponse
     */
    public function activeCountries(): JsonResponse
    {
        $countries=Country::query()->select(['id','name','dialing_code'])
            ->where('active',1)
            ->get();
        return $this->commonResponse(true,'success',$countries,Response::HTTP_OK);
    }

    /**
     * Activate or deactivate country
     * @param Request $request
     */
    public function toggleStatus(Request $request){

    }
}
