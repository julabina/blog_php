<?php $title = "Mon blog - " . htmlspecialchars($post->title); ?>

<?php session_start(); ?>

<?php ob_start(); ?>

<main class="blogPost">
    <a class="blogBack" href="/blog_php/articles">Retour à la liste des articles</a>
    <a href="/blog_php"><h1 class="blogTitle">Mon blog</h1></a>
    
    <h2><?= htmlspecialchars($post->title); ?></h2>
    <h3><?= htmlspecialchars($post->chapo); ?></h3>
    
    <p class="blogPost__content"><?= htmlspecialchars($post->content); ?></p>
    <p class="blogPost__updateDate">Derniere mise à jour le <?= htmlspecialchars($post->update_date); ?></p>

    <div class="blogPost__separator"></div>
    
    <?php 
    /* START IF */
    if((isset($_SESSION['name']) && $_SESSION['name'] !== "") && (isset($_SESSION['auth']) && $_SESSION['auth'] === "true")): ?>

    <?php $actionUrl = "/blog_php/articles/postComment/" . urlencode($post->id) . "-" . urlencode($_SESSION['userId']); ?>
    <form class="blogPost__form" action="<?= $actionUrl; ?>" method='post'>
        <div class="blogPost__form__message">
            <label for="">Votre commentaire</label>
            <textarea id="" name="content"></textarea>
        </div>
        <button class="blogPost__form__btn" type="submit">Envoyer</button>
        <p class="blogPost__ann">Tous les commentaires doivent être approuvé par le webmaster</p>
    </form>

    <?php else: ?>

        <p>Vous devez être connecté pour pouvoir commenter</p>
        <a href="/blog_php/log"><button class="blogPost__logBtn">Se connecter</button></a>

    <?php endif; 
    /* END IF */
    ?>

    <div class="blogPost__separator"></div>
    <?php if(sizeof($comments) === 0): ?>

        <p class="blogPost__noComment">Pas encore de commentaires</p>

    <?php else: ?>
        
        <?php foreach($comments as $comment): ?>
            <div class="blogPost__comment">
                <?php if($_SESSION['userId'] === $comment->userId): ?>
                    
                    <form action="/blog_php/articles/<?= urlencode($post->id); ?>/comment/<?= urlencode($comment->id); ?>" method="post">
                        <textarea class="blogPost__comment__update" name="modifyContent"><?= htmlspecialchars($comment->content); ?></textarea>
                        <p class="blogPost__comment__date">le <?= htmlspecialchars($comment->update_date); ?></p>
                        <p class="blogPost__comment__by">Par <?= htmlspecialchars($comment->author); ?></p>
                                        
                            <button type="submit">Modifier</button>
                        </form>
                        <form action="/blog_php/articles/<?= urlencode($post->id); ?>/commentDelete/<?= urlencode($comment->id); ?>" method="post">
                            <button type="submit">Supprimer</button>
                        </form>
                    <?php else: ?> 
                        
                        <p class="blogPost__comment__content"><?= htmlspecialchars($comment->content); ?></p>
                        <p class="blogPost__comment__date">le <?= htmlspecialchars($comment->update_date); ?></p>
                        <p class="blogPost__comment__by">Par <?= htmlspecialchars($comment->author); ?></p>
                    
                <?php endif; ?>
            </div>   
        <?php endforeach; ?>

    <?php endif; ?>    
    
</main>
<footer>
    <?php if((isset($_SESSION['auth']) && $_SESSION['auth'] === 'true') && (isset($_SESSION['name']) && $_SESSION['name'] === 'admin') && (isset($_SESSION['userType']) && $_SESSION['userType'] === 'admin')): ?>
        
        <a href="/blog_php/adminPanel">admin panel</a>
        
    <?php endif; ?>  
</footer>

<?php $content = ob_get_clean(); ?>

<?php require('layout.php'); ?>