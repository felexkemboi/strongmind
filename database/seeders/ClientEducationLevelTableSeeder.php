<?php

namespace Database\Seeders;

use App\Models\ClientEducationLevel;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class ClientEducationLevelTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('client_education_levels')->truncate();
        $educationLevels = array(
            array(
                'name' => 'None',
                'slug' => ''
            ),
            array(
                'name' => 'High School',
                'slug' => ''
            ),
            array(
                'name' => 'Degree',
                'slug' => ''
            ),
            array(
                'name' => 'Diploma',
                'slug' => ''
            ),
            array(
                'name' => 'Master Degree',
                'slug' => ''
            )
        );
        foreach ($educationLevels as $i => $iValue) {
            $educationLevels[$i]['slug'] = Str::slug($iValue['name'],'-');
        }
        ClientEducationLevel::insert($educationLevels);
    }
}
