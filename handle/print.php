<?php

require_once ('../modules/classes/work.php');
require_once ('../modules/classes/tree.php');
require_once ('../modules/classes/level.php');
require_once ('../modules/classes/indent.php');
require_once('../modules/classes/dataBase.php');
require_once('../modules/classes/translator.php');
require_once ('../modules/classes/peopleBlock.php');

use modules\classes\tree;
use modules\classes\level;
use modules\classes\indent;
use modules\classes\dataBase;
use modules\classes\translator;
use modules\classes\peopleBlock;


echo "hello from PRINT<br>";
echo "<pre>";


$dataBase = new dataBase();
$geniusData = $dataBase->collectGeniusData([],21);


$translator = new translator();
$translator->translate($geniusData);
$arr = $translator->getArrLevels();


drawTree($arr);


echo "</pre>";


function drawTree($arr)
{
    $tree = new tree();
    $peopleBlock = new peopleBlock();
    $tab = $peopleBlock->makeTab();
    for ($i=1; $i <= count($arr); $i++)
    {
        if ($arr[$i])
        {
            $indent = indent::create($i, count($arr), $tab);
            $level = new level;
            $level->addBlocks($arr[$i], $indent);
            $tree->add($level->get());
        }
    }
    $tree->draw();
}