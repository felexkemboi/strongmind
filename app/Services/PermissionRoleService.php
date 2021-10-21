<?php


namespace App\Services;


use App\Http\Controllers\SpatiePermissionController;
use App\Traits\ApiResponser;
use Illuminate\Http\JsonResponse;
use Symfony\Component\HttpFoundation\Response;

class PermissionRoleService
{
    use ApiResponser;
    public const API_GUARD = 'api';

    public function verifyPermission(string $permission)
    {
        if(!auth()->user()->hasPermissionTo($permission, self::API_GUARD)){
            return $this->commonResponse(false, 'Access denied!', '', Response::HTTP_FORBIDDEN);
        }
    }
}
