<?php

namespace CodeEmailMKT\Application\Action;

use CodeEmailMKT\Application\Form\LoginForm;
use CodeEmailMKT\Infrastructure\Service\AuthService;
use Interop\Container\ContainerInterface;
use Zend\Expressive\Router\RouterInterface;
use Zend\Expressive\Template\TemplateRendererInterface;

class LoginPageFactory
{
    public function __invoke(ContainerInterface $container)
    {
        $router   = $container->get(RouterInterface::class);
        $template = $container->get(TemplateRendererInterface::class);
        $form = $container->get(LoginForm::class);
        $authService = $container->get(AuthService::class);
        return new LoginPageAction($router, $template, $form, $authService);
    }
}
