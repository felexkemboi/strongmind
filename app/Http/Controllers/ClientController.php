<?php

namespace App\Http\Controllers;

use Exception;

use Carbon\Carbon;
use App\Models\User;
use App\Models\Client;
use Illuminate\Support\Arr;
use App\Models\Misc\Status;
use Illuminate\Support\Str;
use App\Models\Misc\Channel;
use Illuminate\Http\Request;
use App\Models\ClientBioData;
use App\Helpers\CountryHelper;
use App\Helpers\ImportClients;
use App\Services\ClientService;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Facades\Excel;
use App\Http\Requests\TransferClient;
use App\Http\Resources\ClientResource;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\Validator;
use Illuminate\Database\Eloquent\Builder;
use App\Http\Requests\ClientUpdateRequest;
use App\Http\Requests\TransferClientsRequest;
use Symfony\Component\HttpFoundation\Response;
use Spatie\Activitylog\Models\Activity as ActivityLog;
use Illuminate\Database\Eloquent\ModelNotFoundException;


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
     * @bodyParam first_name string required . The Client's First Name
     * @bodyParam last_name string required . The Client's Last Name
     * @bodyParam other_name string required . The Client's Other Name
     * @bodyParam nick_name string . The Client's Nick Name
     * @bodyParam name string . The Client's Name
     * @bodyParam gender string required . The Client's Gender
     * @bodyParam phone_number integer required . The Client's Phone Number
     * @bodyParam country_id integer required . The Client's Country . Example 1
     * @bodyParam nationality string required . The Client's Nationality
     * @bodyParam project_id integer required . The Client's Project ID . Example 1
     * @bodyParam education_level_id integer required . The Client's Educational Level . Example 1
     * @bodyParam marital_status_id integer required . The Client's Marital Status . Example 1
     * @bodyParam phone_ownership_id integer required . The Client's Phone Ownership . Example 1
     * @bodyParam is_disabled boolean required . Do You Have Any Disability?
     * @bodyParam date_of_birth date required . The Client's Date of Birth
     * @bodyParam region string required . The Client's Region
     * @bodyParam city string required . The Client's City
     * @bodyParam timezone_id integer required . The Client's TimeZone . Example 1
     * @bodyParam languages string required . The Client's Languages(comma separated)
     * @bodyParam status_id integer required . The Client's Status . Example 1
     * @bodyParam channel_id integer required . The Client's Channel . Example 1
     * @bodyParam district_id integer required . The Client's District . Example 1
     * @bodyParam sub_county_id integer required . The Client's Sub County . Example 1
     * @bodyParam province_id integer  . The Client's Province/Municipality . Example 1
     * @bodyParam village_id integer  . The Client's Village/Cells . Example 1
     * @bodyParam parish_ward_id integer  . The Client's Ward/Parish . Example 1
     * @bodyParam program_type_id integer required . The Client's Program Type Id(Program)
     * @bodyParam referredThrough string . How the client was Reffered
     * @bodyParam referralType string . The Client's Referral type
     * @return JsonResponse
     * @authenticated
     */


    public function create(Request $request): JsonResponse
    {
        $validator = Validator::make($request->all(), [
            'name' => 'nullable|string|min:3|max:60|unique:clients',
            'first_name' => 'nullable|string|min:3|max:60',
            'last_name' => 'nullable|string|min:3|max:60',
            'other_name' => 'nullable|string|min:3|max:60',
            'nick_name' => 'nullable|string|min:3|max:60',
            'gender' => 'nullable|string|in:Male,Female,Other',
            'phone_number' => 'required|string|unique:clients', //min:10|max:13
            'country_id' => 'nullable|integer|exists:countries,id',
            'region' => 'nullable|string|min:3|max:20',
            'city' => 'nullable|string|min:3|max:20',
            'timezone_id' => 'nullable|integer|exists:timezones,id',
            'date_of_birth' => 'date|nullable',
            'nationality' => 'string|nullable|exists:countries,name',
            'status_id' => 'nullable|exists:statuses,id|integer',
            'channel_id' => 'nullable|integer|exists:channels,id',
            'languages' => 'nullable|string|min:3|max:30',
            'project_id' => 'nullable|integer|not_in:0|exists:programs,id',
            'education_level_id' => 'nullable|integer|not_in:0|exists:client_education_levels,id',
            'marital_status_id' => 'nullable|integer|not_in:0|exists:client_marital_statuses,id',
            'phone_ownership_id' => 'nullable|integer|not_in:0|exists:client_phone_ownerships,id',
            'is_disabled' => 'nullable|boolean',
            'district_id' => 'nullable|integer|not_in:0|exists:client_districts,id',
            'province_id' => 'nullable|integer|not_in:0|exists:client_municipalities,id',
            'sub_county_id' => 'nullable|integer|not_in:0|exists:client_sub_counties,id',
            'parish_ward_id' => 'nullable|integer|not_in:0|exists:client_parishes,id',
            'village_id' => 'nullable|integer|not_in:0|exists:client_villages,id',
            'program_type_id' => 'nullable|integer|not_in:0|exists:program_types,id',
            'referredThrough' => 'nullable|string|min:2|max:60',
            'referralType' => 'nullable|string|min:3|max:60',
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
                $client->status_id = $request->status_id;
                $client->channel_id = $request->channel_id;
                $client->referredThrough = $request->influence;
                $client->referralType = $request->type;
                $client->talk_to = $request->talkto;
                $client->age = $request->age;
                $client->contact_through = $request->contact_through;

                $client->age = Carbon::parse($request->date_of_birth)->diff(Carbon::now())->y;
                if($client->save()){
                    $this->addClientBioData($request, $client);
                    $countryCode = CountryHelper::getCountryCode($request->country_id);
                    $yearVal = Carbon::now()->format('y');
                    if($request->country_id){
                        $patient_id = $countryCode->long_code.'-'.$yearVal.'-'.'0000'.$client->id; //random_int(0,4).$client->id;
                        $client->update(['patient_id' => $patient_id]); //TODO change format to CountryCode-ProgramCode-Year-Cycle-Number
                    }
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
        try{
            $client = Client::with('bioData','status','channel','country','timezone','staff','notes')->findOrFail($id);
            return $this->commonResponse(true, 'success', new ClientResource($client), Response::HTTP_OK);
        }
        catch (ModelNotFoundException $exception){
            return $this->commonResponse(false, 'Client not found!', '', Response::HTTP_NOT_FOUND);
        }
        catch (QueryException $exception){
            return $this->commonResponse(false,$exception->errorInfo[2],'', Response::HTTP_UNPROCESSABLE_ENTITY);
        }
        catch (Exception $exception){
            Log::info('Failed to load client data. ERROR: '. $exception->getTraceAsString());
            return $this->commonResponse(false,$exception->getMessage(),'', Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    /**
     * Update Client Profile
     * @param ClientUpdateRequest $request
     * @param int $id
     * @return JsonResponse
     * @urlParam id integer required . The client ID . Example 1
     * @bodyParam name string . The Client's Name
     * @bodyParam first_name string . The Clients' First Name
     * @bodyParam last_name string . The Client's Last Name
     * @bodyParam other_name string . The Client's Other Name
     * @bodyParam nick_name string . The  Clients' Nick Name
     * @bodyParam nationality string . The Client's Nationality
     * @bodyParam languages string required . The Client's Languages(comma separated)
     * @bodyParam project_id integer . The Client's Project ID . Example 1
     * @bodyParam education_level_id integer . The Client's Educational Level . Example 1
     * @bodyParam marital_status_id integer . The Client's Marital Status . Example 1
     * @bodyParam phone_ownership_id integer . The Client's Phone Ownership . Example 1
     * @bodyParam is_disabled boolean . Do You Have Any Disability?
     * @bodyParam date_of_birth date . The Client's Date of Birth
     * @bodyParam district_id integer . The Client's District . Example 1
     * @bodyParam sub_county_id integer . The Client's Sub County . Example 1
     * @bodyParam province_id integer  . The Client's Province/Municipality . Example 1
     * @bodyParam village_id integer  . The Client's Village/Cells . Example 1
     * @bodyParam parish_ward_id integer  . The Client's Ward/Parish . Example 1
     * @bodyParam gender string  . The Client's Gender
     * @bodyParam phone_number integer  . Thr Client's Phone Number
     * @bodyParam country_id integer  . The Client's Country . Example 1
     * @bodyParam region string  . The Client's Region
     * @bodyParam city string  . The Client's City
     * @bodyParam timezone_id integer . The Clients' TimeZone
     * @bodyParam program_type_id integer  . The Client's Program Type Id(Program)
     * @bodyParam status_id integer . The Client's Status
     * @bodyParam channel_id integer . The Client's Channel
     * @bodyParam referredThrough string . How the client was Reffered
     * @bodyParam referralType string . The Client's Referral type
     * @authenticated
     */
    public function update( ClientUpdateRequest $request, int $id ): JsonResponse
    {
        try{
            $client = Client::with('timezone','country','status','channel','staff','bioData')->findOrFail($id);
            if(!$client){
                return $this->commonResponse(false,'Client Not Found','', Response::HTTP_NOT_FOUND);
            }

            $clientData = [
                'name' => $request->name ?? $client->name,
                'gender' => $request->gender ?? $client->gender,
                'age' => $request->age,
                'phone_number' => $request->phone_number ?? $client->phone_number,
                'country_id' => $request->country_id ?? $client->country_id,
                'city'=> $request->city ?? $client->city,
                'region' => $request->region ?? $client->region,
                'timezone_id' => $request->timezone_id ?? $client->timezone_id,
                'status_id'   => $request->status_id ?? $client->status_id,
                'channel_id'  => $request->channel_id ?? $client->channel_id,
                'referredThrough' => $client->referredThrough ?? $request->referredThrough,
                'referralType' => $client->referralType ?? $request->referralType,
                'languages' => Str::lower($request->languages) ?? $client->languages,
            ];

            if($client->update($clientData)){
                $clientBioData = ClientBioData::where(function(Builder $query) use($client){
                    $query->where('client_id', $client->id);
                })->first();
                if($clientBioData){
                    $clientBioData->update([
                        'first_name'            => $request->first_name ?? $clientBioData->first_name,
                        'last_name'             => $request->last_name ?? $clientBioData->last_name,
                        'other_name'            => $request->other_name ?? $clientBioData->last_name,
                        'nick_name'             => $request->nick_name ?? $clientBioData->nick_name,
                        'project_id'            => $request->project_id ?? $clientBioData->project_id,
                        'education_level_id'    => $request->education_level_id ?? $clientBioData->education_level_id,
                        'marital_status_id'     => $request->marital_status_id ?? $clientBioData->marital_status_id,
                        'phone_ownership_id'    => $request->phone_ownership_id ?? $clientBioData->phone_ownership_id,
                        'is_disabled'           => $request->is_disabled ?? $clientBioData->is_disabled,
                        'district_id'           => $request->district_id ?? $clientBioData->district_id,
                        'province_id'           => $request->province_id ?? $clientBioData->province_id,
                        'sub_county_id'         => $request->sub_county_id ?? $clientBioData->sub_county_id,
                        'parish_ward_id'        => $request->parish_ward_id ?? $clientBioData->parish_ward_id,
                        'village_id'            => $request->village_id ?? $clientBioData->village_id,
                        'program_type_id'       => $request->program_type_id ?? $clientBioData->program_type_id,
                        'nationality'           => $request->nationality ?? $clientBioData->nationality,
                        'date_of_birth'         => $request->date_of_birth ?? $clientBioData->date_of_birth,
                        'referredThrough'       => $client->referredThrough ?? $request->referredThrough,
                        'referralType'          => $client->referralType ?? $request->referralType,
                    ]);
                }
                return $this->commonResponse(true,'Client Updated Successfully', new ClientResource($client->fresh(['bioData'])), Response::HTTP_OK);
            }
            return $this->commonResponse(false,'Failed to Update Client','', Response::HTTP_UNPROCESSABLE_ENTITY);
        }catch (ModelNotFoundException $exception){
            return $this->commonResponse(false,$exception->getMessage(),'', Response::HTTP_NOT_FOUND);
        }
        catch (QueryException $queryException){
            return $this->commonResponse(false, $queryException->errorInfo[2],'', Response::HTTP_UNPROCESSABLE_ENTITY);
        }catch (Exception $exception){
            Log::critical('Failed to Update Client Details. ERROR: '.$exception->getTraceAsString());
            return $this->commonResponse(false,$exception->getMessage(),'', Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    /**
     * Transfer Client
     * @param TransferClient $request
     * @param int $clientId
     * @return JsonResponse
     * @urlParam id integer required . The Client ID . Example - 1
     * @bodyParam staff_id integer required . The Staff ID (user in this case)
     * @authenticated
     */
    public function transfer(TransferClient $request, int $clientId ): JsonResponse
    {
        try{
            $client = Client::findOrFail($clientId);

            if($client->staff_id === $request->staff_id){
                return $this->commonResponse(false,'Client already assigned to this staff','', Response::HTTP_ACCEPTED);
            }

            if($client->update(['staff_id' =>  $request->staff_id])){
                $user = Auth::user();
                activity('client')
                    ->performedOn($client)
                    ->causedBy($user)
                    ->log('Client transferred to '.$user->name);
                return $this->commonResponse(false,'Client transferred successfully', $client, Response::HTTP_OK);
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
     * Bulk transfer Clients
     * @param TransferClients $request $request
     * @bodyParam client_ids array required  The Clients' ids . Example - 1,2,3
     * @bodyParam staff_id integer required  The Staff ID (user in this case)
     * @return JsonResponse
     * @authenticated
     */

    public function bulkTransfer(TransferClientsRequest $request): JsonResponse
    {
        try{
            foreach (explode(',', $request->client_ids) as $client_id) {
                $client = Client::find((int)$client_id);
                if($client){
                    if($client->update(['staff_id' =>  $request->staff_id])){
                        $user = Auth::user();
                        activity('client')
                            ->performedOn($client)
                            ->causedBy($user)
                            ->log('Client transferred to '.$user->name);
                    }
                }
            }
            return $this->commonResponse(true,'Clients successfully transferred','', Response::HTTP_OK);
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

        $clientIds = explode(',', $request->client_id);

        try{

            for($i = 0, $iMax = count($clientIds); $i < $iMax; $i++){
                $client = Client::find($clientIds[$i]);

                if(!$client){
                    continue;
                }

                if($client->update([ 'gender' => $request->gender ?? $client->gender, 'age' => $request->age ?? $client->age, 'region' => $request->region ?? $client->region])){
                    $user = Auth::user();
                    activity('client')
                        ->performedOn($client)
                        ->causedBy($user)
                        ->log('Changed gender to '.$request->gender.', age to '.$request->age.', region to '.$request->region);
                }
            }
            return $this->commonResponse(true,'Clients Updated successfully','', Response::HTTP_OK);

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
     * @bodyParam users required  The Client IDs . Example [1,2]
     * @return JsonResponse
     * @authenticated
     */
    public function activate(Request $request): JsonResponse
    {
        $validator = Validator::make($request->all(), [
            'clients' => 'required|array',
            'clients.*' => 'integer|exists:clients,id'
        ]);
        if ($validator->fails()) {
            return $this->commonResponse(false, Arr::flatten($validator->messages()->get('*')), '', Response::HTTP_UNPROCESSABLE_ENTITY);
        } else {
            try {

                Client::whereIn('id', $request->clients)->update(['client_type' =>  'therapy','therapy' =>  1]);
                $user = Auth::user();
                foreach ($request->clients as $client) {
                    $clientRecords = Client::findorFail($client);
                    activity('client')
                    ->performedOn($clientRecords)
                    ->causedBy($user)
                    ->log('Changed client type  to Therapy and set it to Active');
                }
                return $this->commonResponse(true, 'Clients updated successfully!','', Response::HTTP_OK);
            } catch (QueryException $ex) {
                return $this->commonResponse(false, $ex->errorInfo[2], '', Response::HTTP_UNPROCESSABLE_ENTITY);
            } catch (Exception $ex) {
                return $this->commonResponse(false, $ex->getMessage(), '', Response::HTTP_UNPROCESSABLE_ENTITY);
            }
        }
    }

    /**
     * Get client activity log
     * @group Clients
     * @param Request $request
     * @bodyParam id int required  The Client's id
     * @return JsonResponse
     * @authenticated
     */

    public function clientLogs(int $id)
    {

        $activities = ActivityLog::orderBy('created_at', 'desc')
                        ->where('subject_id', $id)
                        ->where('log_name', 'client')
                        ->get();
        if(!$activities->isEmpty()){
            $activitiesList = collect();
            foreach($activities as $activity){
                if($activity->causer_id){
                    $activitiesList->push([
                        'description' => $activity->description,
                        'date' => $activity->created_at ,
                        'user' => User::findorFail($activity->causer_id)->name,
                        'profile' => User::findorFail($activity->causer_id)->profile_pic_url
                    ]);
                }else{
                    $activitiesList->push([
                        'description' => $activity->description,
                        'date' => $activity->created_at ,
                        'user' => '',
                        'profile' => ''
                    ]);
                }
            }
            return $this->commonResponse(true, 'Success', $activitiesList, Response::HTTP_OK);
        }
        return $this->commonResponse(true, 'Success', 'Client has no Logs', Response::HTTP_OK);
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
                    $client->nationality = $user['nationality'];
                    $client->phone_number = $user['phone_number'];
                    $client->country_id = $user['country_id'];
                    $client->gender = $user['gender'];
                    $client->region = $user['region'];
                    $client->city = $user['city'];
                    $client->timezone_id = $user['timezone_id'];
                    $client->languages = $user['languages']; //TODO comma separate these if multiple languages are provided
                    $client->age = Carbon::parse($user['date_of_birth'])->diff(Carbon::now())->y;
                    $client->status_id = $user['status_id'];
                    $client->channel_id = $user['channel_id'];
                    if($client->save()){
                        $clientBioData = [
                            'client_id' => $client->id,
                            'first_name' => $user['first_name'],
                            'last_name' => $user['last_name'],
                            'other_name' => $user['other_name'],
                            'nick_name' => $user['nick_name'],
                            'date_of_birth' => Carbon::parse($user['date_of_birth'])->format('Y-m-d'),
                            'education_level_id' => $user['education_level_id'],
                            'marital_status_id' => $user['marital_status_id'],
                            'phone_ownership_id' => $user['phone_ownership_id'],
                            'is_disabled' => $user['is_disabled'],
                            'project_id' => $user['project_id'],
                            'district_id' => $user['district_id'],
                            'province_id' => $user['province_id'],
                            'parish_ward_id' => $user['parish_ward_id'],
                            'village_id' => $user['village_id'],
                            'sub_county_id' => $user['sub_county_id'],
                            'nationality'   => $user['nationality'],
                            'program_type_id' => $user['program_type_id'],
                        ];
                        ClientBioData::create($clientBioData);
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

    /**
     * Change channel/status Client
     * @param Request $request
     * @param int $id
     * @urlParam id integer  . The Client ID . Example - 1
     * @bodyParam column  . The column that needs  updating
     * @return JsonResponse
     * @authenticated
     */
    public function changeChannel(Request $request, int $id ): JsonResponse
    {
        $client = Client::findOrFail($id);
        if(!$client){
            return $this->commonResponse(false, '', 'Client Not found', Response::HTTP_UNPROCESSABLE_ENTITY);
        }

        if ($request->has('status')) {
            if ($client->update(['status_id' =>  $request->get('status')])) {
                $status = Status::findOrFail($request->get('status'));
                $user = Auth::user();
                activity('client')
                    ->performedOn($client)
                    ->causedBy($user)
                    ->log('Client changed status to '.$status->name);
                return $this->commonResponse(true, 'Status changed successfully', '', Response::HTTP_OK);
            }
            return $this->commonResponse(true, 'Status not changed', '', Response::HTTP_UNPROCESSABLE_ENTITY);
        }

        if ($request->has('channel')) {
            if($client->update(['channel_id' =>  $request->get('channel')])){
                $channel = Channel::firstWhere('id', $request->get('channel'));
                $user = Auth::user();
                activity('client')
                    ->performedOn($client)
                    ->causedBy($user)
                    ->log('Client changed channel to '.$channel->name);
                return $this->commonResponse(true,'Channel changed successfully','', Response::HTTP_OK);
            }
            return $this->commonResponse(true,'Channel not changed','', Response::HTTP_UNPROCESSABLE_ENTITY);
        }
        //}

        return $this->commonResponse(false, 'success', 'Encountered an error during update', Response::HTTP_UNPROCESSABLE_ENTITY);
    }

    /**
     * @param Request $request
     * @param Client $client
     */
    private function addClientBioData(Request $request, Client $client): void
    {
        $clientBioData = [
            'client_id' => $client->id,
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'other_name' => $request->other_name,
            'nick_name' => $request->nick_name,
            'date_of_birth' => Carbon::parse($request->date_of_birth)->format('Y-m-d'),
            'education_level_id' => $request->education_level_id,
            'marital_status_id' => $request->marital_status_id,
            'phone_ownership_id' => $request->phone_ownership_id,
            'is_disabled' => $request->is_disabled,
            'project_id' => $request->project_id,
            'district_id' => $request->district_id,
            'province_id' => $request->province_id,
            'parish_ward_id' => $request->parish_ward_id,
            'village_id' => $request->village_id,
            'sub_county_id' => $request->sub_county_id,
            'nationality'  => $request->nationality,
            'program_type_id' => $request->program_type_id
        ];
        ClientBioData::create($clientBioData);
    }


    /**
     * Delete Client
     * @group Clients
     * @param int $id
     * @urlParam id integer required The ID of the client.Example:1
     * @return JsonResponse
     * @authenticated
     */
    public function destroy(int $id): JsonResponse
    {
        $client = Client::find($id);
        if ($client->delete()) {
            return $this->commonResponse(true, 'Client deleted', '', Response::HTTP_OK);
        } else {
            return $this->commonResponse(false, 'Client not found!', '', Response::HTTP_NOT_FOUND);
        }
    }
}

