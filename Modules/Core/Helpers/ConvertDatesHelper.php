<?php

namespace Modules\Core\Helpers;

use Carbon\Carbon;
use Morilog\Jalali\CalendarUtils;
use Throwable;

class ConvertDatesHelper
{
    public static function jalaliToGregorian($datetime, string $format = 'Y/m/d H:i:s')
    {
        try {
            $datetime = CalendarUtils::createDateTimeFromFormat('Y/m/d', self::convertPersianNumbersToEnglish($datetime))->format($format);
            return $datetime;
        } catch (Throwable $e) {
            return null;
        }
    }

    public static function jalaliToGregorianWithTime($datetime)
    {
        try {
            $datetime = str_replace('ساعت ', '', $datetime);
            $datetime = self::convertPersianNumbersToEnglish($datetime);
            $datetime = Carbon::parse($datetime)->toDateTimeString();
            $datetime = CalendarUtils::createDateTimeFromFormat('Y-m-d H:i:s', $datetime)->format('Y/m/d H:i:s');

            // $datetime=verta($datetime)->format('Y/m/d H:i:s');
            // return verta($datetime)->toCarbon();
            return $datetime;
        } catch (Throwable $e) {
            dd($e);
            return null;
        }
    }

    public static function convertPersianNumbersToEnglish($input)
    {
        $persian = ['۰', '۱', '۲', '۳', '۴', '٤', '۵', '٥', '٦', '۶', '۷', '۸', '۹'];
        $english = [0, 1, 2, 3, 4, 4, 5, 5, 6, 6, 7, 8, 9];
        return str_replace($persian, $english, $input);
    }

    public static function convertEnglishNumbersToPersian($input)
    {
        $persian = ['۰', '۱', '۲', '۳', '۴', '٤', '۵', '٥', '٦', '۶', '۷', '۸', '۹'];
        $english = [0, 1, 2, 3, 4, 4, 5, 5, 6, 6, 7, 8, 9];
        return str_replace($english, $persian, $input);
    }

    public static function getDayOfWeek($date)
    {
        $carbonDate = Carbon::parse($date);

        $dayOfWeek = $carbonDate->dayOfWeek;
        // Sunday = 0, Monday = 1, ..., Saturday = 6

        return $dayOfWeek;
    }
}
