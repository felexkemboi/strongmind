<?php

namespace Database\Seeders;

use App\Models\ClientDistrict;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class ClientDistrictTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('client_districts')->truncate();
        $districts = file_get_contents('database/data/client_districts.json');
        $districts_data = json_decode($districts, true);
        foreach ($districts_data as $key){
            $existingDistrict = ClientDistrict::where('name',$key['name'])->exists();
            if(!$existingDistrict){
                $districtsArray = [
                    'id' => $key['id'],
                    'name' => $key['name'],
                    'slug' => Str::slug($key['name'],'-')
                ];
                ClientDistrict::insert($districtsArray);
            }
        }
    }
}
