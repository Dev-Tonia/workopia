<?php 
require '../helpers.php';

// creating the basic routes
$routes = [
'/' => 'controllers/home.php',
'/listings'=> 'controllers/listings/index.php',
'/listings/create'=> 'controllers/listings/create.php',
'404'=> 'controllers/error/404.php'
];

// getting the current url using the server super globals
$uri = $_SERVER['REQUEST_URI'];  

// getting the current url using the server super globals
if(array_key_exists($uri, $routes)){
require(basePath($routes[$uri]));
}else{
    require basePath($routes['404']);
}