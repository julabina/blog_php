<?php $title = "Mon blog - tous les articles"; ?>

<?php ob_start(); ?>
<main class="blogPosts">

    <h1>Mon blog</h1>

    <?php foreach($posts as $post): ?>
        <article class="blogPosts__post">
            <!-- htmlspecialchars = Convertit les caractères spéciaux en entités HTML -->
            <h2><?= htmlspecialchars($post->title); ?></h2>
            <p><?= htmlspecialchars($post->update_date); ?></p>
            <p><?= htmlspecialchars($post->chapo); ?></p>
            <a href="/blog_php/articles/<?= urlencode($post->id) ?>">Lire l'article</a>
        </article> 
    <?php endforeach; ?>
        
        
</main>
<?php $content = ob_get_clean(); ?>

<?php require('layout.php'); ?>