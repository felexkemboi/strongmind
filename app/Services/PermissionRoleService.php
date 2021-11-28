<?php


namespace App\Services;


use App\Traits\ApiResponser;
use Spatie\Permission\Models\Role;
use Symfony\Component\HttpFoundation\Response;

class PermissionRoleService
{
    use ApiResponser;
    public const API_GUARD = 'api';

    public function verifyUserHasPermissionTo(string $permission)
    {
        if(!auth()->user()->hasPermissionTo($permission, self::API_GUARD)){
            return $this->commonResponse(false, 'Access denied!', '', Response::HTTP_FORBIDDEN);
        }
    }

    /**
     * @param Role $role
     * @return array
     */
    function fetchRoleData(Role $role): array{
        return [
            'role_id' => $role->id,
            'name'  => $role->name,
            'role_code' => $role->role_code,
            'description' => $role->description,
            'access_permissions' => $role->permissions->transform(function($permission){
                return [
                    'permission_id' => $permission->id,
                    'name' => $permission->name,
                    'slug' => $permission->slug,
                    'description' => $permission->description,
                    'module' => $permission->module
                ];
            })//->groupBy('module')
        ];
    }
}
