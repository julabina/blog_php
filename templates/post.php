<?php $title = "Mon blog - " . htmlspecialchars($post->title); ?>

<?php session_start(); ?>

<? ob_start(); ?>

<main class="blogPost">
    <a href="/blog_php"><h1>Mon blog</h1></a>
    <a href="/blog_php/articles">Retour à la liste des articles</a>
    
    <h1><?= htmlspecialchars($post->title); ?></h1>
    <p><?= htmlspecialchars($post->update_date); ?></p>
    <h2><?= htmlspecialchars($post->chapo); ?></h2>
    
    <p><?= htmlspecialchars($post->content); ?></p>

    <div class="blogPost__separator"></div>
    
    <!-- START IF -->
    <?php if((isset($_SESSION['name']) && $_SESSION['name'] !== "") && (isset($_SESSION['auth']) && $_SESSION['auth'] === "true")): ?>

    <form class="blogPost__form" action="" method="post">
        <div class="blogPost__form__name">
            <div class="blogPost__form__name__lastname">
                <label for="">Nom</label>
                <input type="text" id="" name="lastname">
            </div>
            <div class="blogPost__form__name__firstname">
                <label for="">Prenom</label>
                <input type="text" id="" name="firstname">
            </div>
        </div>
        <div class="blogPost__form__mail">
            <label for="">Adresse email</label>
            <input type="email" id="" name="email">
        </div>
        <div class="blogPost__form__message">
            <label for="">Votre commentaire</label>
            <textarea id="" name="content" cols="30" rows="10"></textarea>
        </div>
        <button type="submit">Envoyer</button>
    </form>

    <?php else: ?>

        <p>Vous devez être connecté pour pouvoir commenter</p>
        <a href="/blog_php/log">Se connecter</a>

    <?php endif; ?>
    <!-- END IF -->

    <div class="blogPost__separator"></div>

    <?php foreach($comments as $comment): ?>
        <div>
            <p><?= htmlspecialchars($comment->content); ?></p>
            <p>le <?= htmlspecialchars($comment->update_date); ?></p>
            <p>Par <?= htmlspecialchars($comment->author); ?></p>
        </div>

    <?php endforeach; ?>
    
</main>
<footer>
    <?php if((isset($_SESSION['auth']) && $_SESSION['auth'] === 'true') && (isset($_SESSION['name']) && $_SESSION['name'] === 'admin') && (isset($_SESSION['userType']) && $_SESSION['userType'] === 'admin')): ?>
        
        <a href="/blog_php/adminPanel">admin panel</a>
        
    <?php endif; ?>  
</footer>

<?php $content = ob_get_clean(); ?>

<?php require('layout.php'); ?>