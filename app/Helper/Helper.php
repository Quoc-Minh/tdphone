<?php

namespace App\Helper;

class Helper
{
    public static function currency_format($number, $suffix = 'đ')
    {
        if (!empty($number)) {
            return number_format($number, 0, ',', '.') . " {$suffix}";
        }
        return null;
    }

    public static function date_format($date, $located = 'default')
    {
        if (!empty($date)) {
            return match ($located) {
                'vn' => date('H:i d/m/Y', strtotime($date)),
                default => date('Y-m-d H:i:s', strtotime($date)),
            };

        }
        return null;
    }
}
