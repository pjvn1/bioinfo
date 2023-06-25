<?php

use Adianti\Control\TAction;
use Adianti\Control\TPage;
use Adianti\Database\TTransaction;
use Adianti\Widget\Dialog\TMessage;
use Adianti\Widget\Form\TEntry;
use Adianti\Widget\Form\TLabel;
use Adianti\Widget\Wrapper\TDBCombo;
use Adianti\Wrapper\BootstrapFormBuilde;


class TesteList extends TPage{


    private $form;

    public function __construct()
    {
        parent::__construct();

        $this ->form = new BootstrapFormBuilder('Form_materias');
        $materias = new TEntry('materias');
        $this->form->addFields([new TLabel('Materias:')], [$materias]);
        $this->form->addAction('salvar nome da materia', new TAction(array($this,'onSave')),'fa:check-circle-o green');




        parent::add($this->form);
    }

    public function onSave(){
        try {
            TTransaction::open('teste');
            $data = $this->form->getData();
            $materias = new Materias();
            $materias->nome = $data->nome;
            $data -> store();
            TTransaction::close();


        } catch (Exception $e){
            new TMessage('error', $e->getMessage());
        }
    }
}


