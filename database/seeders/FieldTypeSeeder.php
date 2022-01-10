<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\FieldType;
use Carbon\Carbon;


class FieldTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        DB::table('field_type')->truncate();
        $types = array(
            array(
                'name' => 'Numeric',
                'data_type' => 'numeric',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ),
            array(
                'name' => 'Text',
                'data_type' => 'text',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ),
            array(
                'name' => 'Multiple',
                'data_type' => 'multiple',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ),
            array(
                'name' => 'Date Time',
                'data_type' => 'datetime',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ),
            array(
                'name' => 'Date',
                'data_type' => 'date',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            )
        );
        FieldType::insert($types);
    }
}
