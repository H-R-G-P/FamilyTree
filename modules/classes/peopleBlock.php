<?php


namespace modules\classes;


class peopleBlock
{
    /** @var int $blockWidth blockContentLength + outBlockContentLength */
    protected $blockWidth;

    /** @var int $blockContentLength
     *  @example 10 characters in '  danik   '
     */
    protected $blockContentLength = 12;

    /** @var int $outBlockContentLength don't change if not changed function printName
     *  @example 4 characters in each ' /{$blockContent}\ ', ' |{..}| ', ' \/ '
     */
    protected $outBlockContentLength = 4;

    /**
     * Calculate the left and right indents so that the name is the middle of $blockContentLength
     * @param $name string
     * @return array
     */
    protected function align($name): array
    {
        $lengthName = strlen($name);
        if ($lengthName > $this->blockContentLength) {
            die('ERROR length of name more then able!');
        }
        $countSpaces = $this->blockContentLength - $lengthName;
        if (work::isEven($countSpaces)) {
            $rCntSpaces = $countSpaces/2;
            $lCntSpaces = $rCntSpaces;
        }else {
            $rCntSpaces = ($countSpaces - 1)/2;
            $lCntSpaces = $rCntSpaces + 1;
        }
        $rSpaces = work::accumulate(' ', $rCntSpaces);
        $lSpaces = work::accumulate(' ', $lCntSpaces);
        return ['right' => $rSpaces,
                'left' => $lSpaces ];
    }

    /**
     * Fold $blockContentLength and $outBlockContentLength then check for readiness
     * @return void
     */
    private function setBlockWidth()
    {
        $blockWidth = $this->blockContentLength + $this->outBlockContentLength;
        if (work::isEven($blockWidth))
            $this->blockWidth = $blockWidth;
        else
            die("blockContentLength = {$this->blockContentLength};<br>outBlockContentLengthBlock = {$this->outBlockContentLength}. width is not even. That must be even. ");
    }

    /**
     * Create new block with name from three strings
     * @param $name string
     * @return string[]
     */
    public function create($name): array
    {
        $spaces = $this->align($name);
        $str0 = ' /' . work::accumulate('-', $this->blockContentLength) . '\\ ';
        $str1 = ' ⎜' . $spaces['right'] . $name . $spaces['left'] . '⎟ ';
        $str2 = ' \\' . work::accumulate('-', $this->blockContentLength) . '/ ';

        return [$str0, $str1, $str2];
    }

    /**
     * Tab equal half of block's width
     * @return string
     */
    public function makeTab(): string
    {
        $sumSpacesInTab = $this->blockWidth /2;
        return work::accumulate(' ', $sumSpacesInTab);
    }

    public function __construct()
    {
        $this->setBlockWidth();
    }
}
