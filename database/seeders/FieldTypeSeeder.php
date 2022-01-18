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
                'icon' => 'HashtagIcon',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ),
            array(
                'name' => 'Text',
                'data_type' => 'text',
                'icon' => 'MenuAlt2Icon',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ),
            array(
                'name' => 'Multiple choice',
                'data_type' => 'multiple',
                'icon' =>'MenuIcon',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ),
            array(
                'name' => 'Date Time',
                'data_type' => 'datetime',
                'icon' => 'PresentationChartLineIcon',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ),
            array(
                'name' => 'Date',
                'data_type' => 'date',
                'icon' => 'PresentationChartLineIcon',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            )
        );
        foreach ($types as $obj) {
            FieldType::create(
                $obj
            );
        }
    }
}
