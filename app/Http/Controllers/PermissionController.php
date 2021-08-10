<?php

namespace App\Http\Controllers;

use App\Http\Resources\PermissionResource;
use Bouncer;
use Exception;
use Illuminate\Database\QueryException;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use App\Support\Collection;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Silber\Bouncer\Database\Ability;
use Symfony\Component\HttpFoundation\Response;

/**
 * Class PermissionController
 * @package App\Http\Controllers
 * @group Auth
 * APIs for roles and permissions
 */
class PermissionController extends Controller
{
    /**
     * All Permissions
     * @return JsonResponse
     * @authenticated
     */
    public function index(): JsonResponse
    {
        $abilities = Bouncer::ability()->where('name', '<>', '*')->get()
            ->transform(function ($item) {
                return new PermissionResource($item);
            })->groupBy('module_name');
        //return $this->commonResponse(true, 'success', (new Collection($abilities))->paginate(10), Response::HTTP_OK);
        return $this->commonResponse(true, 'success', (new Collection($abilities)), Response::HTTP_OK);

    }

    /** Create Permission
     * @param Request $request
     * @return JsonResponse
     * @bodyParam  slug string required Permission Name e.g create-office.
     * @bodyParam  title string required Title e.g Create Office.
     * @bodyParam  module string required Module Name e.g user.
     * @authenticated
     * @hideFromAPIDocumentation
     */
    public function create(Request $request): JsonResponse
    {
        $validator = Validator::make($request->all(), [
            'title'     => 'required',
            'slug'      => 'required|unique:abilities,slug',
            'module'    => 'required',
        ]);
        if ($validator->fails()) {
            return $this->commonResponse(false, Arr::flatten($validator->messages()->get('*')), '', Response::HTTP_UNPROCESSABLE_ENTITY);
        } else {
            try {
                $slug = Str::slug($request->slug);
                $ability_exists = Ability::firstWhere('name', $slug);
                if ($ability_exists) {
                    return $this->commonResponse(false, 'Permission already exists!', '', Response::HTTP_UNPROCESSABLE_ENTITY);
                } else {
                    $ability = new Ability();
                    $ability->name = $request->slug;
                    $ability->title = $request->title;
                    $ability->module_name = $request->module;
                    $ability->save();
                    return $this->commonResponse(true, 'Permission created successfully!', new PermissionResource($ability), Response::HTTP_CREATED);
                }

            } catch (QueryException $ex) {
                return $this->commonResponse(false, $ex->errorInfo[2], '', Response::HTTP_UNPROCESSABLE_ENTITY);
            } catch (Exception $ex) {
                return $this->commonResponse(false, $ex->getMessage(), '', Response::HTTP_UNPROCESSABLE_ENTITY);
            }
        }

    }
}
