<?php

namespace App\Console\Commands;

use App\Models\User;
//use Bouncer;
use Illuminate\Console\Command;
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
            Permission::insert($permissionsArray);
        }
        /**
        foreach($permissions as $key){

            $slug = Str::slug($key['name']);
            $ability_exists = Ability::firstWhere('name', $slug);
            if (!$ability_exists) {
                $ability = new Ability;
                $ability->name = $slug;
                $ability->title = $key['name'];
                $ability->module_name = $key['module'];
                $ability->save();
            }
        }
         **/
        $this->info('Permissions Updated successfully!');

    }
}
