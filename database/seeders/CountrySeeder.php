<?php
namespace Database\Seeders;
use App\Models\Country;
use App\Models\RegionDistrict;
use File;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CountrySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('countries')->truncate();
        $json = File::get("database/data/countries.json");
        $data = json_decode($json);
        foreach ($data as $obj) {
            $countryExist = Country::where('name', $obj->name)
            ->where('id', $obj->id)
            ->exists();
            if(!$countryExist){
                Country::create(array(
                    'id' => $obj->id,
                    'name' => $obj->name,
                    'dialing_code' => $obj->phone_code,
                    'capital' => $obj->capital,
                    'country_code' => $obj->iso2,
                    'long_code' => $obj->iso3,
                ));
            }

            $path = 'database/data/'.$obj->name.'_regions_districts.json';

            if(File::exists($path)){
                $regions_districts = File::get($path);
                $regions_districts_data = json_decode($regions_districts);

                RegionDistrict::where('country_id', $obj->id)->delete();

                foreach ($regions_districts_data as $record) {
                    RegionDistrict::create(array(
                        'country_id' => $obj->id ? $obj->id : '',
                        'region' => $record->Region ? $record->Region : '',
                        'district' => $record->District ? $record->District : ''
                    ));
                }
            }
        }
    }
}
