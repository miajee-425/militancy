<?php namespace App\Sheba;


class Annotation
{

    public $testType_1;

    public $testType_2;


    /**
     * @Var RemoteDB
     * @param $type
     * @return $this
     */
    public function annotationTest($type)
    {
        return $this;
    }
}
