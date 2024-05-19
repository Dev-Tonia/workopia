<?php
/*
// primary way of declaring routes
return [
    '/' => 'controllers/home.php',
    '/listings' => 'controllers/listings/index.php',
    '/listings/create' => 'controllers/listings/create.php',
    '404' => 'controllers/error/404.php'
];
*/
// Defining the routes from the router class
$router->get('/', 'HomeController::index');
$router->get('/listings', 'ListingController::index');
$router->get('/listings/create', 'ListingController::create');
$router->get('/listing', 'ListingController::show');



/*
This is was how I was defining the rotes before introducing class base controller
$router->get('/', 'controllers/home.php');
$router->get('/listings', 'controllers/listings/index.php');
$router->get('/listings/create', 'controllers/listings/create.php');
$router->get('/listing', 'controllerS/listings/show.php');

*/