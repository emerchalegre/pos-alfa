<?php

namespace Application\Service;

use Interop\Container\ContainerInterface;
use Zend\Authentication\Adapter\DbTable\CallbackCheckAdapter;
use Zend\Authentication\AuthenticationService;
use Zend\Authentication\Storage\Session;
use Zend\Db\Adapter\AdapterInterface;

class LoginService {
    public function __invoke(ContainerInterface $container)
    {
        $passwordCallbackVerify = function ($passwordInDatabase, $passwordSent) {
            return password_verify($passwordSent, $passwordInDatabase);
        };
        $dbAdapter = $container->get(AdapterInterface::class);
        $authAdapter = new CallbackCheckAdapter($dbAdapter, 'users', 'username', 'password', $passwordCallbackVerify);
        $storage = new Session();
        return new AuthenticationService($storage, $authAdapter);
    }
}
