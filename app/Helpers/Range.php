<?php

namespace App\Helpers;


class Range {
    
    public static function isIn($lat1, $lng1, $lat2, $lng2, $distance)
    {
        if(self::calculateDistance($lat1, $lng1, $lat2, $lng2) <= $distance)
            return true;

        return false;
    }

    protected static function calculateDistance($lat1, $lng1, $lat2, $lng2, $unit = 'M')
    {
        $theta = $lng1 - $lng2;
        $dist = sin(deg2rad($lat1)) * sin(deg2rad($lat2)) +  cos(deg2rad($lat1)) * cos(deg2rad($lat2)) * cos(deg2rad($theta));
        $dist = acos($dist);
        $dist = rad2deg($dist);
        $miles = $dist * 60 * 1.1515;
        $unit = strtoupper($unit);

        if ($unit == "K") {
            return ($miles * 1.609344);
        } else if ($unit == "N") {
            return ($miles * 0.8684);
        } else {
            return $miles;
        }
    }
}