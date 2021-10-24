<?php


namespace App\Services;

use App\Models\Client;
use Illuminate\Database\QueryException;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use App\Support\Collection;
use Symfony\Component\HttpFoundation\Response;
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
            $id = $request->get('id');
            $phone = $request->get('phone');
            $country = (int)$request->get('country');
            $status = (int)$request->get('status');
            $channel = (int)$request->get('channel');
            $clientType = $request->get('client_type');
            $clientTypes = ['screening','therapy'];
            $num_records = (int)$request->get('records_per_page');
            $pagination_records = (int)$request->get('pagination_items');
            $clients = Client::query()->with('timezone', 'country', 'status', 'channel', 'staff', 'notes');

            //search by id
            $clients = $clients->where(function($query) use($id){
                $query->where('patient_id','ilike','%'. $id . '%');
            });

            //search by phone
            if ($request->has('phone') && $request->filled('phone')) {
                $clients = $clients->where(function ($query) use ($phone) {
                    $query->where('phone_number', 'like', '%'. $phone .'%');
                });
            }
            //search by country
            if ($request->has('country') && $request->filled('country')) {
                $clients = $clients->where(function ($query) use ($country) {
                    $query->where('country_id', '=', $country);
                });
            }
            //filter by client type
            if ($request->has('client_type') && $request->filled('client_type')) {
                if (in_array($clientType, $clientTypes, true)) {
                    if ($clientType === Client::SCREENING_CLIENT_TYPE) {
                        $clients = $clients->where('client_type', Client::SCREENING_CLIENT_TYPE);
                    }
                    if ($clientType === Client::THERAPY_CLIENT_TYPE) {
                        $clients = $clients->where('client_type', Client::THERAPY_CLIENT_TYPE);
                    }
                }

                return $this->commonResponse(false, 'Invalid client type', '', Response::HTTP_UNPROCESSABLE_ENTITY);
            }
            //search by status id
            if ($request->has('status') && $request->filled('status')) {
                $clients = $clients->where(function ($query) use ($status) {
                    $query->where('status_id', $status);
                });
            }
            //search by channel id
            if ($request->has('channel') && $request->filled('channel')) {
                $clients = $clients->where(function ($query) use ($channel) {
                    $query->where('channel_id', $channel);
                });
            }
            //get records based on the specified number
            if ($request->has('records_per_page') && $request->filled('records_per_page')) {
                $clients = $clients->limit($num_records)->latest()->get();
                return $this->commonResponse(true, 'success', (new Collection($clients))->paginate(10), Response::HTTP_OK);
            }
            //specify pagination number
            if ($request->has('pagination_items') && $request->filled('pagination_items')) {
                $clients = Client::with('timezone', 'country', 'status', 'channel', 'staff', 'notes')->latest()->paginate($pagination_records);
                return $this->commonResponse(true, 'success', $clients, Response::HTTP_OK);
            }

            if ($request->has('filters')) {
                $filter = $request->get('filters');
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
                $sort = $request->get('sort');
                $clients = $clients->orderBy($sort,'asc');
            }

            $clients = $clients->latest()->paginate(10);
            return $this->commonResponse(true,'success',$clients, Response::HTTP_OK);
        }catch (QueryException $queryException){
            return $this->commonResponse(false, $queryException->errorInfo[2], '', Response::HTTP_UNPROCESSABLE_ENTITY);
        } catch (\Exception $exception) {
            return $this->commonResponse(false, $exception->getMessage(), '', Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    private function createQuery($filterColumn,$filterValue)
    {
        return Client::select('id', 'last_name','first_name','name','other_name','nick_name',
            'date_of_birth','nationality',
            'education_level_id','marital_status_id',
            'phone_ownership_id','is_disabled',
            'patient_id', 'phone_number', 'region',
            'country_id', 'gender',
            'languages', 'age', 'status_id', 'channel_id',
            'staff_id', 'active', 'client_type')
            ->where($filterColumn, $filterValue);
    }
}
