<?php


namespace App\Helpers;


use Illuminate\Support\Facades\DB;

class CountryHelper
{
    public static function getCountryCode( $countryId )
    {
        return DB::table('countries')->select('long_code')->where(function($query) use($countryId){
            return $query->where('id',$countryId);
        })->first();
    }
}
