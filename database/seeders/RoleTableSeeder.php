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
        $roles_data = array(
            array(
                'name' => 'admin',
                'guard_name' => PermissionRoleService::API_GUARD,
                'role_code' => 'ADM',
                'description' => 'admin role'
            ),
        );

        for($i =0, $iMax = count($roles_data); $i < $iMax; $i++){
            $existingRole = Role::firstWhere(function($query) use($roles_data, $i){
                $query->where('name',$roles_data[$i]['name'])
                ->where('role_code',$roles_data[$i]['role_code'])
                ->where('guard_name', PermissionRoleService::API_GUARD);
            });
            if(!$existingRole){
                Role::insert($roles_data);
            }
        }

        $user = User::firstWhere('email','admin@strongminds.org');
        $adminRole = Role::findByName($roles_data[0]['name'],PermissionRoleService::API_GUARD);
        $user->assignRole($adminRole); //assign this user an admin role with all permissions
        $permissions = Permission::get()->filter(function ($permission){
            return $permission->guard_name === PermissionRoleService::API_GUARD;
        });
        foreach ($permissions as $permission){
            $adminRole->givePermissionTo($permission);
        }
    }
}
