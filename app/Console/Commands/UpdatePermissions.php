<?php

namespace App\Console\Commands;

use App\Models\User;
//use Bouncer;
use App\Services\PermissionRoleService;
use Illuminate\Console\Command;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Silber\Bouncer\Database\Ability;
use Spatie\Permission\Models\Permission;

class UpdatePermissions extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'update:permissions';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Update system permissions';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    public function handle()
    {
        /*
        Bouncer::refresh();
        $user=User::firstWhere('email','admin@strongminds.org');
        Bouncer::allow($user)->everything();

        $t = file_get_contents("database/data/permissions.json");
        $permissions = json_decode($t, true);
        **/
        //DB::table('spatie_permissions')->truncate();
        $data = file_get_contents('database/data/spatie_permissions.json');
        $permissions_data = json_decode($data, true);
        foreach ($permissions_data as $key){
            $permissionsArray = [
                'name'          => $key['name'],
                'guard_name'    => $key['guard_name'],
                'module'        => $key['module'],
                'slug'          => Str::slug($key['name'],'-'),
                'description'   => $key['description']
            ];
            try{
                $existingPermission = Permission::where(function(Builder $query) use($permissionsArray){
                    $query->where('name',$permissionsArray['name']);
                })->first();
                if($existingPermission){
                    if($existingPermission->module === null || $existingPermission->slug === null || $existingPermission->description === null){
                        $existingPermission->update([
                            'module' => $permissionsArray['module'],
                            'slug'   => $permissionsArray['slug'],
                            'description' => $permissionsArray['description']
                        ]);
                        $this->info('Permissions Updated successfully');
                    }
                }else{
                    Permission::insert($permissionsArray);
                }
            }catch (QueryException $queryException){
                $this->error($queryException->errorInfo[2]);
            }catch (\Exception $exception){
                $this->error($exception->getMessage());
            }
        }
        $this->info('Permissions Added successfully!');
    }
}
