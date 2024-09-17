<?php

$routes = [
    // Authentication routes
    'auth/register' => [
        'controller' => 'AuthController',
        'method' => 'login'


    ],



'auth/register-button' => ['controller'=> 'AuthController',
        'method' => 'registration'],

    '' => ['controller' => 'HomeController', 'method' => 'index'],
    // 'home' => ['controller' => 'HomeController', 'method' => 'index'],
    'login' => ['controller' => 'AuthController', 'method' => 'index'],
    
   'login-button' => ['controller'=> 'AuthController',
        'method' => 'login'],

    // In your routes configuration file (routes.php or similar)


   // 'auth/login' => [
    //    'controller' => 'AuthController',
     //   'method' => 'login'
   // ],
    'auth/logout' => [
        'controller' => 'AuthController',
        'method' => 'logout'
    ],

    // Checkout routes
    'checkout/index' => [
        'controller' => 'CheckoutController',
        'method' => 'index'
    ],
    'checkout/placeOrder' => [
        'controller' => 'CheckoutController',
        'method' => 'placeOrder'
    ],
    'checkout/success/(:num)' => [
        'controller' => 'CheckoutController',
        'method' => 'success'
    ],

    // Admin routes
    //'dashboard' => [
        //'controller' => 'AdminController',
        //'method' => 'dashboard'
    //],
    // Admin routes
    'admin/dashboard' => [
        'controller' => 'AdminController',
        'method' => 'dashboard'
    ],
    // other routes
    
    // Other routes

    'admin/dashboard/edit/{id}' => [
        'controller' => 'AdminController',
        'method' => 'dashboard'
    ],
    'admin/dashboard/delete/{id}' => [
        'controller' => 'AdminController',
        'method' => 'dashboard'
    ],

   'add-to-cart-button' => ['controller'=> 'CartController',
        'method' => 'index'],

    'cart'=> ['controller'=>'CartController','method'=> 'index'],
    'order'=> ['controller'=>'OrderController','method'=> 'index'],
    //'login' => ['controller'=>'AuthController','method'=> 'login'],
    'product'=> ['controller'=>'ProductController','method'=> 'index'],
  // 'dashboard'=> ['controller'=>'AdminController','method'=> 'dashboard']
   

   

    
    
];

?> 