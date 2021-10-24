<?php

namespace App\Console\Commands;

use App\Models\User;
//use Bouncer;
use App\Services\PermissionRoleService;
use Illuminate\Console\Command;
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
        $data = file_get_contents('database/data/spatie_permissions.json');
        $permissions_data = json_decode($data, true);
        foreach ($permissions_data as $key){
            $permissionsArray = [
                'name' => $key['name'],
                'guard_name' => $key['guard_name']
            ];
            $existingPermission = Permission::findByName($permissionsArray['name'], PermissionRoleService::API_GUARD);
            if(!$existingPermission){
                Permission::insert($permissionsArray);
            }
        }
        $this->info('Permissions Updated successfully!');
    }
}
