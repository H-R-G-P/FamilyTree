<?php

require_once('classes/dataBase.php');
require_once('vars.php');
require_once('functions.php');

use modules\classes\dataBase;


$dataBase = new dataBase();
/*
$mysqli_result = $dataBase->query(' ');

foreach ($mysqli_result as $row)
{
    $id = $row[0];
    $generation = $row[1];
    $checkboxes[] = createCheckbox($id, $generation);
}

foreach ($checkboxes as $checkbox) {
    echo $checkbox;
}*/
