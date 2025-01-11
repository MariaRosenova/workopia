<?php
require '../Router.php';

$router = new Router();

require '../helpers.php';
require '../routes.php';

$uri = $_SERVER['REQUEST_URI'];
$method = $_SERVER['REQUEST_METHOD'];

$router->route($uri, $method);
