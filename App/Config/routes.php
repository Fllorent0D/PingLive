<?php

use Core\Router;

/**
 * Le chemin d'accès à une page est configuré comme étant
 * Controller/action qui lui correspond avec éventuellement quelque paramettres
 * En utilisant les routes vous pouvez changer ce comportement
 * en utilisant le router. Il vous suffit de suivre l'exemple ci-dessous
 */
/*
Router::get('/',[
    "controller" => 'dashboard',
    "action"     => 'index'
]);*/

Router::any('/login',[
    "controller" => 'users',
    "action"     => 'login',
]);

Router::get('/logout',[
    "controller" => 'users',
    "action"     => 'logout',
]);
Router::get('votre/url/{param1}/{param2}',[
    "controller" => 'controller',
    "action"     => 'action',
    "params"     => [
        "param1"    => '/[0-9]+/',
        "param2"  => '/[a-zA-Z\-]/'
    ]
]);