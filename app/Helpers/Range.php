<?php

namespace App\Helpers;

use GuzzleHttp\Client;

class Range {
    
    public static function isIn($origin, $destination, $miles)
    {
        $fixed_origin = self::fixLocationString($origin);
        $fixed_destination = self::fixLocationString($destination);

        $client = new Client();

        $response = $client->request('GET', 'https://maps.googleapis.com/maps/api/distancematrix/json?units=imperial&origins=' . $fixed_origin . '&destinations=' . $fixed_destination . '&key=AIzaSyCdSwPLnAX1C7wdjdmq4CPomvMVs7Melcw');
        $data = json_decode(($response->getBody()),true);

        // if anything happens and there's no distance returned from GoogleApis, we return false
        if(!isset($data['rows'][0]['elements'][0]['distance']))
            return false;

        $distance = str_replace(" mi","",str_replace(",","",$data['rows'][0]['elements'][0]['distance']['text']));

        return ($distance<=$miles) ? true : false;
    }

    private static function fixLocationString($location)
    {
        $location_data = explode(" ", $location);

        $fixed_location = null;

        foreach($location_data as $item) {
            $fixed_location.= ($item . "+");
        }

        trim($fixed_location, "+");

        return $fixed_location;
    }
}