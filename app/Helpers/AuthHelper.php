<?php


namespace App\Helpers;


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

}
