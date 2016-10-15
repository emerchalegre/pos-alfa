<?php

namespace Application\Form;

use Zend\Form\Element;
use Zend\Form\Form;

class Login extends Form {

    public function __construct($name = null) {
        parent::__construct('login');
        $this->add([
            'name' => 'username',
            'options' => [
                'label' => 'Usuário',
            ],
            'type' => 'Text',
        ]);
        $this->add([
            'name' => 'password',
            'options' => [
                'label' => 'Senha',
            ],
            'type' => 'Password',
        ]);
        $this->add([
            'name' => 'send',
            'type' => 'Submit',
            'attributes' => [
                'value' => 'Entrar',
                'class' => 'btn btn-primary'
            ],
        ]);
    }

}
