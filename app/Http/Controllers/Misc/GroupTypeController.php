<?php

namespace App\Http\Controllers\Misc;

use App\Http\Controllers\Controller;
use App\Http\Resources\GroupTypeResource;
use App\Models\Misc\GroupType;
use Exception;
use Illuminate\Database\QueryException;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Symfony\Component\HttpFoundation\Response;

/**
 * Class GroupTypeController
 * @package App\Http\Controllers\Misc
 * @group Misc
 */
class GroupTypeController extends Controller
{
    /**
     * All Group Types
     * @return JsonResponse
     * @authenticated
     */
    public function index(): JsonResponse
    {
        $group_types = GroupType::query()->select(['id', 'name', 'slug'])->get();
        return $this->commonResponse(true, 'success', $group_types, Response::HTTP_OK);

    }

    /**
     * Create Group Type
     * @param Request $request
     * @return JsonResponse
     * @bodyParam  name string required GroupType Name
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
                $record_exists = GroupType::firstWhere('slug', $slug);
                if ($record_exists) {
                    return $this->commonResponse(false, 'Record already exists!', '', Response::HTTP_UNPROCESSABLE_ENTITY);
                } else {
                    $record = GroupType::create([
                        'name' => $request->get('name'),
                        'slug' => $slug,
                    ]);
                    return $this->commonResponse(true, 'Record created successfully!', new GroupTypeResource($record), Response::HTTP_CREATED);
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
