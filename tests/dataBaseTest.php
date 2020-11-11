<?php


namespace tests;

use modules\classes\dataBase;

class dataBaseTest
{

    public function testExistsBirthPlace()
    {
        $database = new dataBase();
        $test = 'Mogilev';
        $database->addBirthPlace($test);
        if ($database->existsBirthPlace($test)) echo "testExistsBirthPlace success." . PHP_EOL;
        $database->query("delete from up_familytree.birthPlaces where birthPlace = '{$test}'");
    }

    public function testExistsFirstName()
    {
        $database = new dataBase();
        $test = 'Mogilev';
        $database->addBirthPlace($test);
        if ($database->existsBirthPlace($test)) echo "testExistsFirstName success." . PHP_EOL;
        $database->query("delete from up_familytree.birthPlaces where birthPlace = '{$test}'");
    }

    public function testExistsLastName()
    {
        $database = new dataBase();
        $test = 'Mogilev';
        $database->addBirthPlace($test);
        if ($database->existsBirthPlace($test)) echo "testExistsLastName success." . PHP_EOL;
        $database->query("delete from up_familytree.birthPlaces where birthPlace = '{$test}'");
    }

    public function testExistsPatronymic()
    {
        $database = new dataBase();
        $test = 'Mogilev';
        $database->addBirthPlace($test);
        if ($database->existsBirthPlace($test)) echo "testExistsPatronymic success." . PHP_EOL;
        $database->query("delete from up_familytree.birthPlaces where birthPlace = '{$test}'");
    }

    public function testExistsPeople()
    {
        #
    }
}
