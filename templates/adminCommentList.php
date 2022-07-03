<?php $title = "Mon blog - admin panel"; ?>

<?php
    session_start();    

    if((!isset($_SESSION['auth']) && $_SESSION['auth'] !== 'true') && (!isset($_SESSION['name']) && $_SESSION['name'] !== 'admin') && (!isset($_SESSION['userType']) && $_SESSION['userType'] !== 'admin')) {
        header('Location: /blog_php');           
    } 
?>

<?php ob_start(); ?>

<main class="adminCommentList">
<a class="blogBack" href="/blog_php/adminPanel">Retour</a>
    <h1>Commentaires à approuver</h1>

    <?php foreach($comments as $comment): ?>
        <article class="adminCommentList__comment">
            <p class="adminCommentList__comment__content"><?= $comment->content ?></p>
            <p class="adminCommentList__comment__author">Par <?= $comment->author ?></p>
            <div class="adminCommentList__comment__btnCont">
                <form action="/blog_php/adminPanel/articles/<?= urlencode($comment->postId); ?>/commentDelete/<?= urlencode($comment->commentId); ?>" method="post">
                    <button type="submit">Effacer</button>
                </form>
                <form action="/blog_php/adminPanel/validateComment/<?= urlencode($comment->commentId); ?>" method="post">
                    <button type="submit">Approuvé</button>
                </form>
            </div>
        </article>

    <?php endforeach; ?>
    
</main>
    
<?php $content = ob_get_clean(); ?>

<?php require('layout.php'); ?>