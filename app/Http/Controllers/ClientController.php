<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Log;
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
     * @bodyParam name string required . The Client's Name
     * @bodyParam gender string required . The Client's Gender
     * @bodyParam phone_number integer required . The Client's Phone Number
     * @bodyParam country_id integer required . The Client's Country . Example 1
     * @bodyParam region string required . The Client's Region
     * @bodyParam city string required . The Client's City
     * @bodyParam timezone_id integer required . The Client's TimeZone . Example 1
     * @bodyParam languages string required . The Client's Languages(comma separated)
     * @bodyParam age integer required . The Client's Age
     * @bodyParam status_id integer required . The Client's Status . Example 1
     * @bodyParam channel_id integer required . The Client's Channel . Example 1
     * @bodyParam staff_id integer required . The Staff Assigned to this client . Example 1
     * @return JsonResponse
     * @authenticated
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
                $client->patient_id = $request->patient_id; //TODO change format to CountryCode-ProgramCode-Year-Cycle-Number
                $client->phone_number = $request->phone_number;
                $client->country_id = $request->country_id;
                $client->gender = $request->gender;
                $client->region = $request->region;
                $client->city = $request->city;
                $client->timezone_id = $request->timezone_id;
                $client->languages = $request->input('languages'); //TODO comma separate these if multiple languages are provided
                $client->age = $request->age;
                $client->client_type = $request->client_type;
                $client->therapy = $request->therapy; // TODO by default is false, status will change to true after client transfer(no need to insert this)
                $client->status_id = $request->status_id;
                $client->channel_id = $request->channel_id;
                $client->staff_id = $request->staff_id;
                $client->active = $request->active; //TODO no need to insert this as by default a client is active
                $client->save();
                return $this->commonResponse(true, 'Client created successfully!', '', Response::HTTP_CREATED);
            } catch (QueryException $ex) {
                return $this->commonResponse(false, $ex->errorInfo[2], '', Response::HTTP_UNPROCESSABLE_ENTITY);
            } catch (Exception $ex) {
                return $this->commonResponse(false, $ex->getMessage(), '', Response::HTTP_UNPROCESSABLE_ENTITY);
            }
        }
    }

    /**
     * Get Client by Id
     * @group Clients
     * @param int $id
     * @urlParam id integer required The ID of the client.Example:1
     * @return JsonResponse
     * @authenticated
     */
    public function show(int $id): JsonResponse
    {
        $client = Client::find($id);
        if ($client) {
            return $this->commonResponse(true, 'success', $client, Response::HTTP_OK);
        } else {
            return $this->commonResponse(false, 'User not found!', '', Response::HTTP_NOT_FOUND);
        }
    }

    /**
     * Update Client Profile
     * @param Request $request
     * @param int $id
     * @urlParam id integer required . The client ID . Example 1
     * @bodyParam name string required . The Client's Name
     * @bodyParam gender string required . The Client's Gender
     * @bodyParam phone_number integer required . Thr Client's Phone Number
     * @bodyParam country_id integer required . The Client's Country . Example 1
     * @bodyParam region string required . The Client's Region
     * @bodyParam city string required . The Client's City
     * @bodyParam timezone_id integer required. The Clients' TimeZone
     * @bodyParam age integer required. The Client's Age
     * @return JsonResponse
     * @authenticated
     */
    public function update( Request $request, int $id ): JsonResponse
    {
        $validator = Validator::make($request->all(),[
            'name' => 'required|string|min:3|max:60',
            'gender' => 'required|string|in:Male,Female',
            'phone_number' => 'required|integer|min:10|max:13',
            'country_id' => 'required|integer|exists:countries,id',
            'region' => 'required|string|min:3|max:20',
            'city' => 'required|string|min:3|max:20',
            'timezone_id' => 'required|integer|exists:timezones,id',
            'age' => 'required|integer',
        ]);
        if($validator->fails()){
            return $this->commonResponse(false,Arr::flatten($validator->messages()->get('*')),'', Response::HTTP_UNPROCESSABLE_ENTITY);
        }
        try{
            $client = Client::with('timezone','country','status','channel','staff')->find($id);
            if(!$client){
                return $this->commonResponse(false,'Client Not Found','', Response::HTTP_NOT_FOUND);
            }
            $clientData = [
                'name' => $request->name,
                'gender' => $request->gender,
                'age' => $request->age,
                'phone_number' => $request->phone_number,
                'country_id' => $request->country_id,
                'city'=> $request->city,
                'region' => $request->region,
                'timezone_id' => $request->timezone_id,
            ];
            if($client->update($clientData)){
                return $this->commonResponse(true,'Client Updated Successfully', $client, Response::HTTP_OK);
            }
            return $this->commonResponse(false,'Failed to Update Client','', Response::HTTP_UNPROCESSABLE_ENTITY);
        }catch (QueryException $queryException){
            return $this->commonResponse(false, $queryException->errorInfo[2],'', Response::HTTP_UNPROCESSABLE_ENTITY);
        }catch (Exception $exception){
            Log::critical('Failed to Update Client Details. ERROR: '.$exception->getTraceAsString());
            return $this->commonResponse(false,$exception->getMessage(),'', Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }
}
