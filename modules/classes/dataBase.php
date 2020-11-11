<?php

namespace modules\classes;

use mysqli;
use mysqli_result;

class dataBase
{
    private string $DB_HOST = 'localhost';
    private string $DB_USER = 'familytree';
    private string $DB_PASSWORD = 'familytree';
    private string $DB_NAME = "up_familytree";

    /**
     * @param string $query
     * @return mysqli_result
     */
    public function query($query)
    {
        $mysqli = new mysqli($this->DB_HOST, $this->DB_USER, $this->DB_PASSWORD, $this->DB_NAME);

        if ($mysqli->connect_errno) {
            printf("Не удалось подключиться: %s\n", $mysqli->connect_error);
            exit();
        }

        $mysqli->set_charset('utf8');

        $mysqli_result = $mysqli->query($query);

        if (!$mysqli_result)
        {
            echo 'The mysqli_result of query to dataBase is false. Query: ' . $query . '.<br>';
            echo "Error: $mysqli->error";
        }

        $mysqli->close();

        return $mysqli_result;
    }

    /**
     * Collect all older relatives for people with $peopleId
     * @param $data array  Relatives gather in it
     * @param $peopleID int People's id that begin $data
     * @return array|null All older relatives for people with $peopleId
     */
    public function collectGeniusData($data, $peopleID)
    {
        if ($peopleID == NULL) return NULL;
        $data = array_merge($data, ['id' => $peopleID, 'mother' => [], 'father' => []]);
        $motherID = $this->getMotherID($peopleID);
        $data['mother'] = $this->collectGeniusData($data['mother'], $motherID);
        $fatherID = $this->getFatherID($peopleID);
        $data['father'] = $this->collectGeniusData($data['father'], $fatherID);
        return $data;
    }

    /**
     * Find and return id from database for child's father
     * @param $childID int
     * @return string Id
     */
    protected function getFatherID($childID)
    {
        $result = $this->query("select f.father from up_familytree.fathers f where f.child = {$childID}");
        return mysqli_fetch_assoc($result)['father'];
    }

    /**
     * Find and return id from database for child's mother
     * @param $childID int
     * @return string Id
     */
    protected function getMotherID($childID)
    {
        $result = $this->query("select m.mother from up_familytree.mothers m where m.child = {$childID}");
        return mysqli_fetch_assoc($result)['mother'];
    }

    /**
     * Add value to table 'birthPlace' in database.
     * @param $birthPlace string Place where people is bore
     */
    public function addBirthPlace($birthPlace)
    {
        $this->query("INSERT INTO up_familytree.birthPlaces (birthPlace) VALUES ('{$birthPlace}')");
    }

    /**
     * Add column to table 'brothers' in database.
     * @param $idPeople int id from table 'peoples'
     * @param $idBrother int id from table 'peoples'
     */
    public function addBrother($idPeople, $idBrother)
    {
        $this->query("INSERT INTO up_familytree.brothers (id_peoples,brothers) VALUES ('{$idPeople}','{$idBrother}')");
    }

    /**
     * Add column to table 'sisters' in database.
     * @param $idPeople int id from table 'peoples'
     * @param $idSister int id from table 'peoples'
     */
    public function addSister($idPeople, $idSister)
    {
        $this->query("INSERT INTO up_familytree.sisters (id_peoples,sisters) VALUES ('{$idPeople}','{$idSister}')");
    }

    /**
     * Add column to table 'fathers' in database.
     * @param $idChild int people's id from table 'peoples'
     * @param $idFather int people's id from table 'peoples'
     */
    public function addFather($idChild, $idFather)
    {
        $this->query("INSERT INTO up_familytree.fathers (child, father) VALUES ('{$idChild}', '{$idFather}')");
    }

    /**
     * Add column to table 'mothers' in database.
     * @param $idChild int people's id from table 'peoples'
     * @param $idMother int people's id from table 'peoples'
     */
    public function addMother($idChild, $idMother)
    {
        $this->query("INSERT INTO up_familytree.mothers (child, mother) VALUES ('{$idChild}', '{$idMother}')");
    }

    /**
     * Add column to table 'patronymics' in database.
     * @param $patronymic string
     */
    public function addPatronymic($patronymic)
    {
        $this->query("INSERT INTO up_familytree.patronymics (patronymic) VALUES ('{$patronymic}')");
    }

    /**
     * Add column to table 'firstNames' in database.
     * @param $firstName string
     */
    public function addFirstName($firstName)
    {
        $this->query("INSERT INTO up_familytree.firstNames (firstName) VALUES ('{$firstName}')");
    }

    /**
     * Add column to table 'lastNames' in database.
     * @param $lastName string
     */
    public function addLastName($lastName)
    {
        $this->query("INSERT INTO up_familytree.lastNames (lastName) VALUES ('{$lastName}')");
    }

