<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        $this->call([
            CountrySeeder::class,
            TimezoneSeeder::class,
            AdminSeeder::class,
            ProgramMemberTypeSeeder::class,
            //ProgramMemberTableSeeder::class
            PermissionTableSeeder::class,
            RoleTableSeeder::class,
            ClientPhoneOwnershipTableSeeder::class,
            ClientMaritalStatusTableSeeder::class,
            ClientDistrictTableSeeder::class,
            ClientSubCountyTableSeeder::class,
            ClientMunicipalityTableSeeder::class,
            ClientVillageTableSeeder::class,
            ClientParishTableSeeder::class
        ]);
    }
}
