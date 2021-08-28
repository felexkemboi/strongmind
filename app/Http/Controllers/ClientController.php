<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Database\QueryException;
use Illuminate\Support\Arr;
use Exception;
use App\Models\Client;

/**
 * Class ClientController
 * @package App\Http\Controllers
 * @group Clients
 * APIs for clients
 */
class ClientController extends Controller
{

    /**
     * Create Client
     * @group Clients
     * @param Request $request
     * @return JsonResponse
     */

    public function create(Request $request): JsonResponse
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'patient_id' => 'required',
            'phone_number' => 'required',
            'country'      => 'required'
        ]);

        if ($validator->fails()) {
            return $this->commonResponse(false, Arr::flatten($validator->messages()->get('*')), '', Response::HTTP_UNPROCESSABLE_ENTITY);
        } else {
            try {
                $client = new Client;
                $client->name = $request->name;
                $client->patient_id = $request->patient_id;
                $client->phone_number = $request->phone_number;
                $client->country_id = $request->country_id;
                $client->gender = $request->gender;
                $client->region = $request->region;
                $client->city = $request->city;
                $client->timezone_id = $request->timezone_id;
                $client->languages = $request->languages;
                $client->age = $request->age;
                $client->client_type = $request->client_type;
                $client->therapy = $request->therapy;
                $client->status_id = $request->status_id;
                $client->channel_id = $request->channel_id;
                $client->staff_id = $request->staff_id;
                $client->active = $request->active;
                $client->save();
                return $this->commonResponse(true, 'Client created successfully!', '', Response::HTTP_CREATED);
            } catch (QueryException $ex) {
                return $this->commonResponse(false, $ex->errorInfo[2], '', Response::HTTP_UNPROCESSABLE_ENTITY);
            } catch (Exception $ex) {
                return $this->commonResponse(false, $ex->getMessage(), '', Response::HTTP_UNPROCESSABLE_ENTITY);
            }
        }
    }
}