    /**
     * Add column to table 'peoples' in database.
     * @param $id_firstNames int
     * @param null $id_lastNames
     * @param null $id_patronymics
     * @param null $yearOfBirth
     * @param null $id_birthPlaces
     * @param null $description
     * @param null $id_users
     */
    public function addPeople($id_firstNames, $id_lastNames=null, $id_patronymics=null, $yearOfBirth=null, $id_birthPlaces=null, $description=null, $id_users=2)
    {
        $this->query("INSERT INTO up_familytree.peoples (
                                   id_firstNames, 
                                   id_lastNames, 
                                   yearOfBirth, 
                                   id_users, 
                                   id_birthPlaces, 
                                   id_patronymics, 
                                   description) VALUES (
                                                        '{$id_firstNames}', 
                                                        '{$id_lastNames}', 
                                                        '{$yearOfBirth}', 
                                                        '{$id_users}', 
                                                        '{$id_birthPlaces}', 
                                                        '{$id_patronymics}', 
                                                        '{$description}'
                                                        )"
        );
    }

    /**
     * Add column to table 'users' in database.
     * @param $login string
     */
    public function addUser($login)
    {
        $this->query("INSERT INTO up_familytree.users (login) VALUES ('{$login}')");
    }

    /**
     * Checks for this value in the table 'firstNames'
     * @param string $value first name
     * @return bool
     */
    public function existsFirstName(string $value)
    {
        $result = $this->query("select * from firstNames where firstName = '{$value}'");
        if ($result->num_rows == 0) return false;
        return true;
    }

    /**
     * Checks for this value in the table 'lastNames'
     * @param string $value last name
     * @return bool
     */
    public function existsLastName(string $value)
    {
        $result = $this->query("select * from lastNames where lastName = '{$value}'");
        if ($result->num_rows == 0) return false;
        return true;
    }

    /**
     * Checks for this value in the table 'patronymics'.
     * @param string $value patronymic
     * @return bool
     */
    public function existsPatronymic(string $value)
    {
        $result = $this->query("select * from patronymics where patronymic = '{$value}'");
        if ($result->num_rows == 0) return false;
        return true;
    }

    /**
     * Checks for this value in the table 'birthPlace'.
     * @param string $value birth place
     * @return bool
     */
    public function existsBirthPlace(string $value)
    {
        $result = $this->query("select * from birthPlaces where birthPlace = '{$value}'");
        if ($result->num_rows == 0) return false;
        return true;
    }

    /**
     * Checks for this people's characteristics in the table 'peoples'.
     * @param int $id_firstNames
     * @param int $id_lastNames
     * @param int $id_patronymics
     * @param int $yearOfBirth
     * @param int $id_birthPlaces
     * @param string $description
     * @param int $id_users
     * @return bool
     */
    public function existsPeople(int $id_firstNames, int $id_lastNames, int $id_patronymics, int $yearOfBirth, int $id_birthPlaces, string $description, int $id_users = 2)
    {
        $result = $this->query("select * from peoples where id_firstNames = {$id_firstNames} and id_lastNames = {$id_lastNames} and id_patronymics = {$id_patronymics} and yearOfBirth = {$yearOfBirth} and id_birthPlaces = {$id_birthPlaces} and description = '{$description}' and id_users = {$id_users}");
        if ($result->num_rows == 0) return false;
        return true;
    }

    /**
     * Return value's id form table 'firstNames' or null if this value in table 'firstNames' not exists.
     * @param string $value first name
     * @return int|null
     */
    public function getIdFirstName(string $value)
    {
        $result = $this->query("select id from firstNames where firstName = '{$value}'");
        if ($result->num_rows == 0) return NULL;
        return $result->fetch_assoc()['id'];
    }

    /**
     * Return value's id form table 'lastNames' or null if this value in table 'lastNames' not exists.
     * @param string $value last name
     * @return int|null
     */
    public function getIdLastName(string $value)
    {
        $result = $this->query("select id from lastNames where lastName = '{$value}'");
        if ($result->num_rows == 0) return NULL;
        return $result->fetch_assoc()['id'];
    }

    /**
     * Return value's id form table 'patronymics' or null if this value in table 'patronymics' not exists.
     * @param string $value patronymic
     * @return int|null
     */
    public function getIdPatronymic(string $value)
    {
        $result = $this->query("select id from patronymics where patronymic = '{$value}'");
        if ($result->num_rows == 0) return NULL;
        return $result->fetch_assoc()['id'];
    }

    /**
     * Return value's id form table 'birthPlace' or null if this value in table 'birthPlace' not exists.
     * @param string $value birth place
     * @return int|null
     */
    public function getIdBirthPlace(string $value)
    {
        $result = $this->query("select id from birthPlaces where birthPlace = '{$value}'");
        if ($result->num_rows == 0) return NULL;
        return $result->fetch_assoc()['id'];
    }

    /**
     * Return people's id form table 'peoples' or null if this people in table 'peoples' not exists.
     * @param int $id_firstNames
     * @param int $id_lastNames
     * @param int $id_patronymics
     * @param int $yearOfBirth
     * @param int $id_birthPlaces
     * @param string $description
     * @param int $id_users
     * @return int|null
     */
    public function getIdPeople(int $id_firstNames, int $id_lastNames, int $id_patronymics, int $yearOfBirth, int $id_birthPlaces, string $description, int $id_users = 2)
    {
        $result = $this->query("select id from peoples where id_firstNames = {$id_firstNames} and id_lastNames = {$id_lastNames} and id_patronymics = {$id_patronymics} and yearOfBirth = {$yearOfBirth} and id_birthPlaces = {$id_birthPlaces} and description = '{$description}' and id_users = {$id_users}");
        if ($result->num_rows == 0) return NULL;
        return $result->fetch_assoc()['id'];
    }

     // TODO: Добавить методы: findBrothers(id_people), findSisters(id_people). Они будут использовать метод ниже и добавлять в таблицы brothers and sisters.
     // TODO: Добавить методы для предыдущего задния, методы: findChildes(id_people) Исчет в таблицах мамы, папы
    public function __construct($DB_HOST=null, $DB_USER=null, $DB_PASSWORD=null, $DB_NAME=null)
    {
        if ($DB_HOST && $DB_USER && $DB_PASSWORD && $DB_NAME)
        {
            $this->DB_HOST = $DB_HOST;
            $this->DB_USER = $DB_USER;
            $this->DB_PASSWORD = $DB_PASSWORD;
            $this->DB_NAME = $DB_NAME;
        }
    }

}