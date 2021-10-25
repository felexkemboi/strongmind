<?php

namespace Database\Seeders;

use App\Models\ClientMunicipality;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class ClientMunicipalityTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('client_municipalities')->truncate();
        $municipalities = file_get_contents('database/data/client_municipalities.json');
        $municipality_data = json_decode($municipalities, true);
        foreach ($municipality_data as $key){
            $existingMunicipality = ClientMunicipality::where('name',$key['name'])->exists();
            if(!$existingMunicipality){
                $municipalitiesArray = [
                    'name' => $key['name'],
                    'slug' => Str::slug($key['name'],'-'),
                    'district_id' => $key['district_id']
                ];
                ClientMunicipality::insert($municipalitiesArray);
            }
        }
    }
}
