<?php

require 'vendor/autoload.php';

$router = new App\Router\Router($_GET['url']);

$router->get('/', function(){ require('templates/home.php'); });
$router->get('/articles', 'Post#list');
$router->get('/articles/:id', 'Post#show');
$router->get('/adminlog', function(){ require('templates/adminLog.php'); });
$router->post('/adminlog', 'Admin#log');
$router->get('/adminPanel', function(){ require('templates/admin.php'); });
$router->post('/adminlogout', 'Admin#logout');
$router->get('/adminPanel/addarticle', function(){ require('templates/adminAddArticle.php'); });
$router->get('/adminPanel/showarticles', 'Admin#list');
$router->get('/adminPanel/modify/:id', 'Admin#show');
$router->post('/adminPanel/modify/:id', 'Admin#modify');
$router->post('/adminPanel/delete/:id', 'Admin#delete');
$router->post('/adminPanel/addarticle', 'Admin#create');

/* $router->get('/', function(){ echo "homepage"; });
$router->get('/post', function(){ echo 'Tous les articles'; });
$router->get('/post/:slug-:id', function($slug, $id){ echo 'Afficher l\' article '. $slug . ' ' . $id; })->with('id', '[0-9]+')->with('slug', '([a-zA-Z\-0-9])+');
$router->get('/article/:id', 'Post#getPost');
$router->get('/post/:id', function($id) { echo 'Article ' . $id; });
$router->post('/post/:id', function($id){ echo 'Poster l\' article' . $id; }); */

$router->run();