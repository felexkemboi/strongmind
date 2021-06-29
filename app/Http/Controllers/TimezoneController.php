<?php

namespace App\Http\Controllers;

use App\Http\Resources\TimezoneResource;
use App\Models\Country;
use App\Models\Timezone;
use Illuminate\Http\JsonResponse;
use Symfony\Component\HttpFoundation\Response;

/**
 * Class TimezoneController
 * @package App\Http\Controllers
 * @group Shared
 * Timezone APIs
 */
class TimezoneController extends Controller
{
    /**
     * All Timezones
     * @return JsonResponse
     */
    public function all(): JsonResponse
    {
        $timezones = Timezone::all();
        return $this->commonResponse(true, 'success', TimezoneResource::collection($timezones), Response::HTTP_OK);
    }

    /**
     * All Active timezones
     * @return JsonResponse
     */
    public function activeTimezones(): JsonResponse
    {
        $timezones = Country::query()->active()->get();
        return $this->commonResponse(true, 'success', TimezoneResource::collection($timezones), Response::HTTP_OK);
    }
}
