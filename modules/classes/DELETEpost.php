<?php


namespace modules\classes;


use phpDocumentor\Reflection\Types\This;

class DELETEpost
{
    private $convertedPOST;

    public function get($typePeople, $typeValue)
    {
        return $this->post[$typePeople];
        switch ($typeVal) {
            case 'FN':
                if (!$database->existsFirstName($value))
                    $database->addFirstName($value);
                $id = $database->getIdFirstName($value);
                $peoples['FN'] = $id;
                break;
            case 'LN':
                if (!$database->existsLastName($value))
                    $database->addLastName($value);
                $id = $database->getIdLastName($value);
                $peoples['LN'] = $id;
                break;
            case 'Patr':
                if (!$database->existsPatronymic($value))
                    $database->addPatronymic($value);
                $id = $database->getIdPatronymic($value);
                $peoples['Patr'] = $id;
                break;
            case 'YOB':
                if ($value == '') $peoples['YOB'] = NULL;
                else $peoples['YOB'] = $value;
                break;
            case 'BP':
                if (!$database->existsBirthPlace($value))
                    $database->addBirthPlace($value);
                $id = $database->getIdBirthPlace($value);
                $peoples['BP'] = $id;
                break;
            case 'Desc':
                if ($value == '') $peoples['Desc'] = NULL;
                else $peoples['Desc'] = $value;
                break;
        }
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
    function convertPOST($POST)
    {
        foreach ($POST as $type => $value) {
            $peoples = [];
            $typePeop = explode('_', $type)[0];
            $typeVal = explode('_', $type)[1];
            if ($typePeop == 'people') {
                $peoples[$typePeop] = addPeople();
            } elseif ($typePeop == 'mother') {
                $peoples[$typePeop] = addPeople($value, $typeVal);
            } elseif ($typePeop == 'father') {
                $peoples[$typePeop] = addPeople($value, $typeVal);
            }
        }
    }

    public function __construct($_POST)
    {

        $this->post = $_POST;
    }
}