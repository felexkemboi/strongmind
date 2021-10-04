<?php

namespace Database\Seeders;

use App\Models\Programs\ProgramMemberType;
use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProgramMemberTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('program_member_types')->truncate();
        $programMemberTypes = array(
            array(
                'name' => 'Staff',
                'created_at' => Carbon::now(),
            ),
            array(
                'name' => 'Manager',
                'created_at' => Carbon::now(),
            ),
            array(
                'name' => 'Partner',
                'created_at' => Carbon::now(),
            )
        );
        ProgramMemberType::insert($programMemberTypes);
    }
}
