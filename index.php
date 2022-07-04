<?php

require 'vendor/autoload.php';

$router = new App\Router\Router($_GET['url']);

$router->get('/', function(){ require('templates/home.php'); });
$router->get('/articles', 'Post#list');
$router->get('/articles/:id', 'Post#show')->with('id', '[0-9]+');
$router->post('/articles/postComment/:id-:userId', 'Comment#createComment')->with('id', '[0-9]+')->with('userId', '([a-zA-Z\-0-9])+');
$router->post('/articles/:id/comment/:commentId', 'Comment#update')->with('id', '[0-9]+')->with('commentId', '([a-zA-Z\-0-9])+');
$router->post('/articles/:id/commentDelete/:commentId', 'Comment#delete')->with('id', '[0-9]+')->with('commentId', '([a-zA-Z\-0-9])+');
$router->get('/log', function() { require('templates/log.php'); });
$router->post('/log', 'User#log');
$router->post('/sign', 'User#sign');
$router->post('/logout', 'User#logout');
$router->post('/contact', 'User#sendMail');
$router->get('/adminlog', function(){ require('templates/adminLog.php'); });
$router->post('/adminlog', 'Admin#log');
$router->get('/adminPanel', function(){ require('templates/admin.php'); });
$router->get('/adminPanel/addarticle', function(){ require('templates/adminAddArticle.php'); });
$router->get('/adminPanel/showarticles', 'Admin#list');
$router->get('/adminPanel/modify/:id', 'Admin#show');
$router->post('/adminPanel/modify/:id', 'Admin#modify');
$router->post('/adminPanel/delete/:id', 'Admin#delete');
$router->post('/adminPanel/addarticle', 'Admin#create');
$router->get('/adminPanel/showComments', 'Admin#showComments');
$router->post('/adminPanel/articles/:id/commentDelete/:commentId', 'Admin#deleteComment')->with('id', '[0-9]+')->with('commentId', '([a-zA-Z\-0-9])+');
$router->post('/adminPanel/validateComment/:id', 'Admin#validate');

$router->run();