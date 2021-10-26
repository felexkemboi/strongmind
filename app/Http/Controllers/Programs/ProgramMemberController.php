<?php

namespace App\Http\Controllers\Programs;

use App\Events\ProgramMemberAdded;
use App\Helpers\ProjectHelper;
use App\Http\Controllers\Controller;
use App\Http\Resources\Programs\ProgramMemberResource;
use App\Models\Programs\Project;
use App\Models\Programs\ProgramMember;
use App\Models\Programs\ProgramMemberType;
use App\Models\User;
use App\Services\ProjectService;
use Illuminate\Database\QueryException;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Exception;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;
use Symfony\Component\HttpFoundation\Response;

/**
 * Manage Project Members
 * Class ProgramMemberController
 * @package App\Http\Controllers\Programs
 * @group Projects
 */
class ProgramMemberController extends Controller
{
    public $projectService;

    public function __construct(ProjectService $programService){
        $this->projectService = $programService;
    }
    /**
     * List Project Members
     * @param int $id
     * @urlParam id integer required The Project ID Example-1
     * @return JsonResponse
     * @authenticated
     */
    public function index(int $id): JsonResponse
    {
        try {
            $program = Project::with('office', 'programType')->find($id);
            if (!$program) {
                return $this->commonResponse(false, 'Project Does Not Exist', '', Response::HTTP_NOT_FOUND);
            }
            $members = ProgramMember::active()->with( 'users','memberTypes','programs')
                ->where(function($query) use($program)
                {
                    $query->where('program_id', $program->id);
                })
                ->latest()
                ->get()
                ->transform(function ($member) {
                    return new ProgramMemberResource($member);
                })->groupBy('member_type_id');
            $users = ProjectHelper::members($program->id);
            return $this->commonResponse(true, 'success', $users, Response::HTTP_OK);
        } catch (QueryException $queryException) {
            return $this->commonResponse(false, $queryException->errorInfo[2], '', Response::HTTP_UNPROCESSABLE_ENTITY);
        } catch (Exception $exception) {
            Log::critical('Failed to fetch project members. ERROR: ' . $exception->getTraceAsString());
            return $this->commonResponse(false, $exception->getMessage(), '', Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    /**
     * Add New Member|Members
     *
     * @param Request $request
     * @param int $id
     * @return JsonResponse
     * @bodyParam user_id  required User ID Example-1
     * @bodyParam member_type_id integer required Member Type ID. Example -1
     * @urlParam id integer required the Project ID
     * @authenticated
     */
    public function store(Request $request, int $id): JsonResponse
    {
        $validator = Validator::make($request->all(),[
            'user_id.*' => 'required|integer|exists:users,id',
            'member_type_id' => 'required|integer|exists:program_member_types,id',
        ]);
        if($validator->fails()){
            return $this->commonResponse(false, Arr::flatten($validator->messages()->get('*')), '', Response::HTTP_UNPROCESSABLE_ENTITY);
        }
        try{
            $project = Project::with('office','programType')->find($id);
            if(!$project){
                return $this->commonResponse(false,'Project Does Not Exist','', Response::HTTP_NOT_FOUND);
            }
            $userIds = explode(',', $request->user_id);
            if(count($userIds) > 1){
                //add multiple program members
                for($i = 0, $iMax = count($userIds); $i < $iMax; $i++){
                    $user = User::firstWhere('id', $userIds[$i]);
                    if(!$user){
                        return $this->commonResponse(false,'User With ID '.$userIds[$i].' Does Not Exist','', Response::HTTP_NOT_FOUND);
                    }
                    $member_type = ProgramMemberType::firstWhere('id', $request->member_type_id);
                    $existingMember = ProgramMember::where('user_id',$userIds[$i])->where(function($query) use($request, $project){
                        $query->where('program_id',$project->id)->where('member_type_id',$request->member_type_id);
                    })->exists();
                    if($existingMember){
                        return $this->commonResponse(false,'Member '.$user->name .' with type '. $member_type->name.'  exists for this project','', Response::HTTP_UNPROCESSABLE_ENTITY);
                    }
                    $newMember = ProgramMember::create([
                        'user_id' => $userIds[$i],
                        'program_id' => $project->id,
                        'member_type_id' => $request->member_type_id,
                        'status' => ProgramMember::MEMBERSHIP_ACTIVE
                    ]);
                    if($newMember){
                        $project->update(['member_count' => $project->member_count + count($userIds)]); //update member count
                        $this->projectService->notifyMember($user, $project);//notify member that they have been added to this program
                        return $this->commonResponse(true,'Members Added Successfully',new ProgramMemberResource($newMember), Response::HTTP_OK);
                    }
                    return $this->commonResponse(false,'Failed To Add Project Members','', Response::HTTP_EXPECTATION_FAILED);
                }
            }else{
                //check for an existing user with the same member type for this program
                $user_id = $request->user_id;
                $user = User::firstWhere('id', $user_id);
                if(!$user){
                    return $this->commonResponse(false,'User With ID '.$user_id.' Does Not Exist','', Response::HTTP_NOT_FOUND);
                }
                $member_type = ProgramMemberType::firstWhere('id', $request->member_type_id);
                $existingMember = ProgramMember::where('user_id',$user_id)->where(function($query) use($request, $project){
                    $query->where('program_id',$project->id)->where('member_type_id',$request->member_type_id);
                })->exists();
                if($existingMember){  // $member_type->name
                    return $this->commonResponse(false,'Member '.$user->name .' with type '. $member_type->name.'  exists for this project','', Response::HTTP_UNPROCESSABLE_ENTITY);
                }
                //add a single program member
                $newMember = ProgramMember::create([
                   'user_id' => $request->user_id,
                   'program_id' => $project->id,
                   'member_type_id' => $request->member_type_id,
                    'status' => ProgramMember::MEMBERSHIP_ACTIVE
                ]);
                if($newMember){
                    ProgramMemberAdded::dispatch($project); //update member_count
                    $this->projectService->notifyMember($user, $project);//notify member that they have been added to this program
                    return $this->commonResponse(true,'Member Added Successfully', new ProgramMemberResource($newMember), Response::HTTP_OK);
                }
                return $this->commonResponse(false,'Failed To Add Project Member','', Response::HTTP_EXPECTATION_FAILED);
            }
        }catch (QueryException $queryException){
            return $this->commonResponse(false,$queryException->errorInfo[2],'', Response::HTTP_UNPROCESSABLE_ENTITY);
        }catch (Exception $exception){
            Log::critical('Could Not Add New Project Members. ERROR: '.$exception->getTraceAsString());
            return $this->commonResponse(false, $exception->getMessage(),'', Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    /**
     * Revoke Project Membership
     * @param Request $request
     * @param $id
     * @urlParam id integer required the project Id.
     * @bodyParam user_id integer required User ID
     * @bodyParam member_type_id integer required The Member Type Id
     * @return JsonResponse
     * @authenticated
     */
    public function removeMember(Request $request, $id): JsonResponse
    {
        return $this->projectService->revokeMembership($request, $id);
    }

    /**
     * Activate Project Membership
     * @param Request $request
     * @param int $id
     * @urlParam id integer required the project Id.
     * @bodyParam user_id integer required User ID
     * @bodyParam member_type_id integer required The Member Type Id
     * @return JsonResponse
     * @authenticated
     */
    public function activateMember(Request $request, int $id): JsonResponse
    {
        return $this->projectService->activateMembership($request, $id);
    }
}
