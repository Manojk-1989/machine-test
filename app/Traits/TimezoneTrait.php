<?php

namespace App\Traits;

use Carbon\CarbonTimeZone;
use Stevebauman\Location\Facades\Location;


trait TimezoneTrait
{
    
    public function getTimeZoneFromOffset($timezoneOffset)
    {
        $timezone = CarbonTimeZone::create($timezoneOffset);
        return $timezone;
    }

    public function getUserCountry($ipAddress){
        return Location::get($ipAddress) ? $location->countryName : 'UnKnown';
        
    }
}
