<?php

use Carbon\Carbon;
use Ramsey\Uuid\Uuid;

if (! function_exists('get_data')) {
    /**
     * Method gets a value from the array  which is not empty.
     *
     * @param      $data
     * @param      $key
     * @param null $default
     *
     * @return mixed|null
     */
    function get_data($data, $key, $default = null)
    {
        $value = data_get($data, $key);

        return !empty($value) ? $value : $default;
    }
}

if (! function_exists('timestamp')) {
    /**
     * Method gets a 13 digit current timestamp.
     */
    function timestamp()
    {
        return (int) round(microtime(true) * 1000);
    }
}

if (! function_exists('uuid')) {
    /**
     * Generate Uuid.
     */
    function uuid()
    {
        return Uuid::uuid4()->toString();
    }
}

if (! function_exists('carbon')) {
    /**
     * Instance of Carbon.
     *
     * @return Carbon
     */
    function carbon()
    {
        return new Carbon();
    }
}

if (! function_exists('date_to_format')) {
    /**
     * Parse and formate a date.
     *
     * @param string $date
     * @param string $format
     * @param string $timeZone
     * @return string
     */
    function date_to_format($date, $format, $timeZone = null)
    {
        $date   = carbon()->parse($date);

        return $date->setTimezone($timeZone)->format($format);
    }
}

if (! function_exists('validate_date_range')) {
    /**
     * Function to validate from and to dates
     *
     * @param null $fromDate
     * @param null $toDate
     * @param string $interval
     * @return array
     */
    function validate_date_range($fromDate = null, $toDate = null, $interval = "-7 days")
    {
        if (empty($fromDate) || empty($toDate)) {
            $toDate     = carbon()->now();
            $fromDate   = clone $toDate;
            $fromDate   = $fromDate->modify($interval);

            return [
                'from' => $fromDate,
                'to'   => $toDate
            ];
        }

        $fromDate   = carbon()->parse($fromDate);
        $toDate     = carbon()->parse($toDate);

        if ($toDate->lt($fromDate)) {
            $temp       = clone $toDate;
            $toDate     = clone $fromDate;
            $fromDate   = clone $temp;
        }

        return [
            'from' => $fromDate,
            'to'   => $toDate
        ];
    }
}

if (! function_exists('convert_timezone')) {
    /**
     * Method to convert date time from One TZ to other
     *
     * @param      $dateTime
     * @param      $inputTz
     * @param null $outputTz
     * @return Carbon
     */
    function convert_timezone($dateTime, $inputTz, $outputTz)
    {
        return carbon()->parse($dateTime, $inputTz)->setTimezone($outputTz);
    }
}

if (! function_exists('date_to_iso')) {
    /**
     * Method to convert date time from One TZ to other iso standard
     *
     * @param      $dateTime
     * @param      $inputTz
     * @param null $outputTz
     * @return Carbon
     */
    function date_to_iso($dateTime, $inputTz = null, $outputTz = null)
    {
        if (empty($inputTz)) {
            $inputTz    = config('app.timezone');
        }

        if (empty($outputTz)) {
            $outputTz   = config('app.timezone');
        }

        return carbon()->parse($dateTime, $inputTz)->setTimezone($outputTz)->toIso8601String();
    }
}
