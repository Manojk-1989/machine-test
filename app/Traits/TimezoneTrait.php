<?php

namespace App\Traits;

use Carbon\CarbonTimeZone;

trait TimezoneTrait
{
    
    public function getTimeZoneFromOffset($timezoneOffset)
    {
        // Calculate timezone from offset
        $timezone = CarbonTimeZone::create($timezoneOffset);

        // Return timezone
        return $timezone;
    }
}
