<?php

namespace Database\Seeders;

use App\Models\Timezone;
use File;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TimezoneSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('timezones')->delete();
        $json = File::get("database/data/timezones.json");
        $data = json_decode($json);
        foreach ($data as $key => $obj) {
            Timezone::create(array(
                'name' => $key,
                'utc' => $obj,
            ));
        }
    }
}
