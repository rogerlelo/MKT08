<?php

namespace CodeEmailMKT\Application\Action;

use CodeEmailMKT\Infrastructure\Service\AuthService;
use Interop\Container\ContainerInterface;
use Zend\Expressive\Router\RouterInterface;

class LogoutFactory
{
    public function __invoke(ContainerInterface $container)
    {
        $router   = $container->get(RouterInterface::class);
        $authService = $container->get(AuthService::class);
        return new LogoutAction($router, $authService);//mesmo namespace
    }
}
