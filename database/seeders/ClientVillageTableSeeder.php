<?php

namespace Database\Seeders;

use App\Models\ClientVillage;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class ClientVillageTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('client_villages')->truncate();
        $villages = file_get_contents('database/data/client_villages.json');
        $villages_data = json_decode($villages, true);
        foreach ($villages_data as $key){
            $existingVillage = ClientVillage::where('name',$key['name'])->exists();
            if(!$existingVillage){
                $villagesArray = [
                    'name' => $key['name'],
                    'slug' => Str::slug($key['name'],'-'),
                    'district_id' => $key['district_id']
                ];
                ClientVillage::insert($villagesArray);
            }
        }
    }
}
