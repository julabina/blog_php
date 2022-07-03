<?php $title = "Mon blog - tous les articles"; ?>

<?php session_start(); ?>

<?php ob_start(); ?>
<main class="blogPosts">

<a href="/blog_php"><h1 class="blogTitle">Mon blog</h1></a>
    
    <?php foreach($posts as $post): ?>
        <article class="blogPosts__post">
            <!-- htmlspecialchars = Convertit les caractères spéciaux en entités HTML -->
            <h2><?= htmlspecialchars($post->title); ?></h2>
            <p class="blogPosts__chapo"><?= htmlspecialchars($post->chapo); ?></p>
            <p class="blogPosts__date"><?= htmlspecialchars($post->update_date); ?></p>
            <a href="/blog_php/articles/<?= urlencode($post->id) ?>">Lire l'article</a>
        </article> 
    <?php endforeach; ?>
             
</main>
<footer>
    <?php if((isset($_SESSION['auth']) && $_SESSION['auth'] === 'true') && (isset($_SESSION['name']) && $_SESSION['name'] === 'admin') && (isset($_SESSION['userType']) && $_SESSION['userType'] === 'admin')): ?>
        
        <a href="/blog_php/adminPanel">admin panel</a>
        
    <?php endif; ?>  
</footer>

<?php $content = ob_get_clean(); ?>

<?php require('layout.php'); ?>