<?php $title = "Mon blog - admin panel - comments list"; ?>

<?php
    session_start();    

    if((!isset($_SESSION['auth']) && $_SESSION['auth'] !== 'true') && (!isset($_SESSION['name']) && $_SESSION['name'] !== 'admin') && (!isset($_SESSION['userType']) && $_SESSION['userType'] !== 'admin')) {
        header('Location: /blog_php');           
    } 
?>

<?php ob_start(); ?>

<h1>Liste des articles</h1>

<?php foreach($posts as $post): ?>
    <div class="">
        <h2><?= htmlspecialchars($post->title); ?></h2>
        <p><?= htmlspecialchars($post->chapo) ?></p>
        <div class="">
            <form action="/blog_php/adminPanel/modify/<?= urlencode($post->id); ?>" method="post">
                <button type="submit">Modifier</button>
            </form>
            <form action="/blog_php/adminPanel/delete" method="post">
                <button type="submit">Supprimer</button>
            </form>
        </div>
    </div>

<?php endforeach; ?>

<?php $content = ob_get_clean(); ?>

<?php require('layout.php'); ?>