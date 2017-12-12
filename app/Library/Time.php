<?php

namespace App\Library;

use Carbon\Carbon;

/**
 * Class Time
 *
 */
class Time
{

    public static function generateHalfHourIntervalArray()
    {

        $intervals = [];

        $beginning = new Carbon('12am');
        $end = new Carbon('11:30pm');

        while($beginning->lt($end))
        {

            $intervals[$beginning->format('H:i')] = $beginning->format('h:iA');

            $beginning->addMinutes(30);

        }

        return $intervals;

    }

}
