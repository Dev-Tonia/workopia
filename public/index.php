<?php
// importing of 
require __DIR__ . '/../vendor/autoload.php';
require '../helpers.php';

use Framework\Router;

/*
This is also how to load your files manually 
require basePath('Framework/Router.php');
require basePath('Framework/Database.php');
*/
/*
This use to load your class based files with out using PSR-4 from composer 
spl_autoload_register(function ($class) {
    $path = basePath('Framework/' . $class . '.php');
    if (file_exists($path)) {
        require $path;
    }
});
*/
// Instantiating the router
$router = new Router();

$routes = require basePath('routes.php'); //get routes

// getting the current url using the server super globals
/*
Note:: to be able to only get the url path without th query. 
You have to wrap the $_SERVER['REQUEST_URI'] with  parse_url() 
This takes in 2 parameter the Uri ans PHP_URL_PATH 
E.g parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH)
*/
$uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

$method = $_SERVER['REQUEST_METHOD'];


// calling the route method from the Router class.
$router->route($uri, $method);
