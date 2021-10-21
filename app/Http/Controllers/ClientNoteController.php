<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\ClientNote;
use Illuminate\Database\QueryException;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Log;
use Symfony\Component\HttpFoundation\Response;
use App\Http\Requests\CreateNoteRequest;
use App\Http\Requests\EditNoteRequest;
use Illuminate\Support\Facades\Auth;

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
     * @param NoteRequest $request
     * @param int $id
     * @urlParam id integer required . The Client ID
     * @bodyParam private boolean required . Specify whether true or false
     * @bodyParam notes string required . The specific notes about this client
     * @return JsonResponse
     * @authenticated
     */
    public function create(CreateNoteRequest $request, int $id): JsonResponse
    {
        try {
            $client = Client::find($id);
            if (!$client) {
                return $this->commonResponse(false, 'Client Does Not Exist', '', Response::HTTP_NOT_FOUND);
            }
            $clientNoteData = [
                'client_id' => $client->id,
                'staff_id' => $request->user()->id,
                'private'  => $request->private,
                'notes'    => $request->notes
            ];
            if (ClientNote::create($clientNoteData)) {
                $user = Auth::user();
                activity('client')
                    ->performedOn($client)
                    ->causedBy($user)
                    ->log('Note for '.$client->name.' created');
                return $this->commonResponse(true, 'Client notes created successfully', '', Response::HTTP_OK);
            }
            return $this->commonResponse(false, 'Client notes not created', '', Response::HTTP_UNPROCESSABLE_ENTITY);
        } catch (QueryException $queryException) {
            return $this->commonResponse(false, $queryException->errorInfo[2], '', Response::HTTP_UNPROCESSABLE_ENTITY);
        } catch (Exception $exception) {
            Log::critical('Could Not Create Client Notes. ERROR: ' . $exception->getTraceAsString());
            return $this->commonResponse(false, $exception->getMessage(), '', Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    /**
     * List Client Public Notes
     * @param int $id
     * @return JsonResponse
     * @urlParam id integer required . The Client ID
     * @authenticated
     */
    public function getPublicNotes(Request $request,int $clientId): JsonResponse
    {
        try {
            $publicNotes = ClientNote::select('id','notes','created_at','staff_id')
                ->with(['staff:id,name,profile_pic_url'])
                ->where('client_id', $clientId)
                ->where('private', false)
                ->get();

            return $this->commonResponse(true, 'success', $publicNotes, Response::HTTP_OK);
        } catch (QueryException $queryException) {
            return $this->commonResponse(false, $queryException->errorInfo[2], '', Response::HTTP_UNPROCESSABLE_ENTITY);
        } catch (Exception $exception) {
            Log::critical('Unable to fetch client public notes. ERROR: ' . $exception->getTraceAsString());
            return $this->commonResponse(false, $exception->getMessage(), '', Response::HTTP_INTERNAL_SERVER_ERROR);
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
        try {
            $privateNotes = ClientNote::select('id','notes','created_at','staff_id')
                ->with(['staff:id,name,profile_pic_url'])
                ->where('client_id', $id)
                ->where('private', true)
                ->where('staff_id', $request->user()->id)
                ->get();
            return $this->commonResponse(true, 'success', $privateNotes, Response::HTTP_OK);
        } catch (QueryException $queryException) {
            return $this->commonResponse(false, $queryException->errorInfo[2], '', Response::HTTP_UNPROCESSABLE_ENTITY);
        } catch (Exception $exception) {
            Log::critical('Unable to fetch client private notes. ERROR: ' . $exception->getTraceAsString());
            return $this->commonResponse(false, $exception->getMessage(), '', Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    /**
     * Edit Client Note
     * @param EditNoteRequest $request
     * @param int $id
     * @urlParam id integer required . The Client ID
     * @bodyParam private boolean required . Specify whether true or false
     * @bodyParam notes string required . The specific notes about this client
     * @bodyParam client_id int required . The client the note belongs to
     * @bodyParam staff_id int required . The staff the note is responsible for
     * @return JsonResponse
     * @authenticated
     */
    public function edit(EditNoteRequest $request, int $id): JsonResponse
    {
        try {
            if (!ClientNote::find($id)) {
                return $this->commonResponse(false, 'Note Does Not Exist', '', Response::HTTP_NOT_FOUND);
            }

            if(ClientNote::find($id)->update([ 'client_id' => $request->client, 'staff_id'  => $request->staff,'private'  => $request->private,'notes'    => $request->notes])){
                return $this->commonResponse(true, 'Note updated successfully', '', Response::HTTP_OK);
            }
            return $this->commonResponse(false, 'Note not updated', '', Response::HTTP_UNPROCESSABLE_ENTITY);
        } catch (QueryException $queryException) {
            return $this->commonResponse(false, $queryException->errorInfo[2], '', Response::HTTP_UNPROCESSABLE_ENTITY);
        } catch (Exception $exception) {
            Log::critical('Could Not Update the note. ERROR: ' . $exception->getTraceAsString());
            return $this->commonResponse(false, $exception->getMessage(), '', Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    /**
     * Delete  Note
     * @param Request $request
     * @param int $id
     * @urlParam id integer required . The Note ID
     * @return JsonResponse
     * @authenticated
     */
    public function destroy($id)
    {

        try{
            \Log::debug($id);
            $note = ClientNote::find($id);
            if(!$note){
                return $this->commonResponse(false,'Note Does Not Exist','', Response::HTTP_NOT_FOUND);
            }
            if($note->delete()){
                return $this->commonResponse(true,'Note Deleted Successfully', '', Response::HTTP_OK);
            }
            return$this->commonResponse(false,'Failed To Delete Note','', Response::HTTP_EXPECTATION_FAILED);
        }catch (QueryException $queryException){
            return $this->commonResponse(false,$queryException->errorInfo[2], '', Response::HTTP_UNPROCESSABLE_ENTITY);
        }catch (Exception $exception){
            Log::critical('Could Not Delete Note. ERROR:  '.$exception->getTraceAsString());
            return $this->commonResponse(false,$exception->getMessage(), '', Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }
}
