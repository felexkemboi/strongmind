<?php

namespace App\Http\Controllers\Programs;

use App\Http\Controllers\Controller;
use App\Http\Resources\Programs\ProgramMemberResource;
use App\Models\Programs\Program;
use App\Models\Programs\ProgramMember;
use App\Models\Programs\ProgramMemberType;
use App\Models\User;
use App\Support\Collection;
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
 * Manage Program Members
 * Class ProgramMemberController
 * @package App\Http\Controllers\Programs
 * @group Programs
 */
class ProgramMemberController extends Controller
{
    /**
     * List Program Members
     * @param int $id
     * @urlParam id integer required The Program ID Example-1
     * @return JsonResponse
     * @authenticated
     */
    public function index(int $id): JsonResponse
    {
        try {
            $program = Program::with('office', 'programType')->find($id);
            if (!$program) {
                return $this->commonResponse(false, 'Program Does Not Exist', '', Response::HTTP_NOT_FOUND);
            }
            $members = ProgramMember::with( 'users','memberTypes','programs')
                ->where('program_id', $program->id)
                ->latest()
                ->get()
                ->transform(function ($member) {
                    return new ProgramMemberResource($member);
                })->groupBy('member_type_id');
            if ($members->isEmpty()) {
                return $this->commonResponse(false, 'Program Members Not Found', '', Response::HTTP_NOT_FOUND);
            }
            return $this->commonResponse(true, 'success', (new Collection($members)), Response::HTTP_OK);
        } catch (QueryException $queryException) {
            return $this->commonResponse(false, $queryException->errorInfo[2], '', Response::HTTP_UNPROCESSABLE_ENTITY);
        } catch (Exception $exception) {
            Log::critical('Failed to fetch program members. ERROR: ' . $exception->getTraceAsString());
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
     * @urlParam id integer required the Program ID
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
            $program = Program::with('office','programType')->find($id);
            if(!$program){
                return $this->commonResponse(false,'Program Does Not Exist','', Response::HTTP_NOT_FOUND);
            }
            $userIds = explode(',', $request->user_id);
            if(count($userIds) > 1){
                //add multiple program members
                foreach ($userIds as $user_id){
                    //check for an existing user with the same member type for this program
                    $user = User::firstWhere('id', $user_id);
                    if(!$user){
                        return $this->commonResponse(false,'User Does Not Exist','', Response::HTTP_NOT_FOUND);
                    }
                    $member_type = ProgramMemberType::firstWhere('id', $request->member_type_id);
                    $existingMember = ProgramMember::where('user_id',$user_id)->where(function($query) use($request, $program){
                            $query->where('program_id',$program->id)->where('member_type_id',$request->member_type_id);
                    })->exists();
                    if($existingMember){
                        return $this->commonResponse(false,'Member '.$user->name .' with type '. $member_type->name.'  exists for this program','', Response::HTTP_UNPROCESSABLE_ENTITY);
                    }
                    $newMember = ProgramMember::create([
                        'user_id' => $user_id,
                        'program_id' => $program->id,
                        'member_type_id' => $request->member_type_id
                    ]);
                    if($newMember){
                        return $this->commonResponse(true,'Members Added Successfully',new ProgramMemberResource($newMember), Response::HTTP_OK);
                    }
                    return $this->commonResponse(false,'Failed To Add Program Members','', Response::HTTP_EXPECTATION_FAILED);
                }
            }else{
                //check for an existing user with the same member type for this program
                $user_id = $request->user_id;
                $user = User::firstWhere('id', $user_id);
                if(!$user){
                    return $this->commonResponse(false,'User Does Not Exist','', Response::HTTP_NOT_FOUND);
                }
                $member_type = ProgramMemberType::firstWhere('id', $request->member_type_id);
                $existingMember = ProgramMember::where('user_id',$user_id)->where(function($query) use($request, $program){
                    $query->where('program_id',$program->id)->where('member_type_id',$request->member_type_id);
                })->exists();
                if($existingMember){  // $member_type->name
                    return $this->commonResponse(false,'Member '.$user->name .' with type '. $member_type->name.'  exists for this program','', Response::HTTP_UNPROCESSABLE_ENTITY);
                }
                //add a single program member
                $newMember = ProgramMember::create([
                   'user_id' => $request->user_id,
                   'program_id' => $program->id,
                   'member_type_id' => $request->member_type_id
                ]);
                if($newMember){
                    return $this->commonResponse(true,'Member Added Successfully', new ProgramMemberResource($newMember), Response::HTTP_OK);
                }
                return $this->commonResponse(false,'Failed To Add Program Member','', Response::HTTP_EXPECTATION_FAILED);
            }
        }catch (QueryException $queryException){
            return $this->commonResponse(false,$queryException->errorInfo[2],'', Response::HTTP_UNPROCESSABLE_ENTITY);
        }catch (Exception $exception){
            Log::critical('Could Not Add New Program Members. ERROR: '.$exception->getTraceAsString());
            return $this->commonResponse(false, $exception->getMessage(),'', Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }
}
