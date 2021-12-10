<?php


namespace App\Helpers;


use App\Models\Office;
use Illuminate\Support\Facades\DB;

class CountryHelper
{
    public static function getCountryCode( $countryId )
    {
        return DB::table('countries')->select('long_code')->where(function($query) use($countryId){
            return $query->where('id',$countryId);
        })->first();
    }

    public static function getCountyCodeByOffice(int $officeId)
    {
        $office = Office::find($officeId);
        return DB::table('countries')->select('long_code')->where(function($query) use($office){
            return $query->where('id',$office->country_id);
        })->first();
    }
}
