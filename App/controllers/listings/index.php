<?php

use Framework\Database;

$config = require  basePath('config/db.php');
$db = new Database($config);

$listings = $db->query('SELECT * FROM listings')->fetchAll();
// inspect($listings);

loadView('listings/index', [
    'listings' => $listings,
]);