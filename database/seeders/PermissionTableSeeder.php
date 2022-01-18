<?php

namespace Database\Seeders;

use App\Services\PermissionRoleService;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
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
            $permissionsArray = [
                'name' => $key['name'],
                'guard_name' => $key['guard_name'],
                'module'     => $key['module'],
                'slug'       => Str::slug($key['name'],'-'),
                'description'  => $key['description']
            ];
            $existingPermission = Permission::where(function($query) use($permissionsArray){
                $query->where('name',$permissionsArray['name']);
            })->exists();
            if(!$existingPermission){
                Permission::insert($permissionsArray);
            }
        }
    }
}
