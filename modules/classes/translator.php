<?php


namespace modules\classes;

class translator
{
    /**
     * @var dataBase
     */
    private $dataBase;
    /**
     * It's necessary only for the work of the method "translate"
     * @var int
     */
    private $level = 0;
    /**
     * @var array
     * @example [1 => ['... names'], 2 => ['... names'], 3 => ['... names'], 4 => ['... names'], 5 => ['... names']]
     */
    private $arrLevels = [];

    /** This class translate 'tree'(type of data) to 'array in array'(type of data).
     * In each peak this function know level of pyramid and collect sum peoples in each level of pyramid.
     * @param $geniusData array Each array must be of this type: Array ( [id] => $int [mother] => $arr [father] => $arr )
     */
    public function translate($geniusData){
        if ($geniusData == NULL) return;
        $this->level += 1;
        $this->arrLevels[$this->level][] = $this->getName($geniusData['id']);
        $this->translate($geniusData['mother']);
        $this->translate($geniusData['father']);
        $this->level -= 1;
    }

    /**
     * Find from the database name with received id
     * @param $id int Id that is used in the database
     * @return string Name from the database
     */
    private function getName($id): string
    {
        $result = $this->dataBase->query("select f.firstName from peoples p inner join firstNames f on p.id_firstNames = f.id where p.id = {$id}");
        return mysqli_fetch_assoc($result)['firstName'];
    }

    public function __construct()
    {
        $this->dataBase = new dataBase();
    }

    /**
     * @return array
     */
    public function getArrLevels()
    {
        return $this->arrLevels;
    }
}