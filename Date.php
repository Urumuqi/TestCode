<?php

class Date
{
    public static function getFirstDayOfLastMonth($date)
    {
        $firstDay = date('Y-m-01', strtotime($date));
        return date('Ym01', strtotime('-1 month', strtotime($firstDay)));
    }

    public static function getLastDayOfLastMonth($date)
    {
        $firstDayOfMonth = date('Y-m-01', strtotime($date));
        return date('Ymd', strtotime('-1 day', strtotime($firstDayOfMonth)));
    }

    public static function getTodayOfLastMonth($date)
    {
        $dayOfLastMonth = date('Ymd', strtotime('-1 month', strtotime($date)));
        $lastDayOfLastMonth = self::getLastDayOfLastMonth($date);
        if ($dayOfLastMonth > $lastDayOfLastMonth) {
            return $lastDayOfLastMonth;
        }
        return $dayOfLastMonth;
    }
}

echo Date::getLastDayOfLastMonth(20180110) . PHP_EOL;
