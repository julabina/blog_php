<?php $title = "Mon blog - admin panel - add comment"; ?>

<?php
    session_start();    

    if((!isset($_SESSION['auth']) && $_SESSION['auth'] !== 'true') && (!isset($_SESSION['name']) && $_SESSION['name'] !== 'admin') && (!isset($_SESSION['userType']) && $_SESSION['userType'] !== 'admin')) {
        header('Location: /blog_php');           
    } 
?>

<?php ob_start(); ?>

<h1>Ajouter un commentaire</h1>

<form action="/blog_php/adminPanel/addarticle" method="post">
    <div class="">
        <label for="">Titre</label>
        <input type="text" name="title" id="">
    </div>
    <div class="">
        <label for="">Chapo</label>
        <input type="text" name="chapo" id="">
    </div>
    <div class="">
        <label for="">Auteur</label>
        <input type="text" name="author" id="">
    </div>
    <div class="">
        <label for="">Contenu</label>
        <textarea name="content" id=""></textarea>
    </div>
    <button type="submit">Créer</button>
</form>

<?php $content = ob_get_clean(); ?>

<?php require('layout.php'); ?>