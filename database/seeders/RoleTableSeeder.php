<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
class RoleTableSeeder extends Seeder
{
    public const API_GUARD = 'api';

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('spatie_roles')->truncate();
        $roles_data = array(
            array(
                'name' => 'admin',
                'guard_name' => self::API_GUARD
            ),
        );
        Role::insert($roles_data);
        $user = User::firstWhere('email','admin@strongminds.org');
        $adminRole = Role::findByName($roles_data[0]['name'],'api');
        $user->assignRole($adminRole); //assign this user an admin role with all permissions
        $permissions = Permission::get()->filter(function ($permission){
            return $permission->guard_name === self::API_GUARD;
        });
        foreach ($permissions as $permission){
            $adminRole->givePermissionTo($permission);
        }
        //$adminRole->syncPermissions($permissions); //assign admin all permissions
    }
}
