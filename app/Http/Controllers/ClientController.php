<?php

namespace App\Http\Controllers;

use App\Helpers\CountryHelper;
use App\Http\Resources\ClientResource;
use App\Models\User;
use Carbon\Carbon;
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
     * @return JsonResponse
     * @authenticated
     */

    public function create(Request $request): JsonResponse
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|min:3|max:60|unique:clients',
            'gender' => 'required|string|in:Male,Female',
            'phone_number' => 'required|numeric|unique:clients', //min:10|max:13
            'country_id' => 'required|integer|exists:countries,id',
            'region' => 'required|string|min:3|max:20',
            'city' => 'required|string|min:3|max:20',
            'timezone_id' => 'required|integer|exists:timezones,id',
            'age' => 'required|integer|not_in:0', //TODO specify if over 18 or above some particular age
            'status_id' => 'required|exists:statuses,id|integer',
            'channel_id' => 'required|integer|exists:channels,id',
            'languages' => 'required|string|min:3|max:30'
        ]);

        if ($validator->fails()) {
            return $this->commonResponse(false, Arr::flatten($validator->messages()->get('*')), '', Response::HTTP_UNPROCESSABLE_ENTITY);
        } else {
            try {
                $client = new Client;
                $client->name = $request->name;
                $client->phone_number = $request->phone_number;
                $client->country_id = $request->country_id;
                $client->gender = $request->gender;
                $client->region = $request->region;
                $client->city = $request->city;
                $client->timezone_id = $request->timezone_id;
                $client->languages = $request->input('languages'); //TODO comma separate these if multiple languages are provided
                $client->age = $request->age;
                $client->status_id = $request->status_id;
                $client->channel_id = $request->channel_id;
                if($client->save()){
                    $countryCode = CountryHelper::getCountryCode($request->country_id);
                    $yearVal = Carbon::now()->format('y');
                    $patient_id = $countryCode->long_code.'-'.$yearVal.'-'.'0000'.$client->id; //random_int(0,4).$client->id;
                    $client->update(['patient_id' => $patient_id]); //TODO change format to CountryCode-ProgramCode-Year-Cycle-Number
                    return $this->commonResponse(true, 'Client created successfully!', new ClientResource($client), Response::HTTP_CREATED);
                }
                return $this->commonResponse(false,'Failed to create client','', Response::HTTP_UNPROCESSABLE_ENTITY);
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
            'phone_number' => 'required|numeric', //min:10|max:13
            'country_id' => 'required|integer|exists:countries,id',
            'region' => 'nullable|string|min:3|max:20',
            'city' => 'nullable|string|min:3|max:20',
            'timezone_id' => 'nullable|integer|exists:timezones,id',
            'age' => 'required|integer|not_in:0',
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
                'gender' => $request->gender ?? $client->gender,
                'age' => $request->age ?? $client->age,
                'phone_number' => $request->phone_number,
                'country_id' => $request->country_id,
                'city'=> $request->city ?? $client->city,
                'region' => $request->region ?? $client->region,
                'timezone_id' => $request->timezone_id ?? $client->timezone_id,
            ];
            if($client->update($clientData)){
                return $this->commonResponse(true,'Client Updated Successfully', new ClientResource($client), Response::HTTP_OK);
            }
            return $this->commonResponse(false,'Failed to Update Client','', Response::HTTP_UNPROCESSABLE_ENTITY);
        }catch (QueryException $queryException){
            return $this->commonResponse(false, $queryException->errorInfo[2],'', Response::HTTP_UNPROCESSABLE_ENTITY);
        }catch (Exception $exception){
            Log::critical('Failed to Update Client Details. ERROR: '.$exception->getTraceAsString());
            return $this->commonResponse(false,$exception->getMessage(),'', Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    /**
     * Transfer Client
     * @param Request $request
     * @param int $id
     * @urlParam id integer required . The Client ID . Example - 1
     * @bodyParam staff_id integer required . The Staff ID (user in this case)
     * @return JsonResponse
     * @authenticated
     */
    public function transfer( Request $request, int $id ): JsonResponse
    {
        $validator = Validator::make($request->all(),[
            'staff_id' => 'required|integer|exists:users,id'
        ]);
        if($validator->fails())
        {
            return $this->commonResponse(false,Arr::flatten($validator->messages()->get('*')),'', Response::HTTP_UNPROCESSABLE_ENTITY);
        }
        try{
            $client = Client::with('timezone','country','status','channel','staff')->find($id);
            if(!$client){
                return $this->commonResponse(false,'Client Not Found','', Response::HTTP_NOT_FOUND);
            }
            $user = User::firstWhere('id', $request->staff_id);
            if(!$user){
                return $this->commonResponse(false,'Staff Not Found','', Response::HTTP_NOT_FOUND);
            }
            if($client->update(['staff_id' =>  $request->staff_id])){
                return $this->commonResponse(false,'Client transferred successfully','', Response::HTTP_OK);
            }
            return $this->commonResponse(false,'Failed to transfer client','', Response::HTTP_UNPROCESSABLE_ENTITY);
        }catch (QueryException  $queryException){
            return $this->commonResponse(false,$queryException->errorInfo[2],'', Response::HTTP_UNPROCESSABLE_ENTITY);
        }catch (Exception $exception){
            Log::critical('Failed to Transfer Client. ERROR: '. $exception->getTraceAsString());
            return $this->commonResponse(false, $exception->getMessage(),'', Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    /**
     * Bulk Edit Clients
     * @param Request $request
     * @bodyParam client_id required . The Client IDs . Example (1,2)
     * @bodyParam age integer . The Clients' ages
     * @bodyParam gender string . The Clients' genders
     * @bodyParam region string . The Clients' regions
     * @return JsonResponse
     * @authenticated
     */
    public function bulkEdit( Request $request ): JsonResponse
    {
        $validator = Validator::make($request->all(),[
            'client_id.*' => 'required|integer|exists:clients,id',
            'region' => 'nullable|string|min:3|max:30',
            'gender'  => 'nullable|string|in:Male,Female'
        ]);
        if($validator->fails()){
            return $this->commonResponse(false,Arr::flatten($validator->messages()->get('*')), '', Response::HTTP_UNPROCESSABLE_ENTITY);
        }
        try{
            $clientIds = explode(',', $request->client_id);
            for($i = 0, $iMax = count($clientIds); $i < $iMax; $i++){
                $client = Client::firstWhere('id', $clientIds[$i]);
                if(!$client){
                    return $this->commonResponse(false,'Client with ID '.$clientIds[$i].' Not Found','', Response::HTTP_NOT_FOUND);
                }
                if($client->update([
                    'gender' => $request->gender ?? $client[$i]->gender,
                    'age' => $request->age ?? $client[$i]->age,
                    'region' => $request->region ?? $client[$i]->region
                ])){ //TODO update more fields here
                    return $this->commonResponse(true,'Clients Updated successfully','', Response::HTTP_OK);
                }
                return $this->commonResponse(false,'Failed to update clients','', Response::HTTP_UNPROCESSABLE_ENTITY);
            }
        }catch (QueryException $queryException){
            return $this->commonResponse(false,$queryException->errorInfo[2],'', Response::HTTP_UNPROCESSABLE_ENTITY);
        }catch (Exception $exception){
            Log::critical('Could not perform the bulk edit operation. ERROR: '. $exception->getTraceAsString());
            return $this->commonResponse(false,$exception->getMessage(),'', Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    /**
     * Activate  Clients
     * @param Request $request
     * @bodyParam users required . The Client IDs . Example [1,2]
     * @return JsonResponse
     * @authenticated
     */
    public function activate(Request $request): JsonResponse
    {
        $validator = Validator::make($request->all(), [
            'users' => 'required|array',   
            'users.*' => 'integer|exists:clients,id'
        ]);
        if ($validator->fails()) { 
            return $this->commonResponse(false, Arr::flatten($validator->messages()->get('*')), '', Response::HTTP_UNPROCESSABLE_ENTITY);
        } else {
            try {
                
                Client::whereIn('id', $request->users)
                    ->update(['client_type' =>  'therapy','therapy' =>  1]);
                return $this->commonResponse(true, 'Clients updated successfully!','', Response::HTTP_OK);
            } catch (QueryException $ex) {
                return $this->commonResponse(false, $ex->errorInfo[2], '', Response::HTTP_UNPROCESSABLE_ENTITY);
            } catch (Exception $ex) {
                return $this->commonResponse(false, $ex->getMessage(), '', Response::HTTP_UNPROCESSABLE_ENTITY);
            }
        }
    }
}
