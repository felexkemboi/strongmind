<?php


namespace App\Helpers;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Query\Builder;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;

class AuthHelper
{
    /**
     * @param $roleId
     * @return array|Collection
     */
    public static function RawRolePermissions($roleId)
    {
        return DB::table('permissions')
                ->join('abilities', 'abilities.id', 'permissions.ability_id')
                ->select('abilities.id as permission_id', 'abilities.name as slug', 'abilities.title as description'
                    , 'abilities.module_name as module')
                ->where('permissions.entity_id', $roleId)
                ->get()
            ?? [];
    }
    /**
     * @param $roleId
     * @return array|Collection
     */
    public static function RolePermissions($roleId)
    {
        return DB::table('permissions')
                ->join('abilities', 'abilities.id', 'permissions.ability_id')
                ->select('abilities.id as permission_id', 'abilities.name as slug', 'abilities.title as description'
                    , 'abilities.module_name as module')
                ->where('permissions.entity_id', $roleId)
                ->get()
                ->groupBy('module')
            ?? [];
    }

    /**
     * @param $userId
     * @return array|Model|Builder|object
     */
    public static function UserRole($userId)
    {
        return DB::table('assigned_roles')
                ->join('roles',  'roles.id', 'assigned_roles.role_id')
                ->select('roles.id as role_id', 'roles.title as name', 'roles.description'
                    , 'roles.code as role_code')
                ->where('assigned_roles.entity_id', $userId)
                ->first()
            ?? [];
    }

}
