<?php

namespace App\Console\Commands;

use App\Models\ClientDistrict;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class UpdateDistricts extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'update:districts';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Update Districts';

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
     * @throws \JsonException
     */
    public function handle()
    {
        DB::table('client_districts')->truncate();
        $districts = file_get_contents('database/data/client_districts.json');
        $districts_data = json_decode($districts, true, 512, JSON_THROW_ON_ERROR);
        foreach ($districts_data as $key){
            $existingDistrict = ClientDistrict::where('name',$key['name'])->exists();
            if(!$existingDistrict){
                $districtsArray = [
                    'id' => $key['id'],
                    'name' => $key['name'],
                    'country_id' => $key['country_id'],
                    'slug' => Str::slug($key['name'],'-'),
                ];
                ClientDistrict::insert($districtsArray);
            }
        }
        $this->info('Client districts updated successfully!');
    }
}
