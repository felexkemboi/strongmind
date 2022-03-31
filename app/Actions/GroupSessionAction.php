<?php


namespace App\Actions;


use App\Http\Requests\GroupSessionRequest;
use App\Http\Requests\SessionAttendanceRequest;
use App\Http\Resources\GroupSessionResource;
use App\Models\Client;
use App\Models\ClientBioData;
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
            $sessionData = GroupService::getSessionsWithAttendance($group->id);
            return $this->commonResponse(true,'success', $sessionData,Response::HTTP_OK);
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
            $date_input = getDate(strtotime($request->session_date));

            $time = Carbon::create($date_input['year'], $date_input['mon'], $date_input['mday'], $date_input['hours'], $date_input['minutes'], $date_input['seconds'])->format('Y-m-d H:i:s');

            $newSession = GroupSession::create([
                'group_id' => $group->id,
                'session_date' => $time,
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
            $groupSession = GroupSession::with('attendance','group')->findOrFail($id);
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

            $clients = Client::whereIn('id', $sessionAttendanceRequest->client_id)->get();
            if($sessionAttendanceRequest->attended === false && $sessionAttendanceRequest->reason === null){
                return $this->commonResponse(false,'Please state some reason for non-attendance','', Response::HTTP_UNPROCESSABLE_ENTITY);
            }

            foreach ($clients as $client){
                $this->recordAttendance($client,$session,$sessionAttendanceRequest);
            }
            return $this->commonResponse(true,'Session Attendance recorded successfully', new GroupSessionResource($session), Response::HTTP_CREATED);
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
            $attendance = $groupSession->attendance->transform(function($data){
                $client = ClientBioData::select('first_name','last_name','other_name')->firstWhere(function (Builder $query) use($data){
                    $query->where('client_id', $data->client_id);
                });
                return [
                    'clientId'      => $data->client_id,
                    'attendanceId'  => $data->id,
                    'clientName'    => $client->first_name .' '.$client->last_name.' '.$client->other_name,
                    'attended'      => $data->attended,
                    'reason'        => $data->reason
                ];
            });
            $sessionAttendanceData = [
                'sessionId'     => $groupSession->id,
                'sessionDate'   => $groupSession->session_date,
                'attendance'    => $attendance
            ];
            return $this->commonResponse(true,'success', $sessionAttendanceData,Response::HTTP_OK);
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

    public function recordAttendance($client,$session,$sessionAttendanceRequest){
        $attendance = SessionAttendance::where('client_id',$client->id)
                ->where('session_id', $session->id)
                ->first();

        if($attendance){
            $attendance->update([
                'session_id' => $session->id,
                'client_id' => $client->id,
                'attended' => $sessionAttendanceRequest->attended,
                'reason'   => $sessionAttendanceRequest->reason,
            ]);
        }else{
            SessionAttendance::create([
                'session_id' => $session->id,
                'client_id' => $client->id,
                'attended' => $sessionAttendanceRequest->attended,
                'reason'   => $sessionAttendanceRequest->reason
            ]);
        }
        $attendanceCount = SessionAttendance::where('session_id', $session->id)->count();

        $session->update(['total_present' => $attendanceCount]);
    }
}
