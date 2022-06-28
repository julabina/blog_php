<?php

require 'vendor/autoload.php';
/* die($_GET['url']); */

/*$request = $_SERVER['REQUEST_URI'];
echo $routes[$request];
$route = $routes[$request];
echo $route;
echo "test";
 if($route) {
    echo 'test';
} */

$router = new App\Router\Router($_GET['url']);

$router->get('/', function(){ echo "homepage"; });
$router->get('/post', function(){ echo 'Tous les articles'; });
$router->get('/post/:id', function($id){ echo 'Afficher l\' article' . $id; });
$router->post('/post/:id', function($id){ echo 'Poster l\' article' . $id; });

$router->run();