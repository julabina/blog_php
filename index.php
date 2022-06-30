<?php

require 'vendor/autoload.php';

$router = new App\Router\Router($_GET['url']);

$router->get('/', function(){ echo 'Homepage'; });
$router->get('/articles', 'Post#list');
$router->get('/articles/:id', 'Post#show');

/* $router->get('/', function(){ echo "homepage"; });
$router->get('/post', function(){ echo 'Tous les articles'; });
$router->get('/post/:slug-:id', function($slug, $id){ echo 'Afficher l\' article '. $slug . ' ' . $id; })->with('id', '[0-9]+')->with('slug', '([a-zA-Z\-0-9])+');
$router->get('/article/:id', 'Post#getPost');
$router->get('/post/:id', function($id) { echo 'Article ' . $id; });
$router->post('/post/:id', function($id){ echo 'Poster l\' article' . $id; }); */

$router->run();