<?php

require_once('classes/dataBase.php');
require_once('vars.php');
require_once('functions.php');

use modules\classes\dataBase;

$optionsFN = [];
$optionsLN = [];
$optionsPatr = [];
$optionsBP = [];

$dataBase = new dataBase();
/************************datalists with all FN LN***********************/
	$mysqli_result = $dataBase->query('SELECT f.firstName FROM firstNames f');

	while ($row = mysqli_fetch_array($mysqli_result)) {
	    $optionsFN[] = createOptionForDatalist($row['firstName']);
	}

	$mysqli_result = $dataBase->query('SELECT l.lastName FROM lastNames l');

	while ($row = mysqli_fetch_array($mysqli_result)) {
	    $optionsLN[] = createOptionForDatalist($row['lastName']);
	}

	$mysqli_result = $dataBase->query('SELECT p.patronymic FROM patronymics p');

	while ($row = mysqli_fetch_array($mysqli_result)) {
	    $optionsPatr[] = createOptionForDatalist($row['patronymic']);
	}

	$mysqli_result = $dataBase->query('SELECT b.birthPlace FROM birthPlaces b');

	while ($row = mysqli_fetch_array($mysqli_result)) {
	    $optionsBP[] = createOptionForDatalist($row['birthPlace']);
	}
	?>
	<datalist id="allFN">
		<?php foreach ($optionsFN as $optionFN) {echo $optionFN;} ?>
	</datalist>
	<datalist id="allLN">
		<?php foreach ($optionsLN as $optionLN) {echo $optionLN;} ?>
	</datalist>
	<datalist id="allPatr">
		<?php foreach ($optionsPatr as $optionPatr) {echo $optionPatr;} ?>
	</datalist>
	<datalist id="allBP">
		<?php foreach ($optionsBP as $optionBP) {echo $optionBP;} ?>
	</datalist>
<!-- ----------------------------------------------------------------- -->
<!-- -------------------datalists with father FN LN------------------- -->
	<?php
	unset($optionsFN);
	unset($optionsLN);
	$mysqli_result = $dataBase->query('SELECT f2.firstName FROM fathers f inner join peoples p ON f.father  = p.id INNER JOIN firstNames f2 ON f2.id = p.id_firstNames');

	$optionsFN = optionsFrom($mysqli_result, 'firstName');

	$mysqli_result = $dataBase->query('SELECT l.lastName FROM fathers f inner join peoples p ON f.father  = p.id INNER JOIN lastNames l ON l.id = p.id_lastNames');

	$optionsLN = optionsFrom($mysqli_result, 'lastName');

	?>
	<datalist id="listOfFatherFN">
		<?php foreach ($optionsFN as $optionFN) {echo $optionFN;} ?>
	</datalist>
	<datalist id="listOfFatherLN">
		<?php foreach ($optionsLN as $optionLN) {echo $optionLN;} ?>
	</datalist>
<!-- ---------------------------------------------------------------- -->
<!-- -------------------datalists with mother FN LN------------------ -->
	<?php
	unset($optionsFN);
	unset($optionsLN);

	$mysqli_result = $dataBase->query('SELECT f.firstName FROM peoples p inner join mothers m ON p.id  = m.mother inner join firstNames f ON f.id  = p.id_firstNames');

	$optionsFN = optionsFrom($mysqli_result, 'firstName');

	$mysqli_result = $dataBase->query('SELECT l.lastName FROM mothers m inner join peoples p ON m.mother  = p.id INNER JOIN lastNames l ON l.id = p.id_lastNames');

	$optionsLN = optionsFrom($mysqli_result, 'lastName');

	?>
	<datalist id="listOfMotherFN">
		<?php foreach ($optionsFN as $optionFN) {echo $optionFN;} ?>
	</datalist>
	<datalist id="listOfMotherLN">
		<?php foreach ($optionsLN as $optionLN) {echo $optionLN;} ?>
	</datalist>
<!-- ---------------------------------------------------------------- -->
