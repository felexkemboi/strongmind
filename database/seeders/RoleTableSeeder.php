<?php

namespace Database\Seeders;

use App\Models\User;
use App\Services\PermissionRoleService;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Exceptions\RoleAlreadyExists;
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
        Role::create($rolesData);
        
        $adminRole = Role::findByName($rolesData['name'],PermissionRoleService::API_GUARD);
        if(!$adminRole){
            Role::create($rolesData);
        }else{
            $user = User::firstWhere('email','admin@strongminds.org');
            $user->assignRole($adminRole); //assign this user an admin role with all permissions
            $permissions = Permission::get()->filter(function ($permission){
                return $permission->guard_name === PermissionRoleService::API_GUARD;
            });
            foreach ($permissions as $permission){
                $adminRole->givePermissionTo($permission);
            }
        }
    }
}
