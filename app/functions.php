<?php



function getValue($type){
    $res = \App\Models\Settings::where('key',$type)->first();
    if(empty($res)){
        return null;
    }
    return $res->value;
}


function lastDayOf($period, DateTime $date = null)
{
    $period = strtolower($period);
    $validPeriods = array('year', 'quarter', 'month', 'week');

    if (!in_array($period, $validPeriods))
        throw new InvalidArgumentException('Period must be one of: ' . implode(', ', $validPeriods));

    $newDate = ($date === null) ? new DateTime() : clone $date;

    switch ($period) {
        case 'year':
            $newDate->modify('last day of december ' . $newDate->format('Y'));
            break;
        case 'quarter':
            $month = $newDate->format('n');

            if ($month < 4) {
                $newDate->modify('last day of march ' . $newDate->format('Y'));
            } elseif ($month > 3 && $month < 7) {
                $newDate->modify('last day of june ' . $newDate->format('Y'));
            } elseif ($month > 6 && $month < 10) {
                $newDate->modify('last day of september ' . $newDate->format('Y'));
            } elseif ($month > 9) {
                $newDate->modify('last day of december ' . $newDate->format('Y'));
            }
            break;
        case 'month':
            $newDate->modify('last day of this month');
            break;
        case 'week':
            $newDate->modify(($newDate->format('w') === '0') ? 'now' : 'sunday this week');
            break;
    }

    return $newDate;
}

function firstDayOf($period, DateTime $date = null)
{
    $period = strtolower($period);
    $validPeriods = array('year', 'quarter', 'month', 'week');

    if (!in_array($period, $validPeriods))
        throw new InvalidArgumentException('Period must be one of: ' . implode(', ', $validPeriods));

    $newDate = ($date === null) ? new DateTime() : clone $date;

    switch ($period) {
        case 'year':
            $newDate->modify('first day of january ' . $newDate->format('Y'));
            break;
        case 'quarter':
            $month = $newDate->format('n');

            if ($month < 4) {
                $newDate->modify('first day of january ' . $newDate->format('Y'));
            } elseif ($month > 3 && $month < 7) {
                $newDate->modify('first day of april ' . $newDate->format('Y'));
            } elseif ($month > 6 && $month < 10) {
                $newDate->modify('first day of july ' . $newDate->format('Y'));
            } elseif ($month > 9) {
                $newDate->modify('first day of october ' . $newDate->format('Y'));
            }
            break;
        case 'month':
            $newDate->modify('first day of this month');
            break;
        case 'week':
            $newDate->modify(($newDate->format('w') === '0') ? 'monday last week' : 'monday this week');
            break;
    }

    return $newDate;
}

/**
 * Flattens a deep array into an array of strings.
 * Opposite of expandList().
 *
 * So `array('Some' => array('Deep' => array('Value')))` becomes `Some.Deep.Value`.
 *
 * Note that primarily only string should be used.
 * However, boolean values are casted to int and thus
 * both boolean and integer values also supported.
 *
 * @param array $data
 * @return array
 */
function flattenList(array $data, $separator = '.')
{
    $result = array();
    $stack = array();
    $path = null;

    reset($data);
    while (!empty($data)) {
        $key = key($data);
        $element = $data[$key];
        unset($data[$key]);

        if (is_array($element) && !empty($element)) {
            if (!empty($data)) {
                $stack[] = array($data, $path);
            }
            $data = $element;
            reset($data);
            $path .= $key . $separator;
        } else {
            if (is_bool($element)) {
                $element = (int)$element;
            }
            $result[] = $path . $element;
        }

        if (empty($data) && !empty($stack)) {
            list($data, $path) = array_pop($stack);
            reset($data);
        }
    }
    return $result;
}


function arrayFlatten($array, $preserveKeys = false)
{
    if ($preserveKeys) {
        return _arrayFlatten($array);
    }
    if (!$array) {
        return array();
    }
    $result = array();

    foreach ($array as $key => $value) {
        if (is_array($value)) {
            $result = array_merge($result, arrayFlatten($value));
        } else {
            $result[$key] = $value;
        }
    }
    return $result;
}

