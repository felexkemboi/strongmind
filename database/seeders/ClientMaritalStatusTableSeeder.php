<?php

namespace Database\Seeders;

use App\Models\ClientMaritalStatus;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class ClientMaritalStatusTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('client_marital_statuses')->truncate();
        $maritalStatuses = array(
            array(
                'name' => 'Single',
                'slug' => ''
            ),
            array(
                'name' => 'Married',
                'slug' => ''
            ),
            array(
                'name' => 'Cohabiting',
                'slug' => ''
            ),
            array(
                'name' => 'Divorced',
                'slug' => ''
            )
        );
        for($i = 0, $iMax = count($maritalStatuses); $i < $iMax; $i++){
            $maritalStatuses[$i]['slug'] = Str::slug($maritalStatuses[$i]['name'],'-');
        }
        ClientMaritalStatus::insert($maritalStatuses);
    }
}
