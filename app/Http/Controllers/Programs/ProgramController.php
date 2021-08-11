<?php

namespace App\Http\Controllers\Programs;

use App\Http\Controllers\Controller;
use App\Http\Resources\Programs\ProgramResource;
use App\Models\Programs\Program;
use App\Services\ProgramService;
use App\Support\Collection;
use Illuminate\Database\QueryException;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Exception;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;
use Symfony\Component\HttpFoundation\Response;

/**
 * Class ProgramController
 * @package App\Http\Controllers\Programs
 * @group Programs
 * API Endpoints for managing programs
 */
class ProgramController extends Controller
{
    public $programService;

    public function __construct(ProgramService $programService){
        $this->programService = $programService;
    }
    /**
     * List Programs
     *
     * @return JsonResponse
     * @authenticated
     */
    public function index(): JsonResponse
    {
        try{
            $programs = Program::with('office','programType')->latest()->get()->transform(function($program){
                    return new ProgramResource($program);
            })->groupBy('office_id');
            if($programs->isEmpty()){
                return $this->commonResponse(false,'Programs Not Found','', Response::HTTP_NOT_FOUND);
            }
            return $this->commonResponse(true,'Success',(new Collection($programs)), Response::HTTP_OK);
        }catch (QueryException $queryException){
            return $this->commonResponse(false,$queryException->errorInfo[2],'', Response::HTTP_UNPROCESSABLE_ENTITY);
        }catch (Exception $exception){
            Log::critical('Failed to fetch programs list. ERROR: '. $exception->getTraceAsString());
            return $this->commonResponse(false,$exception->getMessage(),'', Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    /**
     * Create Program
     *
     * @param Request $request
     * @bodyParam name string required Program Name
     * @bodyParam office_id integer required Office ID. Example-1
     * @bodyParam program_code string required Program Code
     * @bodyParam program_type_id integer required Program Type. Example-1
     * @bodyParam colour_option string required Colour Code
     * @return JsonResponse
     * @authenticated
     */
    public function store(Request $request): JsonResponse
    {
        $validator = Validator::make($request->all(),[
            'office_id' => 'required|exists:offices,id|integer',
            'name' => 'required|unique:programs|string|min:4|max:60',
            'program_code' => 'required|unique:programs|string|min:3|max:30',
            'program_type_id' => 'required|integer|exists:program_types,id',
            'colour_option' => 'required|string',
        ]);
        if($validator->fails()){
            return $this->commonResponse(false, Arr::flatten($validator->messages()->get('*')),'', Response::HTTP_UNPROCESSABLE_ENTITY);
        }
        $programData = [
            'office_id'         => $request->office_id,
            'name'              => $request->name,
            'program_code'      => $request->program_code,
            'program_type_id'   => $request->program_type_id,
            'colour_option'     => $request->colour_option,
            'member_count'      => 0
        ];
        try{
            $newProgram = Program::create($programData);
            if($newProgram){
                return $this->commonResponse(true,'Program Created Successfully','', Response::HTTP_CREATED);
            }
            return $this->commonResponse(false,'Program Not Created','', Response::HTTP_UNPROCESSABLE_ENTITY);
        }catch (QueryException $queryException){
            return $this->commonResponse(false,$queryException->errorInfo[2],'', Response::HTTP_UNPROCESSABLE_ENTITY);
        }catch (Exception $exception){
            Log::critical('Could Not Create New Program. ERROR: '.$exception->getTraceAsString());
            return $this->commonResponse(false, $exception->getMessage(),'', Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    /**
     * Display Program Details
     *
     * @param int $id
     * @urlParam id integer required The Program ID. Example-1
     * @return JsonResponse
     * @authenticated
     */
    public function show(int $id): JsonResponse
    {
        try{
            $program = Program::with('office','programType')->find($id);
            if(!$program){
                return $this->commonResponse(false,'Program Does Not Exist','', Response::HTTP_NOT_FOUND);
            }
            return $this->commonResponse(true,'success',new ProgramResource($program), Response::HTTP_OK);
        }catch (QueryException $queryException){
            return $this->commonResponse(false,$queryException->errorInfo[2],'', Response::HTTP_UNPROCESSABLE_ENTITY);
        }catch (Exception $exception){
            Log::critical('Could Not Fetch Program Details. ERROR: '.$exception->getTraceAsString());
            return $this->commonResponse(false,$exception->getMessage(),'', Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    /**
     * Update Program
     *
     * @param Request $request
     * @param int $id
     * @bodyParam name string required The Program Name
     * @bodyParam office_id integer required The Office ID Example-1
     * @bodyParam program_code string required The Program Code
     * @bodyParam program_type_id integer required The Program Type ID Example-1
     * @bodyParam colour_option string required the Program Colour Code
     * @urlParam id integer required the Program ID Example-1
     * @return JsonResponse
     * @authenticated
     */
    public function update(Request $request, int $id): JsonResponse
    {
        $validator = Validator::make($request->all(),[
            'office_id' => 'required|exists:offices,id|integer',
            'name' => 'required|string|min:4|max:60',
            'program_code' => 'required|string|min:3|max:30',
            'program_type_id' => 'required|integer|exists:program_types,id',
            'colour_option' => 'required|string',
        ]);
        if($validator->fails()){
            return $this->commonResponse(false, Arr::flatten($validator->messages()->get('*')), '', Response::HTTP_UNPROCESSABLE_ENTITY);
        }
        try {
            $program = Program::with('office','programType')->find($id);
            if(!$program){
                return $this->commonResponse(false,'Program Does Not Exist', '', Response::HTTP_NOT_FOUND);
            }
            $programUpdate = $program->update([
                'name' => $request->name,
                'office_id' => $request->office_id,
                'program_code' => $request->program_code,
                'program_type_id'  => $request->program_type_id,
                'colour_option' => $request->colour_option,
            ]);
            if($programUpdate){
                return $this->commonResponse(true,'Program Updated Successfully', new ProgramResource($program),Response::HTTP_OK);
            }
            return $this->commonResponse(false,'Failed To Update Program','', Response::HTTP_EXPECTATION_FAILED);
        }catch (QueryException $queryException){
            return $this->commonResponse(false,$queryException->errorInfo[2],'', Response::HTTP_UNPROCESSABLE_ENTITY);
        }catch (Exception $exception){
            Log::critical('Failed to update program. ERROR: '.$exception->getTraceAsString());
            return $this->commonResponse(false,$exception->getMessage(),'', Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    /**
     * Delete Program
     *
     * @param int $id
     * @urlParam id integer required The Program ID Example-1
     * @return JsonResponse
     * @authenticated
     */
    public function destroy(int $id): JsonResponse
    {
        try{
            $program = Program::with('office','programType')->find($id);
            if(!$program){
                return $this->commonResponse(false,'Program Does Not Exist','', Response::HTTP_NOT_FOUND);
            }
            if($program->delete()){
                return $this->commonResponse(true,'Program Deleted Successfully', '', Response::HTTP_OK);
            }
            return$this->commonResponse(false,'Failed To Delete Program','', Response::HTTP_EXPECTATION_FAILED);
        }catch (QueryException $queryException){
            return $this->commonResponse(false,$queryException->errorInfo[2], '', Response::HTTP_UNPROCESSABLE_ENTITY);
        }catch (Exception $exception){
            Log::critical('Could Not Delete Program. ERROR:  '.$exception->getTraceAsString());
            return $this->commonResponse(false,$exception->getMessage(), '', Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    /**
     * Send Member Invites
     * @param Request $request
     * @param $id
     * @urlParam id integer required The Program ID
     * @bodyParam email email required The User Email Address
     * @bodyParam member_type_id integer The Member Type ID
     * @return JsonResponse
     * @authenticated
     */
    public function sendInvites(Request $request, $id): JsonResponse
    {
        return $this->programService->inviteMembers($request, $id);
    }

    /**
     * Process Member Invites
     * @param Request $request
     * @return JsonResponse
     * @bodyParam invite_id string required The User Invite Token
     * @authenticated
     */
    public function acceptInvite(Request $request): JsonResponse
    {
        return $this->programService->processInvite($request);
    }
}