function _arrayFlatten($a, $f = array())
{
    if (!$a) {
        return array();
    }
    foreach ($a as $k => $v) {
        if (is_array($v)) {
            $f = _arrayFlatten($v, $f);
        } else {
            $f[$k] = $v;
        }
    }
    return $f;
}

/**
 *helper function to set active link
 *
 * @param url $path
 * @param string $active
 * @return mixed
 */
function set_active($path, $active = 'active')
{
    return call_user_func_array('Request::is', (array)$path) ? $active : '';
}

/**
 * generate authentication code
 * @return string
 */
function generate_verification_code()
{
    $str = '012345678912abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $token = str_shuffle($str);
    return $token;
}

function pr($var)
{
    $template = php_sapi_name() !== 'cli' ? '<pre>%s</pre>' : "\n%s\n";
    printf($template, print_r($var, true));
}


/**
 * helper function to remove whitespace and wildcards from string
 * @param $string
 * @return String
 */
function makeSlug($string)
{
    //remove wildcards from string
    //$z = strtolower($z);
    $string1 = preg_replace('/[^a-zA-Z0-9.-]+/', '', strtolower($string));
    //replace white space with underscore
    $string2 = str_replace(" ", "_", $string1);

    return trim($string2);
}


/**
 * helper method to format amount
 * @param $num
 * @return string
 */
function formatNumber($num)
{
    //return '₦'.number_format($num, 2, '.', ',');
    return number_format($num, 2, '.', ',');
}

/**
 * helper function to get all countries
 * @param $country_id
 * @return mixed
 */
function getCountry($country_id = false)
{
    if ($country_id) {
        $country = DB::table('countries')
            ->where('id', $country_id)
            ->first();
        return $country->name;
    } elseif ($country_id === 0) {
        return '';
    } else {
        $country = DB::table('countries')->orderBy('name', 'asc')->get();
        return $country;
    }
}


/**
 * @param $country_id
 * @return array
 */
function getStatesByCountry($country_id = false)
{
    $states = DB::table('states')->where('country_id', $country_id)->get();
    return $states;
}

function getState($state_id = null)
{
    if ($state_id > 0) {
        $state = DB::table('states')
            ->where('id', $state_id)
            ->first();
        return $state->name;
    } else {
        $state = DB::table('states')->get();
        return $state;
    }
}


/**
 * Function to set status
 *
 * @param $status
 * @return string
 */
function getStatus($status)
{
    if ($status === 1) {
        $stat = "<span class='label label-success'>Active</span>";
    } elseif ($status === 0) {
        $stat = "<span class='label label-danger'>Inactive</span>";
    }
    return $stat;
}

function trimText($text, $length = 200)
{
    if (strlen($text) > $length):
        $string = substr($text, 0, strpos($text, ' ', $length)) . '&hellip;';
        return ltrim($string);
    else:
        return ltrim($text);
    endif;
}


/**
 * Helper method to calculate the percentage difference
 * between previous month and current month in dashboard financial statement
 * @param $number1
 * @param $number2
 * @return string
 */
function calculatePercentage($number1, $number2)
{
    if ($number2 == 0) {
        return '<td class="text-danger"> <i class="fa fa-level-down"></i>' . number_format($number2, 2) . '% </td>';
    } elseif ($number1 > $number2) {
        $per = bcsub($number1, $number2);
        $per = ($per * 100) / $number2;
        return '<td class="text-danger"> <i class="fa fa-level-down"></i>' . number_format($per, 2) . '% </td>';
    } elseif ($number2 > $number1) {
        $per = bcsub($number2, $number1);
        $per = ($per * 100) / $number2;
        return '<td class="text-success"> <i class="fa fa-level-up"></i>' . number_format($per, 2) . '% </td>';
    } else {
        return '<td class=""> 0% </td>';
    }
}


