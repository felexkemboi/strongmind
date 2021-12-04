<?php

namespace App\Http\Controllers\Groups;

use App\Actions\GroupSessionAction;
use App\Http\Controllers\Controller;
use App\Services\PermissionRoleService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

/**
 * Class GroupSessionController
 * @package App\Http\Controllers\Groups
 * @group Groups
 */
class GroupSessionController extends Controller
{
    public $permissionRoleService;
    public $groupSessionAction;

    public function __construct(PermissionRoleService $permissionRoleService, GroupSessionAction $groupSessionAction){
        $this->permissionRoleService = $permissionRoleService;
        $this->groupSessionAction = $groupSessionAction;
    }

    /**
     * List Group Sessions
     *
     * @return JsonResponse
     */
    public function index(): JsonResponse
    {
        $this->permissionRoleService->verifyUserHasPermissionTo('list groups with their respective sessions');
        return $this->groupSessionAction->listSessions();
    }

    /**
     * Add Group Session
     *
     * @param Request $request
     * @return JsonResponse
     */
    public function store(Request $request): JsonResponse
    {
        //
    }

    /**
     * Display Group Session Details
     *
     * @param int $id
     * @return JsonResponse
     */
    public function show(int $id): JsonResponse
    {
        //
    }

    /**
     * Update Group Session
     *
     * @param Request $request
     * @param int $id
     * @return JsonResponse
     */
    public function update(Request $request, int $id): JsonResponse
    {
        //
    }

    /**
     * Delete Group Session
     *
     * @param int $id
     * @return JsonResponse
     */
    public function destroy(int $id): JsonResponse
    {
        //
    }
}
