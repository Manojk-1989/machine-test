<?php

namespace App\Traits;

use Carbon\CarbonTimeZone;

trait TimezoneTrait
{
    
    public function getTimeZoneFromOffset($timezoneOffset)
    {
        $timezone = CarbonTimeZone::create($timezoneOffset);
        return $timezone;
    }
}
