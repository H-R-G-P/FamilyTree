<?php

require_once('classes/dataBase.php');

use modules\classes\dataBase;


/**
 * @param $name string|int
 * @param $value string|int
 * @return string
 */
function createCheckbox($name, $value): string
{
    return "<input type='checkbox' name='{$name}' value='{$value}'>";
}

function createOption($value, $text)
{
    return "<option value='{$value}'>{$text}</option>";
}

function createOptionForDelete($value, $text1, $text2)
{
	return "<option value='{$value}'>{$text1} ({$text2})</option>";
}

function makeCheckboxesForDelete($name, $value)
{
    return "<input type='checkbox' name='{$name}' value='{$value}'>";
}

function createOptionForDatalist($value)
{
	return "<option value='{$value}'>";
}

function optionsFrom($mysqli_result, $colname)
{
	$arr = [];
	while ($row = mysqli_fetch_array($mysqli_result)) {
		$arr[] = $row[$colname];
	}
	$arr = array_unique($arr);

	foreach ($arr as $value) {
	    $options[] = createOptionForDatalist($value);
	}

	return $options;
}

/**
 * Add people in database and return his id.
 * Add data to other tables than add to main table using added data.
 * All tables are divided into main ('peoples') and other (all except 'peoples').
 * @param $people array Array of the second nesting level from array that return function 'convertPOST'.
 * @return int|null people's id that was added or null in case of failure.
 */
function addPeople($people)
{
    $database = new dataBase();
    if (!$database->existsFirstName($people['FN']))
        $database->addFirstName($people['FN']);
    $id = $database->getIdFirstName($people['FN']);
    $people['FN'] = $id;
    if (!$database->existsLastName($people['LN']))
        $database->addLastName($people['LN']);
    $id = $database->getIdLastName($people['LN']);
    $people['LN'] = $id;
    if (!$database->existsPatronymic($people['Patr']))
        $database->addPatronymic($people['Patr']);
    $id = $database->getIdPatronymic($people['Patr']);
    $people['Patr'] = $id;
    if (!$database->existsBirthPlace($people['BP']))
        $database->addBirthPlace($people['BP']);
    $id = $database->getIdBirthPlace($people['BP']);
    $people['BP'] = $id;
    if (!$database->existsPeople($people['FN'], $people['LN'], $people['Patr'], $people['YOB'], $people['BP'], $people['Desc']))
        $database->addPeople($people['FN'], $people['LN'], $people['Patr'], $people['YOB'], $people['BP'], $people['Desc']);
    return $database->getIdPeople($people['FN'], $people['LN'], $people['Patr'], $people['YOB'], $people['BP'], $people['Desc']);
}

/**
 * Filer and convert POST's data to associated array. <br>
 * @param $POST array Example:
 * <code>
 *     $_POST = [ <br>
 *         'people_FN' => 'name', <br>
 *         'people_LN' => 'last name', <br>
 *         'people_Patr' => 'patronymic', <br>
 *         'people_YOB' => '2004', <br>
 *         'people_BP' => 'Minsk', <br>
 *         'people_Desc' => 'description', <br>
 *         'mother_FN' => 'name', <br>
 *         ... <br>
 *         'father_FN' => 'name', <br>
 *         ... <br>
 *     ]
 * </code>
 * @return array Example:
 * <code>
 *      [ <br>
 *       'people' => [ <br>
 *          'FN' => 'danik', <br>
 *          'LN' => 'shum', <br>
 *          ... <br>
 *          'desc' => 'thom desc' <br>
 *      ], <br>
 *       'mother' => [...], <br>
 *       'father' => [...] <br>
 *      ]
 * </code>
 */
function convertPOST($POST) // TODO: После добавлениЯ сценария в add.php обратить внимание, не надо ли здесь что-нибуть поиенять.
{
    $peoples = [];
    foreach ($POST as $type => $value) {
        $typePeop = explode('_', $type)[0];
        $typeVal = explode('_', $type)[1];
        $peoples[$typePeop][$typeVal] = $value; // TODO: Сделать так, что бы до базы данных доходили значения полностью в нижнем регистре.
    }
    return $peoples;
}