/**
 * Appends arrays together
 * @param $base_array
 * @param ...$arrays_to_join
 * @return mixed - joined array
 */
function appendArray($base_array, ...$arrays_to_join)
{
    if (!is_array($base_array)) {
        return $base_array;
    }
    foreach ($arrays_to_join as $sec_array) {
        if (!is_array($sec_array))
            continue;
        foreach ($sec_array as $key => $value) {
            $base_array[$key] = $value;
        }
    }
    return $base_array;
}


// get month name from number
function month_name($month_number)
{
    return date('F', mktime(0, 0, 0, $month_number, 10));
}

// get get last date of given month (of year)
//function month_end_date($year, $month_number)
//{
//    return date("t", strtotime("$year-$month_number-0"));
//}

function month_end_date($year, $month_number)
{
    return date("t", strtotime("$year-$month_number-1"));
}

// return two digit month or day, e.g. 04 - April
function zero_pad($number)
{
    if ($number < 10)
        return "0$number";

    return "$number";
}

/**
 * Generic random strings generator for passkeys, pins, serials, etc
 *
 * @param int $xlenght length of character to generate
 * @param string $xters character base (NUM, ALPHA, ALNUM)
 * @return string xstring the generated string
 *
 */
function GenerateRandomString($xlenght = 10, $xters = 'NUM')
{
    //$xters can be NUM, ALPHA, ALPHANUM
    $xters_xbase = "";
    $xstring = "";

    if (strcasecmp($xters, 'NUM') == 0) {
        //Numerics only
        $xters_xbase = "123456789";
    } elseif (strcasecmp($xters, 'ALPHA') == 0) {
        //Alphabetic Only - certain xters omitted cos they look like nums e.g. S & 5
        $xters_xbase = "ABCDEFGHJKLMNPQRTUVWXY";
    } else {
        //Alpha-Numerics
        $xters_xbase = "ABCDEFGHJKLMNPQRTUVWXY" . "123456789";
    }

    $xter_xbase_len = strlen($xters_xbase);

    $xstring = "";
    for ($i = 1; $i <= $xlenght; $i++) {
        //use a random number to get a random alpha from $xters-xbase
        $xstring .= $xters_xbase{mt_rand(0, ($xter_xbase_len - 1))};
    }

    return $xstring;
}

// Return quarters between tow dates. Array of objects
function get_quarters($start_date, $end_date)
{

    $quarters = array();

    $start_month = date('m', strtotime($start_date));
    $start_year = date('Y', strtotime($start_date));

    $end_month = date('m', strtotime($end_date));
    $end_year = date('Y', strtotime($end_date));

    $start_quarter = ceil($start_month / 3);
    $end_quarter = ceil($end_month / 3);
    $quarter = $start_quarter; // variable to track current quarter

    // Loop over years and quarters to create array
    for ($y = $start_year; $y <= $end_year; $y++) {
        if ($y == $end_year)
            $max_qtr = $end_quarter;
        else
            $max_qtr = 4;

        for ($q = $quarter; $q <= $max_qtr; $q++) {

            $current_quarter = new stdClass();

            $end_month_num = zero_pad($q * 3);
            $start_month_num = ($end_month_num - 2);
            $q_start_month = month_name($start_month_num);
            $q_end_month = month_name($end_month_num);

            if ($start_month_num < 10) {
                $start_month_num = "0" . $start_month_num;
            }

            $current_quarter->period = "Qtr $q ($q_start_month - $q_end_month) $y";
            $current_quarter->periodOnly = "Qtr $q";
            $current_quarter->period_start = "$y-$start_month_num-01";      // yyyy-mm-dd
            $current_quarter->period_end = "$y-$end_month_num-" . month_end_date($y, $end_month_num);

            $quarters[] = $current_quarter;
            unset($current_quarter);
        }
        $quarter = 1; // reset to 1 for next year
    }

    return $quarters;

}




