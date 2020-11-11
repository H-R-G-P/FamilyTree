<?php


namespace modules\classes;


class tree
{
    /**
     * All levels in one array
     * @var array $tree
     * @example [0 => $firstLvl, 1 => $secondLvl]
     */
    protected $tree;

    /**
     * Add a variable to $tree
     * @param $level string[] With 3 values
     * @return void
     */
    public function add($level)
    {
        $this->tree[] = $level;
    }

    /**
     * Draw each string of level of tree
     * @return void
     */
    public function draw()
    {
        foreach ($this->tree as $level) {
            foreach ($level as $str) {
                echo $str . PHP_EOL;
            }
        }
    }
}