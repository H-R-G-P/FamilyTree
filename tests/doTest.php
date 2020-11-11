<?php

require_once ('../modules/classes/dataBase.php');
require_once ('dataBaseTest.php');

use tests\dataBaseTest;

echo '>>>>>>>>>>>>>>>>>' . PHP_EOL;
echo '>>>Start test>>>>' . PHP_EOL;
echo '>>>>>>>>>>>>>>>>>' . PHP_EOL;

dataBaseTest::testExistsBirthPlace();
dataBaseTest::testExistsFirstName();
dataBaseTest::testExistsLastName();
dataBaseTest::testExistsPatronymic();
dataBaseTest::testExistsPeople();