<?php

use \App\Http\HomeController;

return [
    'get' => [
        '/' => [
            'controller' => 'HomeController',
            'action' => 'index'
        ],

        '/register' =>[
            'controller' => 'AuthController',
            'action' => 'registerForm'
        ],

        '/authorization' =>[
            'controller' => 'AuthController',
            'action' => 'authorizationForm'
        ],
        '/logout' =>[
            'controller' => 'AuthController',
            'action' => 'logout'
        ],
        '/profile' =>[
            'controller' => 'ProfileController',
            'action' => 'lkForm'
        ],
        '/loading' =>[
            'controller' => 'LoadController',
            'action' => 'loadForm'
        ],
        '/delete' =>[
            'controller' => 'DeleteController',
            'action' => 'delete'
        ],
        '/details' =>[
            'controller' => 'DetailsController',
            'action' => 'details'
        ],
        '/deleteProfile' => [
            'controller' => 'DeleteController',
            'action' => 'deleteProfile'
        ],
        '/about' =>[
            'controller' => 'AboutController',
            'action' => 'about'
        ],
        '/schedule' =>[
            'controller' => 'ScheduleController',
            'action' => 'schedule'
        ],
        '/contact' =>[
            'controller' => 'ContactController',
            'action' => 'contact'
        ],
        '/child' =>[
            'controller' => 'ProfileController',
            'action' => 'childForm'
        ]
    ],

    'post' => [
        '/register' => [
            'controller' => 'AuthController',
            'action' => 'register'
        ],

        '/authorization' => [
            'controller' => 'AuthController',
            'action' => 'authorization'
        ],

        '/loading' =>[
            'controller' => 'LoadController',
            'action' => 'load'
        ],
        '/child' =>[
            'controller' => 'ProfileController',
            'action' => 'childLoad'
        ],
        '/subscribe' =>[
            'controller' => 'SubscribeController',
            'action' => 'subscribe'
        ]
    ]
];