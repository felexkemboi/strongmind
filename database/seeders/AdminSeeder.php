<?php

namespace Database\Seeders;

use App\Models\Office;
use App\Models\User;
use Illuminate\Database\Seeder;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $exists = User::where('email', 'admin@strongminds.org')->first();
        if (!$exists) {
            $office = Office::create([
                'name' => 'Global',
                'active' => 1,
            ]);
            $user = User::create([
                'name' => 'super admin',
                'email' => 'admin@strongminds.org',
                'is_admin' => 1,
                'active' => 1,
                'approved' => 1,
                'invite_accepted' => 1,
                'gender' => 'male',
                'region' => 'East Africa',
                'city' => 'Nairobi',
                'timezone_id' => 1,
                'password' => bcrypt('@dmin#321'),
                'office_id' => $office->id,
            ]);
            $count = ($office->member_count) + 1;
            $office->update(['member_count' => $count]);
        }
    }
}
