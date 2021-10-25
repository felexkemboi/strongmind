<?php

namespace Database\Seeders;

use App\Models\ClientParish;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class ClientParishTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('client_parishes')->truncate();
        $data = file_get_contents('database/data/client_parish.json');
        $parish_data = json_decode($data, true);
        foreach ($parish_data as $key){
            $existingParish = ClientParish::where('name',$key['name'])->exists();
            if(!$existingParish){
                $parishArray = [
                    'name' => $key['name'],
                    'slug' => Str::slug($key['name'],'-'),
                    'district_id' => $key['district_id']
                ];
                ClientParish::insert($parishArray);
            }
        }

    }
}
