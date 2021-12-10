<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class FieldTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $data = file_get_contents('database/data/field_types.json');
        $permissions_data = json_decode($data, true);
        foreach ($permissions_data as $key){
            DB::table('field_type')->insert([
                'name' => $key['name'],
                'data_type' => $key['type'],
                'created_at' => now(),
                'updated_at' => now()

            ]);
        }

    }
}
