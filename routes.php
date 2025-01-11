<?php

$router->get('/', 'views/home.view.php');
$router->get('/listings', 'views/listings/index.view.php');
$router->get('/listings/create', 'views/listings/create.view.php');
