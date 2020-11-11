<?php


namespace modules\classes;


class level
{
    /**
     * @var string[] $strings Each level consists of 3 strings
     */
    private array $strings = ['', '', ''];

    /**
     * @param $str0 string Add to first string of level
     * @param $str1 string Add to second string of level
     * @param $str2 string Add to third string of level
     * @return void
     */
    private function addStrings($str0, $str1, $str2)
    {
        $this->strings[0] .= $str0;
        $this->strings[1] .= $str1;
        $this->strings[2] .= $str2;
    }

    /**
     * Add to the level, surrounding by indents, blocks with names.
     * @param $names array
     * @param $indent string
     * @return void
     */
    public function addBlocks($names, $indent)
    {
        $peopleBlock = new peopleBlock;

        foreach ($names as $name) {
            $block = $peopleBlock->create($name);
            $this->addStrings($indent, $indent, $indent);
            $this->addStrings($block[0], $block[1], $block[2]);
            $this->addStrings($indent, $indent, $indent);
        }
    }

    /**
     * @return string[]
     */
    public function get()
    {
        return $this->strings;
    }
}