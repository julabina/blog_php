<?php $title = "Mon blog - admin panel - modify comment"; ?>

<?php
    session_start();    

    if((!isset($_SESSION['auth']) && $_SESSION['auth'] !== 'true') && (!isset($_SESSION['name']) && $_SESSION['name'] !== 'admin') && (!isset($_SESSION['userType']) && $_SESSION['userType'] !== 'admin')) {
        header('Location: /blog_php');           
    } 
?>

<?php ob_start(); ?>

<h1>Modifier un commentaire</h1>

<form action="" method="post">
    <div class="">
        <label for=""></label>
        <input type="text" value="<?= htmlspecialchars($post->title); ?>" name="" id="">
    </div>
    <div class="">
        <label for=""></label>
        <input type="text" value="<?= htmlspecialchars($post->chapo); ?>" name="" id="">
    </div>
    <div class="">
        <label for=""></label>
        <textarea name="" id=""><?= htmlspecialchars($post->content); ?></textarea>
    </div>
    <button type='submit'>Modifier</button>
</form>

<?php foreach($comments as $comment): ?>
    <div>
        <p><?= $comment->content; ?></p>
        <p><?= $comment->author; ?></p>
        <form action="" method="post">
            <button type="submit">Supprimer le commentaire</button>
        </form>
        <form action="" method="post">
            <button type="submit">Desactiver le commentaire</button>
        </form>
    </div>
<?php endforeach; ?>

<?php $content = ob_get_clean(); ?>

<?php require('layout.php'); ?>