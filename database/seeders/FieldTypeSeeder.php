<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\FieldType;

class FieldTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        FieldType::create([
            'name' => 'FieldType1',
            'data_type' => 'text'
        ]);

        FieldType::create([
            'name' => 'FieldType2',
            'data_type' => 'multiple'
        ]);
    }
}
