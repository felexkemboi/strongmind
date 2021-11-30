<?php

namespace Database\Seeders;

use App\Models\User;
use App\Services\PermissionRoleService;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
class RoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //DB::table('spatie_roles')->truncate();
        $rolesData = [
            'name' => 'admin',
            'guard_name' => PermissionRoleService::API_GUARD,
            'role_code' => 'ADM',
            'description' => 'admin role'
        ];
        $existingRoles = Role::all();
        foreach($existingRoles as $role){
            if(!($role->name === $rolesData['name'] && $role->role_code === $rolesData['role_code']))
            {
                Role::create($rolesData);
            }
        }

        $user = User::firstWhere('email','admin@strongminds.org');
        $adminRole = Role::findByName($rolesData['name'],PermissionRoleService::API_GUARD);
        $user->assignRole($adminRole); //assign this user an admin role with all permissions
        $permissions = Permission::get()->filter(function ($permission){
            return $permission->guard_name === PermissionRoleService::API_GUARD;
        });
        foreach ($permissions as $permission){
            $adminRole->givePermissionTo($permission);
        }
    }
}
