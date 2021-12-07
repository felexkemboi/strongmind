<?php


namespace App\Actions;


use App\Http\Requests\GroupSessionRequest;
use App\Http\Requests\SessionAttendanceRequest;
use App\Http\Resources\GroupSessionResource;
use App\Models\Client;
use App\Models\Group;
use App\Models\GroupSession;
use App\Models\SessionAttendance;
use App\Services\GroupService;
use App\Traits\ApiResponser;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Builder;
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
                'session_date' => $request->session_date,
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
                'session_date' => $request->session_date !== null ? Carbon::parse($request->session_date)->format('d M Y') : $groupSession->session_date
            ]);
            return $this->commonResponse(true,'Group Session Updated Successfully','', Response::HTTP_OK);
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

    public function recordSessionAttendance(SessionAttendanceRequest $sessionAttendanceRequest, int $id): JsonResponse
    {
        try{
            $session = GroupSession::findOrFail($id);
            $group = Group::with('sessions','clients','staff','attendance','groupType')->findOrFail($session->id);
            $clients = Client::whereIn('id', $sessionAttendanceRequest->client_id)->get();
            if($sessionAttendanceRequest->attended === false && $sessionAttendanceRequest->reason === null){
                return $this->commonResponse(false,'Please state some reason for non-attendance','', Response::HTTP_UNPROCESSABLE_ENTITY);
            }
            foreach ($clients as $client){
                SessionAttendance::create([
                    'session_id' => $session->id,
                    'client_id' => $client->id,
                    'attended' => $sessionAttendanceRequest->attended,
                    'reason'   => $sessionAttendanceRequest->reason
                ]);
            }
            return $this->commonResponse(true,'Session Attendance recorded successfully',GroupService::viewGroupDetails($group), Response::HTTP_CREATED);
        }catch (ModelNotFoundException $exception){
            return $this->commonResponse(false,$exception->getMessage(),'', Response::HTTP_NOT_FOUND);
        }
        catch (QueryException $exception){
            return $this->commonResponse(false,$exception->errorInfo[2],'', Response::HTTP_UNPROCESSABLE_ENTITY);
        }catch (Exception $exception){
            return $this->commonResponse(false,$exception->getMessage(),'', Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    public function listSessionAttendance(int $id): JsonResponse
    {
        try{
            $groupSession = GroupSession::findOrFail($id);
            $attendanceData = SessionAttendance::where(function (Builder $query) use($groupSession){
                $query->where('session_id',$groupSession->id);
            })->get();
            return $this->commonResponse(true,'success', $attendanceData,Response::HTTP_OK);
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
