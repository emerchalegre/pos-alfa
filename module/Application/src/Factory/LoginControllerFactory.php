<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Application\Factory;

use Interop\Container\ContainerInterface;
use Application\Controller\LoginController;

class LoginControllerFactory {
    public function __invoke(ContainerInterface $container)
    {
        $authService = $container->get(\Application\Service\LoginServiceInterface::class);
        return new LoginController($authService);
    }
}
