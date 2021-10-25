<?php

namespace Database\Seeders;

use App\Models\ClientSubCounty;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class ClientSubCountyTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('client_sub_counties')->truncate();
        $subCounties = file_get_contents('database/data/client_sub_counties.json');
        $subCounty_data = json_decode($subCounties, true);
        foreach ($subCounty_data as $key){
            $existingSubCounty = ClientSubCounty::where('name',$key['name'])->exists();
            if(!$existingSubCounty){
                $subCountiesArray = [
                    'name' => $key['name'],
                    'slug' => Str::slug($key['name'],'-'),
                    'district_id' => $key['district_id']
                ];
                ClientSubCounty::insert($subCountiesArray);
            }
        }
    }
}
