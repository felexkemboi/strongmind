<?php

namespace Database\Seeders;

use App\Models\Programs\Program;
use App\Models\Programs\ProgramMember;
use Illuminate\Database\Seeder;
use App\Models\User;
class ProgramMemberTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::firstWhere('email','admin@strongminds.org');
        $newProgram = Program::create([
            'name' => 'StrongMinds Demo Program',
            'office_id' => 1,
            'program_code' => 'TEST',
            'member_count' => 1,
            'program_type_id' => 1,
            'colour_option' => '#FFF'
        ]);
        ProgramMember::insert([
            'user_id' => $user->id,
            'program_id' => $newProgram->id,
            'member_type_id' => 1
        ]);
    }
}
