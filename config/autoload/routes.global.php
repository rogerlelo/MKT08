<?php

use CodeEmailMKT\Application\Action\Customer;
use CodeEmailMKT\Application\Action;

return [
    'dependencies' => [
        'invokables' => [
            Zend\Expressive\Router\RouterInterface::class => Zend\Expressive\Router\AuraRouter::class,
            CodeEmailMKT\Application\Action\PingAction::class => CodeEmailMKT\Application\Action\PingAction::class,

        ],
        'factories' => [
            CodeEmailMKT\Application\Action\HomePageAction::class => CodeEmailMKT\Application\Action\HomePageFactory::class,
            CodeEmailMKT\Application\Action\TestePageAction::class => CodeEmailMKT\Application\Action\TestePageFactory::class,
            Action\LoginPageAction::class => Action\LoginPageFactory::class,
            Action\LogoutAction::class => Action\LogoutFactory::class,
            Customer\CustomerListPageAction::class => Customer\Factory\CustomerListPageFactory::class,
            Customer\CustomerCreatePageAction::class => Customer\Factory\CustomerCreatePageFactory::class,
            Customer\CustomerUpdatePageAction::class => Customer\Factory\CustomerUpdatePageFactory::class,
            Customer\CustomerDeletePageAction::class => Customer\Factory\CustomerDeletePageFactory::class
        ],
    ],

    'routes' => [
        [
            'name' => 'home',
            'path' => '/',
            'middleware' => CodeEmailMKT\Application\Action\HomePageAction::class,
            'allowed_methods' => ['GET'],
        ],
        [
            'name' => 'api.ping',
            'path' => '/api/ping',
            'middleware' => CodeEmailMKT\Application\Action\PingAction::class,
            'allowed_methods' => ['GET'],
        ],
        [
            'name' => 'teste',
            'path' => '/teste',
            'middleware' => CodeEmailMKT\Application\Action\TestePageAction::class,
            'allowed_methods' => ['GET'],
        ],
        [
            'name' => 'auth.login',
            'path' => '/auth/login',
            'middleware' => CodeEmailMKT\Application\Action\LoginPageAction::class,
            'allowed_methods' => ['GET','POST'],
        ],
        [
            'name' => 'auth.logout',
            'path' => '/auth/logout',
            'middleware' => CodeEmailMKT\Application\Action\LogoutAction::class,
            'allowed_methods' => ['GET'],
        ],
        [
            'name' => 'customer.list',
            'path' => '/admin/customers',
            'middleware' => Customer\CustomerListPageAction::class,
            'allowed_methods' => ['GET'],
        ],
        [
            'name' => 'customer.create',
            'path' => '/admin/customer/create',
            'middleware' => Customer\CustomerCreatePageAction::class,
            'allowed_methods' => ['GET','POST'],
        ],
        [
            'name' => 'customer.update',
            'path' => '/admin/customer/update/{id}',
            'middleware' => Customer\CustomerUpdatePageAction::class,
            'allowed_methods' => ['GET','PUT'],
            'options' => [
                'tokens' => [
                    'id' => '\d+'
                ]
            ]
        ],
        [
            'name' => 'customer.delete',
            'path' => '/admin/customer/delete/{id}',
            'middleware' => Customer\CustomerDeletePageAction::class,
            'allowed_methods' => ['GET','DELETE'],
            'options' => [
                'tokens' => [
                    'id' => '\d+'
                ]
            ]
        ],
    ],
];
