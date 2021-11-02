<?php

namespace Database\Seeders;

use App\Services\PermissionRoleService;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Permission;
class PermissionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //DB::table('spatie_permissions')->truncate();
        $data = file_get_contents('database/data/spatie_permissions.json');
        $permissions_data = json_decode($data, true);
        foreach ($permissions_data as $key){
            $existingPermission = Permission::where('name',$key['name'])->exists();
            if(!$existingPermission){
                $permissionsArray = [
                    'name' => $key['name'],
                    'guard_name' => $key['guard_name']
                ];
                Permission::insert($permissionsArray);
            }
        }
    }
}
