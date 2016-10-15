<?php

namespace Application\Controller;

use Zend\Authentication\AuthenticationServiceInterface;
use Zend\Authentication\Adapter\DbTable\CallbackCheckAdapter;
use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;

class LoginController extends AbstractActionController {

    public $authService;
    
    public function __construct($authService) {
        $this->authService = $authService;
    }
    
    
    
    public function loginAction() {
        
        if ($this->authService->hasIdentity()) {
           return $this->redirect()->toRoute('beer');
        }
        
        $form = $this->getForm();

        $form->setAttribute('action', '/auth/login');
        $request = $this->getRequest();
        
        if ($request->isPost()) {
            
            $login = new \Application\Model\Login;
            $form->setInputFilter($login->getInputFilter());
            $form->setData($request->getPost());
            if ($form->isValid()) {
                
                $formData = $form->getData();
                
                $authAdapter = $this->authService->getAdapter();
                $authAdapter->setIdentity($formData['username']);
                $authAdapter->setCredential($formData['password']);
                
                $result = $this->authService->authenticate();
                
                if ($result->isValid()) {
                    return $this->redirect()->toRoute('beer');
                } else {
                    $messageError = "Login Inválido!";
                }
            }
        }
        $view = new ViewModel([
            'form' => $form,
            'messageError' => $messageError
        ]);
        $view->setTemplate('application/login/login.phtml');

        return $view;
    }
    
    private function getForm()
    {
        $form = new \Application\Form\Login;
        foreach ($form->getElements() as $element) {
            if (! $element instanceof \Zend\Form\Element\Submit) {
                $element->setAttributes([
                    'class' => 'form-control'
                ]);
            }
        }
        return $form;
    }
    
    public function logoutAction() {
        if ($this->authService->hasIdentity()) {
            $this->authService->clearIdentity();
        }
        return $this->redirect()->toRoute('login');
    }

}
