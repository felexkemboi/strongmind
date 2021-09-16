<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\ClientNote;
use App\Models\User;
use App\Support\Collection;
use Illuminate\Database\QueryException;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;
use Symfony\Component\HttpFoundation\Response;
use Exception;

/**
 * API endpoints to manage client notes
 * @group Clients
 * Class ClientNoteController
 * @package App\Http\Controllers
 */
class ClientNoteController extends Controller
{
    /**
     * Add Client Notes
     * @param Request $request
     * @param int $id
     * @urlParam id integer required . The Client ID
     * @bodyParam private boolean required . Specify whether true or false
     * @bodyParam notes string required . The specific notes about this client
     * @return JsonResponse
     * @authenticated
     */
    public function create(Request $request, int $id): JsonResponse
    {
        $validator = Validator::make($request->all(), [
            'notes' => 'required|string|min:5|max:255',
            'private' => 'required|boolean'
        ]);
        if($validator->fails()){
            return $this->commonResponse(false,Arr::flatten($validator->messages()->get('*')),'', Response::HTTP_UNPROCESSABLE_ENTITY);
        }
        try{
            $client = Client::with('timezone','country','status','channel','staff')->find($id);
            if(!$client){
                return $this->commonResponse(false,'Client Does Not Exist','', Response::HTTP_NOT_FOUND);
            }
            $clientNoteData = [
                'client_id' => $client->id,
                'staff_id' => $request->user()->id,
                'private'  => $request->private,
                'notes'    => $request->notes
            ];
            if(ClientNote::create($clientNoteData)){
                return $this->commonResponse(true,'Client notes created successfully','', Response::HTTP_OK);
            }
            return $this->commonResponse(false,'Client notes not created','', Response::HTTP_UNPROCESSABLE_ENTITY);
        }catch (QueryException $queryException){
            return $this->commonResponse(false,$queryException->errorInfo[2],'', Response::HTTP_UNPROCESSABLE_ENTITY);
        }catch (Exception $exception){
            Log::critical('Could Not Create Client Notes. ERROR: '.$exception->getTraceAsString());
            return $this->commonResponse(false,$exception->getMessage(),'', Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    /**
     * List Client Public Notes
     * @param int $id
     * @return JsonResponse
     * @urlParam id integer required . The Client ID
     * @authenticated
     */
    public function getPublicNotes(int $id): JsonResponse
    {
        try{
            $client = Client::with('timezone','country','status','channel','staff')->find($id);
            if(!$client){
                return $this->commonResponse(false,'Client Does Not Exist','', Response::HTTP_NOT_FOUND);
            }
            $publicNotes = ClientNote::public()->where(function($query) use($client){
                $query->where('client_id', $client->id);
            })->select('client_id','staff_id','private','notes')->latest()->paginate(10);
            return $this->commonResponse(true,'success',$publicNotes, Response::HTTP_OK);
        }catch (QueryException $queryException){
            return $this->commonResponse(false,$queryException->errorInfo[2],'', Response::HTTP_UNPROCESSABLE_ENTITY);
        }catch (Exception $exception){
            Log::critical('Unable to fetch client public notes. ERROR: '.$exception->getTraceAsString());
            return $this->commonResponse(false,$exception->getMessage(),'', Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    /**
     * List Client Private Notes
     * @param Request $request
     * @param int $id
     * @urlParam id integer required. The Client's ID
     * @return JsonResponse
     * @authenticated
     */
    public function getPrivateNotes(Request $request, int $id): JsonResponse
    {
        try{
            $client = Client::with('timezone','country','status','channel','staff')->find($id);
            if(!$client){
                return $this->commonResponse(false,'Client Does Not Exist','', Response::HTTP_NOT_FOUND);
            }
            $privateNotes = ClientNote::private($request)->where(function($query) use($client){
                $query->where('client_id', $client->id);
            })->select('client_id','staff_id','private','notes')
                ->latest()
                ->paginate(10);
            return $this->commonResponse(true,'success', $privateNotes, Response::HTTP_OK);
        }catch (QueryException $queryException){
            return $this->commonResponse(false,$queryException->errorInfo[2],'', Response::HTTP_UNPROCESSABLE_ENTITY);
        }catch (Exception $exception){
            Log::critical('Unable to fetch client private notes. ERROR: '.$exception->getTraceAsString());
            return $this->commonResponse(false,$exception->getMessage(),'', Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }
}
