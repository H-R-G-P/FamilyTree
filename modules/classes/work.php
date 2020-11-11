<?php


namespace modules\classes;


class work
{
    /**
     * Checked for readiness
     * @param $num int Number that is checked for readiness
     * @return bool
     */
    public static function isEven($num)
    {
        return !($num & 1);
    }

    /**
     * Accumulate string so many times
     * @param $num int Quantity accumulated strings
     * @param $str string String that will accumulate
     * @return string
     */
    public static function accumulate($str, $num): string
    {
        if (!$num) {
            return '';
        }
        $num -= 1;
        return $str . work::accumulate($str, $num);
    }
}