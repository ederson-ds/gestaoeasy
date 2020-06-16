<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Number
{

    public static function numberToFloat($value)
    {
        $value = StringFormatter::removeSymbols($value);
        if (!$value)
            return null;
        return str_replace(",", ".", str_replace(".", "", $value));
    }

    public static function floatToNumber($num)
    {
        if (!$num) {
            return null;
        }
        return number_format($num, 2, ',', '.');
    }
}
