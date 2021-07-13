<?php

namespace App\Http\Controllers\Misc;

use App\Http\Controllers\Controller;
use App\Http\Resources\StatusResource;
use App\Models\Misc\Status;
use Exception;
use Illuminate\Database\QueryException;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Symfony\Component\HttpFoundation\Response;

/**
 * Class StatusController
 * @package App\Http\Controllers\Misc
 * @group Misc
 */
class StatusController extends Controller
{
    /**
     * All Statuses
     * @return JsonResponse
     * @authenticated
     */
    public function index(): JsonResponse
    {
        $statuses = Status::query()->select(['id', 'name', 'slug'])->get();
        return $this->commonResponse(true, 'success', $statuses, Response::HTTP_OK);
    }
    /**
     * Create Status
     * @param Request $request
     * @return JsonResponse
     * @bodyParam  name string required Status Name
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
                $record_exists = Status::firstWhere('slug', $slug);
                if ($record_exists) {
                    return $this->commonResponse(false, 'Record already exists!', '', Response::HTTP_UNPROCESSABLE_ENTITY);
                } else {
                    $record = Status::create([
                        'name' => $request->get('name'),
                        'slug' => $slug,
                    ]);
                    return $this->commonResponse(true, 'Record created successfully!', new StatusResource($record), Response::HTTP_CREATED);
                }
            } catch (QueryException $ex) {
                return $this->commonResponse(false, $ex->errorInfo[2], '', Response::HTTP_UNPROCESSABLE_ENTITY);
            } catch (Exception $ex) {
                return $this->commonResponse(false, $ex->getMessage(), '', Response::HTTP_UNPROCESSABLE_ENTITY);
            }
        }
    }
    public function update(Request $request){

    }
    public function delete(){

    }

}
