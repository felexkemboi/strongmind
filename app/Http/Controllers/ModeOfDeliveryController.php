<?php

namespace App\Http\Controllers;

use App\Actions\ModeOfDeliveryAction;
use App\Http\Requests\ModeOfDeliveryRequest;
use App\Http\Requests\ModeOfDeliveryUpdateRequest;
use App\Services\PermissionRoleService;
use Illuminate\Http\JsonResponse;

/**
 * Manage Group Modes of Delivery
 * Class ModeOfDeliveryController
 * @package App\Http\Controllers
 * @group Dynamic Fields
 */
class ModeOfDeliveryController extends Controller
{
    public $permissionRoleService;
    public $modeOfDeliveryAction;

    public function __construct(PermissionRoleService $permissionRoleService, ModeOfDeliveryAction $modeOfDeliveryAction)
    {
        $this->permissionRoleService = $permissionRoleService;
        $this->modeOfDeliveryAction = $modeOfDeliveryAction;
    }

    /**
     * List Modes Of Delivery.
     *
     * @return JsonResponse
     * @authenticated
     */
    public function index(): JsonResponse
    {
        $this->permissionRoleService->verifyUserHasPermissionTo('list modes of delivery');
        return $this->modeOfDeliveryAction->listModesOfDelivery();
    }

    /**
     * Create Delivery Mode
     *
     * @param ModeOfDeliveryRequest $request
     * @bodyParam name string required .
     * @authenticated
     * @return JsonResponse
     */
    public function store(ModeOfDeliveryRequest $request): JsonResponse
    {
        $this->permissionRoleService->verifyUserHasPermissionTo('create mode of delivery');
        return $this->modeOfDeliveryAction->createModeOfDelivery($request);
    }

    /**
     * Display Delivery Mode Details
     *
     * @param int $id
     * @urlParam id integer required .
     * @authenticated
     * @return JsonResponse
     */
    public function show(int $id): JsonResponse
    {
        $this->permissionRoleService->verifyUserHasPermissionTo('view mode of delivery item');
        return $this->modeOfDeliveryAction->viewModeOfDelivery($id);
    }

    /**
     * Update Delivery Mode Item
     *
     * @param ModeOfDeliveryUpdateRequest $request
     * @param int $id
     * @urlParam id integer required .
     * @bodyParam name string
     * @authenticated
     * @return JsonResponse
     */
    public function update(ModeOfDeliveryUpdateRequest $request, int $id): JsonResponse
    {
        $this->permissionRoleService->verifyUserHasPermissionTo('update mode of delivery');
        return $this->modeOfDeliveryAction->updateModeOfDelivery($request, $id);
    }

    /**
     * Delete Delivery Mode Item
     *
     * @param int $id
     * @urlParam id integer required .
     * @authenticated
     * @return JsonResponse
     */
    public function destroy(int $id): JsonResponse
    {
        $this->permissionRoleService->verifyUserHasPermissionTo('delete mode of delivery');
        return $this->modeOfDeliveryAction->deleteModeOfDelivery($id);
    }
}
