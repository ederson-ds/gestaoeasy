<?php

defined('BASEPATH') or exit('No direct script access allowed');

class StringFormatter
{

    public static function removeSymbols($string)
    {
        return preg_replace('/[^[:alnum:] .,]/', '', $string);
    }
}
