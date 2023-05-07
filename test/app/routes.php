<?php

return [
    
    '/login' => 
    
    [
        'controller' => 'AuthController',
        'action' => 'login',
    ],

    '/logout' => 
    
    [
        'controller' => 'AuthController',
        'action' => 'logout',
    ],

    '/admin' => 
    
    [
        'controller' => 'NewsController',
        'action' => 'index',
    ],

    '/admin/create' => 
    
    [
        'controller' => 'NewsController',
        'action' => 'create',
    ],

    '/admin/edit' => 
    
    [
        'controller' => 'NewsController',
        'action' => 'edit',
    ],

    '/admin/delete' => 
    
    [
        'controller' => 'NewsController',
        'action' => 'delete',
    ],

];
