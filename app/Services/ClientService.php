<?php


namespace App\Services;

use App\Models\Client;
use Illuminate\Database\Query\Builder;
use Illuminate\Database\QueryException;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Symfony\Component\HttpFoundation\Response;
use App\Http\Resources\ClientResource;
use App\Traits\ApiResponser;

class ClientService
{
    use ApiResponser;

    /**
     * Handles client filters
     * @param Request $request
     * @return JsonResponse
     */
    public function filter(Request $request): JsonResponse
    {

        try{
            $id = $request->id;
            $phone = $request->phone;
            $country = $request->country;
            $staff = $request->staff;
            $status = $request->status;
            $channel = $request->channel;
            $clientType = $request->client_type;
            $pagination_records = $request->pagination_items;
            $filter = $request->filters;
            $sort = $request->sort;
            $clients = Client::query()->with('timezone', 'country', 'status', 'channel', 'staff', 'notes','bioData');

            //search by id
            if($request->id){
                $clients = $clients->where(function($query) use($id){
                    $query->where('patient_id','ilike','%'. $id . '%');
                });
            }
            //search by phone
            if ($request->phone) {
                $clients = $clients->where(function ($query) use ($phone) {
                    $query->where('phone_number', 'ilike', '%'. $phone .'%');
                });
            }
            //search by country
            if ($request->country) {
                $clients = $clients->where(function ($query) use ($country) {
                    $query->where('country_id', '=', $country);
                });
            }

            //search by country
            if ($request->staff) {
                $clients = $clients->where(function ($query) use ($staff) {
                    $query->where('staff_id', '=', $staff);
                });
            }
            //filter by client type
            if ($request->client_type) {
                if ($clientType === 'screening') {
                    $clients = $clients->where('client_type', Client::SCREENING_CLIENT_TYPE);
                }elseif ($clientType === 'therapy'){
                    $clients = $clients->where('client_type', Client::THERAPY_CLIENT_TYPE);
                }
            }

            //search by status id
            if ($request->status) {
                $clients = $clients->where(function ($query) use ($status) {
                    $query->where('status_id', $status);
                });
            }

            //search by channel id
            if ($request->channel) {
                $clients = $clients->where(function ($query) use ($channel) {
                    $query->where('channel_id', $channel);
                });
            }

            //specify pagination number
            if ($request->has('pagination_items') && $request->filled('pagination_items')) {
                $clients = Client::with('timezone', 'country', 'status', 'channel', 'staff', 'notes','bioData')->latest()->paginate($pagination_records);
                return $this->commonResponse(true, 'success',ClientResource::collection($clients)->response()->getData(true), Response::HTTP_OK);
            }

            if ($request->has('filters')) {
                $filterItem = explode('|', $filter);

                switch ($filterItem[0]) {
                    case 'status':
                        $clients = $this->createQuery('status_id',$filterItem[1]);
                        break;
                    case 'country':
                        $clients = $this->createQuery('country_id',$filterItem[1]);
                        break;
                    case 'channel':
                        $clients = $this->createQuery('channel_id',$filterItem[1]);
                        break;
                    case 'screening':
                        $clients = $this->createQuery('client_type',Client::SCREENING_CLIENT_TYPE);
                        break;
                    case 'therapy':
                        $clients = $this->createQuery('client_type',Client::THERAPY_CLIENT_TYPE);
                        break;
                }
            }

            //sort
            if($request->has('sort')){
                $clients = $clients->orderBy($sort,'DESC');
            }

            $clients = $clients->latest()->paginate(10);
            return $this->commonResponse(true, 'success',ClientResource::collection($clients)->response()->getData(true), Response::HTTP_OK);
        }catch (QueryException $queryException){
            return $this->commonResponse(false, $queryException->errorInfo[2], '', Response::HTTP_UNPROCESSABLE_ENTITY);
        } catch (\Exception $exception) {
            return $this->commonResponse(false, $exception->getMessage(), '', Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    private function createQuery($filterColumn,$filterValue): Builder
    {
        return DB::table('clients')
            ->join('client_bio_data','clients.id','=','client_bio_data.client_id')
            ->select(['clients.id','clients.name','client_bio_data.first_name',
                'client_bio_data.last_name','client_bio_data.other_name','client_bio_data.nick_name',
                'clients.patient_id','clients.phone_number','clients.region','clients.country_id',
                'clients.gender','clients.languages','clients.age','clients.status_id','clients.channel_id',
                'clients.staff_id','clients.active','clients.client_type',
                'client_bio_data.project_id','client_bio_data.education_level_id','client_bio_data.marital_status_id',
                'client_bio_data.phone_ownership_id','client_bio_data.district_id','client_bio_data.province_id',
                'client_bio_data.parish_ward_id','client_bio_data.village_id','client_bio_data.sub_county_id',
                'client_bio_data.nationality','client_bio_data.is_disabled'
            ])
            ->where($filterColumn, $filterValue);
    }
}
