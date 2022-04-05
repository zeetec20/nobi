<?php

namespace App\Helper;

class Utils
{
    /**
     * @param float $number
     * @return float
     */
    static public function numberTo6Digit($number)
    {
        if (count(str_split(str_replace('.', '', strval($number)))) == 6) return floatval($number);
        if (count(str_split(str_replace('.', '', strval($number)))) < 6 ) {
            $decimal = explode('.', strval($number));
            if (count($decimal) == 1) {
                $length = count(str_split($decimal[0]));
                $number = $decimal[0].'.'.str_repeat('0', (6 - $length));
                settype($number, 'float');
                return $number;
            } else {
                $length = count(str_split($decimal[0])) + count(str_split($decimal[1]));
                $number = $decimal[0].'.'.$decimal[1].str_repeat('0', (6 - $length));
                settype($number, 'float');
                return $number;
            }
        } else {
            $decimal6digit = [];
            foreach (str_split(strval($number)) as $key => $value) {
                if (count($decimal6digit) <= 6) array_push($decimal6digit, $value);
            }
            $number = implode($decimal6digit);
            settype($number, 'float');
            return $number;
        }
    }
}
