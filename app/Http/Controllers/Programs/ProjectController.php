<?php

namespace App\Http\Controllers\Programs;

use App\Http\Controllers\Controller;
use App\Http\Resources\Programs\ProjectResource;
use App\Models\Office;
use App\Models\Country;
use App\Models\User;
use App\Models\Programs\Project;
use App\Services\ProjectService;
use Illuminate\Database\QueryException;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Exception;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;
use Symfony\Component\HttpFoundation\Response;

/**
 * API Endpoints for managing Projects
 *
 * Class ProjectController
 * @package App\Http\Controllers\Projects
 * @group Projects
 *
 */
class ProjectController extends Controller
{
    public $projectService;

    public function __construct(ProjectService $projectService){
        $this->projectService = $projectService;
    }
    /**
     * List Projects
     *
     * @return JsonResponse
     * @authenticated
     */
    public function index(): JsonResponse
    {
        try{
            $offices = Office::all();
            $data = [];
            foreach($offices as $office){
                   $data[] = [
                       'office_id' => $office->id,
                       'name' => $office->name ?? NULL,
                       'projects' => DB::table('programs')->select('id', 'name', 'member_count', 'colour_option','program_type_id')->where(function($query) use($office){
                           return $query->where('office_id',$office->id);
                       })->whereNotNull('office_id')->get()
                   ];
            }
            return $this->commonResponse(true,'success',$data,Response::HTTP_OK);
        }catch (QueryException $queryException){
            return $this->commonResponse(false,$queryException->errorInfo[2],'', Response::HTTP_UNPROCESSABLE_ENTITY);
        }catch (Exception $exception){
            Log::critical('Failed to fetch projects list. ERROR: '. $exception->getTraceAsString());
            return $this->commonResponse(false,$exception->getMessage(),'', Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    /**
     * Create Project
     *
     * @param Request $request
     * @bodyParam name string required Project Name
     * @bodyParam office_id integer required Office ID. Example-1
     * @bodyParam program_type_id integer required Project Type. Example-1
     * @bodyParam colour_option string required Colour Code
     * @return JsonResponse
     * @authenticated
     */
    public function store(Request $request): JsonResponse
    {
        $validator = Validator::make($request->all(),[
            'office_id' => 'required|exists:offices,id|integer',
            'name' => 'required|unique:programs|string|min:4|max:60',
            'program_type_id' => 'required|integer|exists:program_types,id',
            'colour_option' => 'nullable|string',
        ]);
        if($validator->fails()){
            return $this->commonResponse(false, Arr::flatten($validator->messages()->get('*')),'', Response::HTTP_UNPROCESSABLE_ENTITY);
        }
        $office = Office::find($request->office_id);
        $country = Country::find($office->country_id);
        $projectData = [
            'office_id'         => $request->office_id,
            'name'              => $request->name,
            'program_type_id'   => $request->program_type_id,
            'colour_option'     => $request->colour_option,
            'member_count'      => 0
        ];
        try{
           if($newProject = Project::create($projectData)){
               $code = $country->country_code.'-'.now()->year.'-000'.$newProject->id;
               $newProject->update(['program_code' => $code]);
               return $this->commonResponse(true,'Project Created Successfully', $newProject , Response::HTTP_CREATED);
           }
            return $this->commonResponse(false,'Project Not Created','', Response::HTTP_UNPROCESSABLE_ENTITY);
        }catch (QueryException $queryException){
            return $this->commonResponse(false,$queryException->errorInfo[2],'', Response::HTTP_UNPROCESSABLE_ENTITY);
        }catch (Exception $exception){
            Log::critical('Could Not Create New Program. ERROR: '.$exception->getTraceAsString());
            return $this->commonResponse(false, $exception->getMessage(),'', Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    /**
     * Display Project Details
     *
     * @param int $id
     * @urlParam id integer required The Project ID. Example-1
     * @return JsonResponse
     * @authenticated
     */
    public function show(int $id): JsonResponse
    {
        try{
            $project = Project::with('office','programType')->find($id);
            if(!$project){
                return $this->commonResponse(false,'Project Does Not Exist','', Response::HTTP_NOT_FOUND);
            }
            return $this->commonResponse(true,'success',new ProjectResource($project), Response::HTTP_OK);
        }catch (QueryException $queryException){
            return $this->commonResponse(false,$queryException->errorInfo[2],'', Response::HTTP_UNPROCESSABLE_ENTITY);
        }catch (Exception $exception){
            Log::critical('Could Not Fetch Project Details. ERROR: '.$exception->getTraceAsString());
            return $this->commonResponse(false,$exception->getMessage(),'', Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    /**
     * Display Project users
     *
     * @param int $id
     * @urlParam id integer required The Project ID. Example-1
     * @return JsonResponse
     * @authenticated
     */
    public function users(int $id): JsonResponse
    {
        try {
            $office = Office::find($id);
            $data = User::where('invite_accepted', 1)->where('office_id', $office->id);

            return $this->commonResponse(true, 'success', $data, Response::HTTP_OK);
        } catch (QueryException $queryException) {
            return $this->commonResponse(false, $queryException->errorInfo[2], '', Response::HTTP_UNPROCESSABLE_ENTITY);
        }
    }

    /**
     * Update Project
     *
     * @param Request $request
     * @param int $id
     * @bodyParam name string required The Project Name
     * @bodyParam office_id integer required The Office ID Example-1
     * @bodyParam program_type_id integer required The Project Type ID Example-1
     * @bodyParam colour_option string required the Project Colour Code
     * @urlParam id integer required the Project ID Example-1
     * @return JsonResponse
     * @authenticated
     */
    public function update(Request $request, int $id): JsonResponse
    {
        $validator = Validator::make($request->all(),[
            'office_id' => 'required|exists:offices,id|integer',
            'name' => 'required|string|min:4|max:60',
            'program_type_id' => 'required|integer|exists:program_types,id',
            'colour_option' => 'required|string',
        ]);
        if($validator->fails()){
            return $this->commonResponse(false, Arr::flatten($validator->messages()->get('*')), '', Response::HTTP_UNPROCESSABLE_ENTITY);
        }
        try {
            $project = Project::with('office','programType')->find($id);
            if(!$project){
                return $this->commonResponse(false,'Project Does Not Exist', '', Response::HTTP_NOT_FOUND);
            }
            $projectUpdate = $project->update([
                'name' => $request->name,
                'office_id' => $request->office_id,
                'program_type_id'  => $request->program_type_id,
                'colour_option' => $request->colour_option,
            ]);
            if($projectUpdate){
                return $this->commonResponse(true,'Project Updated Successfully', new ProjectResource($project),Response::HTTP_OK);
            }
            return $this->commonResponse(false,'Failed To Update Project','', Response::HTTP_EXPECTATION_FAILED);
        }catch (QueryException $queryException){
            return $this->commonResponse(false,$queryException->errorInfo[2],'', Response::HTTP_UNPROCESSABLE_ENTITY);
        }catch (Exception $exception){
            Log::critical('Failed to update project. ERROR: '.$exception->getTraceAsString());
            return $this->commonResponse(false,$exception->getMessage(),'', Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    /**
     * Delete Project
     *
     * @param int $id
     * @urlParam id integer required The Project ID Example-1
     * @return JsonResponse
     * @authenticated
     */
    public function destroy(int $id): JsonResponse
    {
        try{
            $project = Project::with('office','programType')->find($id);
            if(!$project){
                return $this->commonResponse(false,'Project Does Not Exist','', Response::HTTP_NOT_FOUND);
            }
            if($project->delete()){
                return $this->commonResponse(true,'Project Deleted Successfully', '', Response::HTTP_OK);
            }
            return$this->commonResponse(false,'Failed To Delete Project','', Response::HTTP_EXPECTATION_FAILED);
        }catch (QueryException $queryException){
            return $this->commonResponse(false,$queryException->errorInfo[2], '', Response::HTTP_UNPROCESSABLE_ENTITY);
        }catch (Exception $exception){
            Log::critical('Could Not Delete Project. ERROR:  '.$exception->getTraceAsString());
            return $this->commonResponse(false,$exception->getMessage(), '', Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    /**
     * Send Member Invites
     * @param Request $request
     * @param $id
     * @urlParam id integer required The Project ID
     * @bodyParam email email required The User Email Address
     * @bodyParam member_type_id integer The Member Type ID
     * @return JsonResponse
     * @authenticated
     */
    public function sendInvites(Request $request, $id): JsonResponse
    {
        return $this->projectService->inviteMembers($request, $id);
    }
}
