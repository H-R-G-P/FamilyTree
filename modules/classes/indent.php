<?php


namespace modules\classes;


class indent
{
    /**
     * Calculate indent using the formula.
     * @param $level int The level on which you need to calculate indent
     * @param $biggerLevel int The bigger level in current family tree
     * @param $tab string Calculate in class 'peopleBlock'
     * @return string String from spaces that will round people's block
     */
    public static function create($level, $biggerLevel, $tab): string
    {
        $sum_peoples_on_bigger_level = self::sumPeoplesOn($biggerLevel);
        $y = self::sumPeoplesOn($level);
        $sumTabs = $sum_peoples_on_bigger_level/$y - 1;
        return work::accumulate($tab, $sumTabs);
    }

    /**
     * Calculate sum peoples on current level
     * @param $level int Family tree level number
     * @return int Sum peoples
     */
    public static function sumPeoplesOn($level)
    {
        return 2**($level - 1);
    }
}