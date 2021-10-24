<?php

namespace Database\Seeders;

use App\Models\ClientPhoneOwnership;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class ClientPhoneOwnershipTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('client_phone_ownerships')->truncate();
        $phoneOwnershipTypes = array(
            array(
                'name' => 'Self',
                'slug' => Str::slug('name','-')
            ),
            array(
                'name' => 'Father',
                'slug' => ''
            ),
            array(
                'name' => 'Mother',
                'slug' => ''
            ),
            array(
                'name' => 'Brother',
                'slug' => ''
            ),
            array(
                'name' => 'Sister',
                'slug' => ''
            ),
            array(
                'name' => 'Neighbor',
                'slug' => ''
            )
        );
        for($i = 0, $iMax = count($phoneOwnershipTypes); $i < $iMax; $i++){
            $phoneOwnershipTypes[$i]['slug'] = Str::slug($phoneOwnershipTypes[$i]['name'],'-');
        }
        ClientPhoneOwnership::insert($phoneOwnershipTypes);
    }
}
