<? $title = "Mon blog - admin panel - add comment"; ?>

<?php
    session_start();    

    if((!isset($_SESSION['auth']) && $_SESSION['auth'] !== 'true') && (!isset($_SESSION['name']) && $_SESSION['name'] !== 'admin') && (!isset($_SESSION['userType']) && $_SESSION['userType'] !== 'admin')) {
        header('Location: /blog_php');           
    } 
?>

<?php ob_start(); ?>

<h1>Ajouter un commentaire</h1>

<?php $content = ob_get_clean(); ?>

<?php require('layout.php'); ?>