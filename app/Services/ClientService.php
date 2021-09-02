<?php


namespace App\Services;


use App\Models\Client;
use App\Models\Misc\Channel;
use App\Models\Misc\Status;
use Illuminate\Database\QueryException;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use App\Support\Collection;
use Illuminate\Support\Facades\DB;
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
            $name = $request->get('name');
            $phone = $request->get('phone');
            $country = (int)$request->get('country');
            $status = (int)$request->get('status');
            $channel = (int)$request->get('channel');
            $client_type = $request->get('client_type');
            $filter = $request->get('filter_params');
            $filter_params = ['status','channel','screening','therapy'];
            $client_types = ['screening','therapy'];
            $num_records = (int)$request->get('records_per_page');
            $pagination_records = (int)$request->get('pagination_items');
            $clients = Client::query()->with('timezone','country','status','channel','staff','notes');

            //search by name
            if($request->has('name') && $request->filled('name')){
                $clients = $clients->where(function($query) use($name){
                    $query->where('name','ilike','%'. $name . '%');
                });
            }
            //search by phone
            if($request->has('phone') && $request->filled('phone')){
                $clients = $clients->where(function($query) use($phone){
                    $query->where('phone_number', 'like','%'. $phone .'%');
                });
            }
            //search by country
            if($request->has('country') && $request->filled('country')){
                $clients = $clients->where(function($query) use($country){
                    $query->where('country_id','=', $country);
                });
            }
            //filter by client type
            if($request->has('client_type') && $request->filled('client_type')) {
                if(in_array($client_type, $client_types, true)){
                    if($client_type === Client::SCREENING_CLIENT_TYPE){
                        $clients = $clients->where('client_type', Client::SCREENING_CLIENT_TYPE);
                    }
                    if($client_type === Client::THERAPY_CLIENT_TYPE){
                        $clients = $clients->where('client_type', Client::THERAPY_CLIENT_TYPE);
                    }
                }else{
                    return $this->commonResponse(false,'Invalid client type','', Response::HTTP_UNPROCESSABLE_ENTITY);
                }
            }
            //search by status id
            if($request->has('status') && $request->filled('status')){
                $clients = $clients->where(function($query) use($status){
                    $query->where('status_id',$status);
                });
            }
            //search by channel id
            if($request->has('channel') && $request->filled('channel')){
                $clients = $clients->where(function($query) use($channel){
                    $query->where('channel_id', $channel);
                });
            }
            //get records based on the specified number
            if($request->has('records_per_page') && $request->filled('records_per_page')){
                $clients = $clients->limit($num_records)->latest()->get();
                return $this->commonResponse(true,'success',(new Collection($clients))->paginate(10), Response::HTTP_OK);
            }
            //specify pagination number
            if($request->has('pagination_items') && $request->filled('pagination_items')){
                $clients = Client::with('timezone','country','status','channel','staff','notes')->latest()->paginate($pagination_records);
                return $this->commonResponse(true,'success',$clients, Response::HTTP_OK);
            }
            //filter
            if($request->has('filter_params') && $request->filled('filter_params')){
                if(in_array($filter, $filter_params, true)){
                    //filter by status
                    if($filter === $filter_params[0]){
                        $clientsByStatus = [];
                        $statuses = Status::all()->filter(function($status){
                            return $status->name !== NULL;
                        });
                        foreach ($statuses as $clientStatus){
                            $clientsByStatus[] = [
                                'status_id' => $clientStatus->id,
                                'name'   => $clientStatus->name,
                                'clients' => DB::table('clients')->select('id','name','patient_id','phone_number',
                                    'region','country_id','gender','languages','age','status_id','channel_id','staff_id','active','client_type')
                                    ->where(function($query) use($clientStatus){
                                        $query->where('status_id',$clientStatus->id);
                                    })->where('active',true)->latest()->get()
                            ];
                        }
                        return $this->commonResponse(true,'success',(new Collection($clientsByStatus))->paginate(10),Response::HTTP_OK);
                    }
                    //filter by channel
                    if($filter === $filter_params[1]){
                        $clientsByChannel = [];
                        $channels = Channel::all()->filter(function($channel){
                            return $channel->name !== NULL;
                        });
                        foreach ($channels as $clientChannel){
                            $clientsByChannel[] = [
                                'channel_id' => $clientChannel->id,
                                'name' => $clientChannel->name,
                                'clients' => DB::table('clients')->select('id','name','patient_id','phone_number',
                                    'region','country_id','gender','languages','age','status_id','channel_id','staff_id','active','client_type')
                                    ->where(function($query) use($clientChannel){
                                        $query->where('channel_id',$clientChannel->id);
                                    })->where('active',true)->latest()->get()
                            ];
                        }
                        return $this->commonResponse(true,'success', (new Collection($clientsByChannel))->paginate(10),Response::HTTP_OK);
                    }
                    //filter by client type(screening)
                    if($filter === $filter_params[2]){
                        $clients = DB::table('clients')->select('id','name','patient_id','phone_number',
                            'region','country_id','gender','languages','age','status_id','channel_id','staff_id','active','client_type')
                            ->where('client_type', Client::SCREENING_CLIENT_TYPE);
                    }
                    //filter by client type(therapy)
                    if($filter === $filter_params[3]){
                        $clients = DB::table('clients')->select('id','name','patient_id','phone_number',
                            'region','country_id','gender','languages','age','status_id','channel_id','staff_id','active','client_type')
                            ->where('client_type', Client::THERAPY_CLIENT_TYPE);
                    }
                }else{
                    return $this->commonResponse(false,'Invalid filter parameter','', Response::HTTP_UNPROCESSABLE_ENTITY);
                }
            }
            $clients = $clients->latest()->paginate(10);
            return $this->commonResponse(true,'success',$clients, Response::HTTP_OK);
        }catch (QueryException $queryException){
            return $this->commonResponse(false, $queryException->errorInfo[2], '', Response::HTTP_UNPROCESSABLE_ENTITY);
        }catch (\Exception $exception){
            return $this->commonResponse(false, $exception->getMessage(), '', Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }
}
