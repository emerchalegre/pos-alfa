<?php

namespace Application\Model;

use Zend\InputFilter\InputFilter;

class Login {
    public $username;
    public $password;
    
    /**
     * Configura os filtros dos campos da classe
     * 
     * @return Zend\InputFilter\InputFilter
     */
    public function getInputFilter() 
    {
        $inputFilter = new InputFilter;
                
        $inputFilter->add(array(
            'name'      => 'username',
            'required'  => true,
            'filters'   => array(
                array('name' => 'StripTags'),
                array('name' => 'StringTrim'),
            ),
            'validators'=> array(
                array(
                    'name'      => 'StringLength',
                    'options'   => array(
                        'encoding'  => 'UTF-8',
                        'min'       => 1,
                        'max'       => 100,
                    ),
                ),
            ),
        ));
        
        $inputFilter->add(array(
            'name'      => 'password',
            'required'  => true,
            'filters'   => array(
                array('name' => 'StripTags'),
                array('name' => 'StringTrim'),
            ),
            'validators'=> array(
                array(
                    'name'      => 'StringLength',
                    'options'   => array(
                        'encoding'  => 'UTF-8',
                        'min'       => 1,
                        'max'       => 100,
                    ),
                ),
            ),
        ));
        
        return $inputFilter;
    }
}
