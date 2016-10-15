<?php

namespace Application\Form;

use Zend\Form\Element;
use Zend\Form\Form;

class Beer extends Form {

    public function __construct() {
        parent::__construct();
        $this->attributes = [
            'class' => 'form-vertical',
        ];
        $this->add([
            'name' => 'name',
            'options' => [
                'label' => 'Marca',
            ],
            'attributes' => [
                 'placeholder' => 'Marca da cerveja',
            ],
            'type' => 'Text',
        ]);
        $this->add([
            'name' => 'style',
            'options' => [
                'label' => 'Estilo',
            ],
            'type' => 'Text',
        ]);
        $this->add([
            'name' => 'img',
            'options' => [
                'label' => 'Imagem',
            ],
            'type' => 'Text',
        ]);
        $this->add([
            'name' => 'send',
            'type' => 'Submit',
            'attributes' => [
                'value' => 'Salvar',
                'class' => 'btn btn-default',
            ],
        ]);
        $this->setAttribute('action', '/beer/save');
        $this->setAttribute('method', 'post');
    }

}
