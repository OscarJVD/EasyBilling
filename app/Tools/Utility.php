<?php

namespace App\Tools;

class Utility
{
    public static function parseDate($date)
    {
        return date('Y-m-d', strtotime($date));
    }
}
