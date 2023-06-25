<?php

use Adianti\Database\TRecord;

class TestList extends TRecord
{

    const TABLENAME = "materias";

    const PRIMARYKEY = "idmaterias";

    const IDPOLICY = "serial"; // ou max


    public function __construct($idmaterias = NULL){

        parent::__construct($idmaterias);
        parent::addAttribute('materias');




    }



    public function get_materias(){
        if(empty($this->materias))
            $this-> materias = new Animals($this -> idmaterias);
        return $this -> materias;
    }
}
