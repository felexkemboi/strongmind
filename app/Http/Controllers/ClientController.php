<?php

namespace App\Http\Controllers;

use App\Helpers\CountryHelper;
use App\Helpers\ImportClients;
use App\Http\Resources\ClientResource;
use App\Models\Misc\Channel;
use App\Models\Misc\Status;
use App\Models\User;
use App\Services\ClientService;
use App\Support\Collection;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Database\QueryException;
use Illuminate\Support\Arr;
use Exception;
use App\Models\Client;
<<<<<<< Updated upstream
use Spatie\Activitylog\Models\Activity;
=======
use Maatwebsite\Excel\Facades\Excel;
>>>>>>> Stashed changes

/**
 * Class ClientController
 * @package App\Http\Controllers
 * @group Clients
 * APIs for clients
 */
class ClientController extends Controller
{
    public $clientService;

    /**
     * ClientController constructor.
     * @param ClientService $clientService
     */
    public function __construct(ClientService $clientService)
    {
        $this->clientService = $clientService;
    }

    /**
     * List|Filter|Search|Paginate|Sort Clients
     * @param Request $request
     * @bodyParam name string . Search by name
     * @bodyParam phone integer . Search by phone
     * @bodyParam country integer . Search by country_id
     * @bodyParam filter string . i.e filter by status,channel,screening,therapy
     * @bodyParam channel integer . search by channel id
     * @bodyParam status integer . search by status_id
     * @bodyParam client_type string . filter by either screening or therapy
     * @bodyParam pagination_items integer . specify number of records per page
     * @bodyParam  records_per_page integer . specify the number of records to pull from database
     * @return JsonResponse
     * @authenticated
     */
    public function index(Request $request): JsonResponse
    {
        return $this->clientService->filter($request);
    }

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
            return $this->commonResponse(false, 'Client not found!', '', Response::HTTP_NOT_FOUND);
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
            if($client->staff_id === $user->id){
                return $this->commonResponse(false,'Client already assigned to this staff','', Response::HTTP_UNPROCESSABLE_ENTITY);
            }
            if($client->update(['staff_id' =>  $user->id])){
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

    /**
     * Get clients from other sources 
     * @group Clients
     * @param Request $request
     * @bodyParam id int required . The Client's id
     * @return JsonResponse
     * @authenticated
     */

    public function clientLogs(int $id) 
    {
        $activities = Activity::all();

        $activities = $activities->where('causer_id', $id);

        if ($activities) {
            return $this->commonResponse(true, 'Success', $activities, Response::HTTP_OK);
        }
        return $this->commonResponse(false, 'No activities Found!', '', Response::HTTP_NOT_FOUND);
    }
    
     /*
     * Bulk load Clients
     * @param Request $request
     * @bodyParam file required.
     * @return JsonResponse
     * @authenticated
     */
    public function otherSources(Request $request): JsonResponse
    {
        $import = new ImportClients;
        $finalArray = array();
        $passed = collect([]);
        $failed_validations = collect([]);
        $failed_saved = collect([]);

        Excel::import($import, $request->file);
        $array = $import->getArray();
        foreach ($array as $user) {

            if ($import->validate($user)->fails()) {
                $failed_validations->push($user);
                continue;
            } else {
                try {
                    $client = new Client;
                    $client->name = $user['name'];
                    $client->phone_number = $user['phone_number'];
                    $client->country_id = $user['country_id'];
                    $client->gender = $user['gender'];
                    $client->region = $user['region'];
                    $client->city = $user['city'];
                    $client->timezone_id = $user['timezone_id'];
                    $client->languages = $user['languages']; //TODO comma separate these if multiple languages are provided
                    $client->age = $user['age'];
                    $client->status_id = $user['status_id'];
                    $client->channel_id = $user['channel_id'];
                    if($client->save()){
                        $countryCode = CountryHelper::getCountryCode($user['country_id']);
                        $yearVal = Carbon::now()->format('y');
                        $patient_id = $countryCode->long_code.'-'.$yearVal.'-'.'0000'.$client->id; //random_int(0,4).$client->id;
                        $client->update(['patient_id' => $patient_id]); //TODO change format to CountryCode-ProgramCode-Year-Cycle-Number
                        $passed->push($user);
                    }else{
                        $failed_saved->push($user);
                    }
                    
        
                } catch  (\Exception $e) { 
                    $failed_saved->push($user);
                    continue;
                }
            }
        }

        $finalArray = array(
            "passed" => $passed,
            "failed validations" => $failed_validations,
            "failed saved" => $failed_saved
        );
        return $this->commonResponse(true, 'Clients created successfully!', $finalArray, Response::HTTP_CREATED);

    }
}

