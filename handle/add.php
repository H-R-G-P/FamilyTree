<?php


require_once('../modules/classes/dataBase.php');
require_once('../modules/functions.php');

use modules\classes\dataBase;

echo "hello from ADD";
echo "<pre>";
print_r($_POST);
$_POST = [
    'people_FN' => 'Vasia',
    'people_LN' => 'Koshel',
    'people_Patr' => 'Dimovich',
    'people_YOB' => '2005',
    'people_BP' => 'Minsk',
    'people_Desc' => 'Love programm',
    'mother_FN' => 'Kolia',
    'mother_LN' => 'Koshel',
    'mother_Patr' => 'Renatovich',
    'mother_YOB' => '1986',
    'mother_BP' => 'Minsk',
    'mother_Desc' => 'Always sailer',
    'father_FN' => 'Dima',
    'father_LN' => 'Koshel',
    'father_Patr' => 'Sergeevich',
    'father_YOB' => '1985',
    'father_BP' => 'Borisov',
    'father_Desc' => 'Always programmer'
]
?>
<!DOCTYPE html>
<html lang='en'>
<head>
    <link rel="stylesheet" type="text/css" href="../CSS/index.css"/>
    <link rel="stylesheet" href="../Libraries/bootstrap_4.5.2.css">
    <title>Add</title>
	<meta charset='utf-8'>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
</head>
<body>

<?php
// TODO: Добавить сценарий для добавления братьев, систёр
$database = new dataBase();

$convertedPOST = convertPOST($_POST);

$peopleID = addPeople($convertedPOST['people']);
$motherID = addPeople($convertedPOST['mother']);
$fatherID = addPeople($convertedPOST['father']);

$database->addMother($peopleID, $motherID);
$database->addFather($peopleID, $fatherID);
echo "</pre>";
?>

    <script src="../JS/index.js"></script>

    <script src="../Libraries/jquery-3.5.1.slim.js"></script>
    <script src="../Libraries/popper.js"></script>
    <script src="../Libraries/bootstrap_4.5.2.js"></script>

</body>
</html>