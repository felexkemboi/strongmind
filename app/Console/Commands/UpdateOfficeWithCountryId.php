<?php

namespace App\Console\Commands;

use App\Models\Country;
use App\Models\Office;
use App\Models\Programs\Project;
use Illuminate\Console\Command;
use Illuminate\Database\Eloquent\Builder;

class UpdateOfficeWithCountryId extends Command
{
    public const GLOBAL_OFFICE_NAME = 'Global';
    public const UG_COUNTRY_NAME = 'Uganda';

    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'office:update';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Update each office missing a country id with a default country id';

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
     * @return void
     */
    public function handle(): void
    {
        $country = Country::where('name',self::UG_COUNTRY_NAME)->first();
        $offices = Office::all()->filter(function($office){
            return $office->country_id === null || $office->name !== self::GLOBAL_OFFICE_NAME;
        });
        foreach ($offices as $office){
            $office->update([
                'country_id' => $country->id,
            ]);
            $projects = Project::where(function(Builder $query) use($office){
                $query->where('office_id', $office->id);
            })->get()->filter(function ($project){
                return $project->program_code === null;
            });
            if($projects){
                foreach ($projects as $project) {
                    $code = $country->country_code.'-'.now()->year.'-000'.$project->id;
                    $project->update(['program_code' => $code]);
                }
            }
        }
        $this->info('Office and Projects Updated Successfully');
    }
}
