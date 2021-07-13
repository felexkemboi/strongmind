<?php

namespace App\Http\Controllers\Misc;

use App\Http\Controllers\Controller;
use App\Http\Resources\ProgramTypeResource;
use App\Models\Misc\ProgramType;
use Exception;
use Illuminate\Database\QueryException;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Symfony\Component\HttpFoundation\Response;

/**
 * Class ProgramTypeController
 * @package App\Http\Controllers\Misc
 * @group Misc
 */
class ProgramTypeController extends Controller
{
    /**
     * All Program Types
     * @return JsonResponse
     * @authenticated
     */
    public function index(): JsonResponse
    {
        $program_types = ProgramType::query()->select(['id', 'name', 'slug'])->get();
        return $this->commonResponse(true, 'success', $program_types, Response::HTTP_OK);
    }

    /**
     * Create Program Type
     * @param Request $request
     * @return JsonResponse
     * @bodyParam  name string required ProgramType Name
     * @authenticated
     */
    public function create(Request $request): JsonResponse
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
        ]);
        if ($validator->fails()) {
            return $this->commonResponse(false, Arr::flatten($validator->messages()->get('*')), '', Response::HTTP_UNPROCESSABLE_ENTITY);
        } else {
            try {
                $slug = Str::slug($request->get('name'));
                $record_exists = ProgramType::firstWhere('slug', $slug);
                if ($record_exists) {
                    return $this->commonResponse(false, 'Record already exists!', '', Response::HTTP_UNPROCESSABLE_ENTITY);
                } else {
                    $record = ProgramType::create([
                        'name' => $request->get('name'),
                        'slug' => $slug,
                    ]);
                    return $this->commonResponse(true, 'Record created successfully!', new ProgramTypeResource($record), Response::HTTP_CREATED);
                }
            } catch (QueryException $ex) {
                return $this->commonResponse(false, $ex->errorInfo[2], '', Response::HTTP_UNPROCESSABLE_ENTITY);
            } catch (Exception $ex) {
                return $this->commonResponse(false, $ex->getMessage(), '', Response::HTTP_UNPROCESSABLE_ENTITY);
            }
        }
    }

    public function update(Request $request)
    {

    }

    public function delete()
    {

    }
}
