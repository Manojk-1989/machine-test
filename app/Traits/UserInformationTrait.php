<?php

namespace App\Traits;

use Carbon\CarbonTimeZone;
use Stevebauman\Location\Facades\Location;
use GuzzleHttp\Client;
use Illuminate\Support\Arr;


trait UserInformationTrait
{
    
    public function getUserLocation($userIp)
    {
        try {
            $client = new Client();
            $response = $client->get("https://ipinfo.io/$userIp?token=9f8dc3eb8f56e6");
            $data = json_decode($response->getBody());
            $userCountry = isset($data->country) ? $data->country : 'Unknown Country';
            $countries = config('constants.countries');
            return  Arr::has($countries, $userCountry) ? $countries[$userCountry] : $userCountry; 
            
        } catch (\Throwable $th) {
            return 'Country fetching api error';
        }
        return $timezone;
    }

    
}
