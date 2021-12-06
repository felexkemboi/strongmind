<?php


namespace App\Actions;


use App\Http\Requests\GroupSessionRequest;
use App\Http\Resources\GroupSessionResource;
use App\Models\Group;
use App\Models\GroupSession;
use App\Traits\ApiResponser;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Database\QueryException;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Symfony\Component\HttpFoundation\Response;
use Exception;

class GroupSessionAction
{
    use ApiResponser;

    public function listSessions(int $id): JsonResponse
    {
        try{
            $group = Group::with('sessions')->findOrFail($id);
            $sessions = $group->sessions->transform(function($session){
                return [
                    'group_id' => $session->group_id,
                    'session_date' => Carbon::parse($session->session_date)->format('d M Y'),
                    'total_clients' => $session->total_clients,
                    'total_present' => $session->total_present
                ];
            });
            return $this->commonResponse(true,'success', $sessions,Response::HTTP_OK);
        }catch (ModelNotFoundException $modelNotFoundException){
            return $this->commonResponse(false,'Group Does Not Exist','', Response::HTTP_NOT_FOUND);
        }
        catch (QueryException $queryException){
            return $this->commonResponse(false,$queryException->errorInfo[2],'', Response::HTTP_UNPROCESSABLE_ENTITY);
        }catch (Exception $exception){
            Log::critical('Failed to list groups. ERROR: '.$exception->getTraceAsString());
            return $this->commonResponse(false,$exception->getMessage(),'', Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    public function createSession(GroupSessionRequest $request,int $id): JsonResponse
    {
        try{
            $group = Group::with('clients','sessions')->findOrFail($id);
            $newSession = GroupSession::create([
                'group_id' => $group->id,
                'session_date' => Carbon::parse($request->session_date)->format('d M Y'),
                'total_clients' => $group->clients->count(),
                'total_present' => 0
            ]);
            $group->update([
                'last_session' => $newSession->session_date
            ]);
            return $this->commonResponse(true,'Session Created Successfully', new GroupSessionResource($newSession),Response::HTTP_CREATED);
        }catch (ModelNotFoundException $modelNotFoundException){
            return $this->commonResponse(false,'Group Does Not Exist','', Response::HTTP_NOT_FOUND);
        }
        catch (QueryException $queryException){
            return $this->commonResponse(false,$queryException->errorInfo[2],'', Response::HTTP_UNPROCESSABLE_ENTITY);
        }catch (Exception $exception){
            Log::critical('Failed to list groups. ERROR: '.$exception->getTraceAsString());
            return $this->commonResponse(false,$exception->getMessage(),'', Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    public function viewSessionDetails(int $id): JsonResponse
    {
        try{
            $groupSession = GroupSession::findOrFail($id);
            return $this->commonResponse(true,'success',new GroupSessionResource($groupSession), Response::HTTP_OK);
        }catch (ModelNotFoundException $modelNotFoundException){
            return $this->commonResponse(false,'Group Session Does Not Exist','', Response::HTTP_NOT_FOUND);
        }
        catch (QueryException $queryException){
            return $this->commonResponse(false,$queryException->errorInfo[2],'', Response::HTTP_UNPROCESSABLE_ENTITY);
        }catch (Exception $exception){
            Log::critical('Failed to list groups. ERROR: '.$exception->getTraceAsString());
            return $this->commonResponse(false,$exception->getMessage(),'', Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    public function updateSession(Request $request, int $id): JsonResponse
    {
        try{
            $groupSession = GroupSession::findOrFail($id);
            $groupSession->update([
                'last_session' => $request->session_date !== null ? Carbon::parse($request->session_date)->format('d M Y') : $groupSession->session_date
            ]);
        }catch (ModelNotFoundException $modelNotFoundException){
            return $this->commonResponse(false,'Group Session Does Not Exist','', Response::HTTP_NOT_FOUND);
        }
        catch (QueryException $queryException){
            return $this->commonResponse(false,$queryException->errorInfo[2],'', Response::HTTP_UNPROCESSABLE_ENTITY);
        }catch (Exception $exception){
            Log::critical('Failed to list groups. ERROR: '.$exception->getTraceAsString());
            return $this->commonResponse(false,$exception->getMessage(),'', Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    public function deleteSession(int $id): JsonResponse
    {
        try{
            $groupSession = GroupSession::findOrFail($id);
            $groupSession->delete();
            return $this->commonResponse(true,'success','', Response::HTTP_OK);
        }catch (ModelNotFoundException $modelNotFoundException){
            return $this->commonResponse(false,'Group Session Does Not Exist','', Response::HTTP_NOT_FOUND);
        }
        catch (QueryException $queryException){
            return $this->commonResponse(false,$queryException->errorInfo[2],'', Response::HTTP_UNPROCESSABLE_ENTITY);
        }catch (Exception $exception){
            Log::critical('Failed to list groups. ERROR: '.$exception->getTraceAsString());
            return $this->commonResponse(false,$exception->getMessage(),'', Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    public function recordSessionAttendance(int $id): JsonResponse
    {
        try{
            //to be continued
        }catch (ModelNotFoundException $modelNotFoundException){
            return $this->commonResponse(false,'Group Session Does Not Exist','', Response::HTTP_NOT_FOUND);
        }
        catch (QueryException $queryException){
            return $this->commonResponse(false,$queryException->errorInfo[2],'', Response::HTTP_UNPROCESSABLE_ENTITY);
        }catch (Exception $exception){
            Log::critical('Failed to list groups. ERROR: '.$exception->getTraceAsString());
            return $this->commonResponse(false,$exception->getMessage(),'', Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    public function listSessionAttendance(int $id): JsonResponse
    {
        try{
            //to be continued
        }catch (ModelNotFoundException $modelNotFoundException){
            return $this->commonResponse(false,'Group Session Does Not Exist','', Response::HTTP_NOT_FOUND);
        }
        catch (QueryException $queryException){
            return $this->commonResponse(false,$queryException->errorInfo[2],'', Response::HTTP_UNPROCESSABLE_ENTITY);
        }catch (Exception $exception){
            Log::critical('Failed to list groups. ERROR: '.$exception->getTraceAsString());
            return $this->commonResponse(false,$exception->getMessage(),'', Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }
}
