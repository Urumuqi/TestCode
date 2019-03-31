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

    /**
     * 获取描述对应的时分秒.
     *
     * @param integer $times
     *
     * @return string
     */
    public static function secToTime($times)
    {
        $result = '00:00:00';
        if ($times>0) {
                $hour = floor($times/3600);
                $minute = floor(($times-3600 * $hour)/60);
                $second = floor((($times-3600 * $hour) - 60 * $minute) % 60);
                $result = $hour.':'.$minute.':'.$second;
        }
        return $result;
    }
}

echo Date::secToTime(86400) . PHP_EOL;
