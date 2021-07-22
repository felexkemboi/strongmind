<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Str;
use Silber\Bouncer\Database\Ability;

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

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $t = file_get_contents("database/data/permissions.json");
        $permissions = json_decode($t, true);
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
        $this->info('Permissions Updated successfully!');

    }
}
