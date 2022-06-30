<?php $title = "Mon blog - " . htmlspecialchars($post->title); ?>

<? ob_start(); ?>
<main class="blogPost">
    <a href="/blog_php/articles">Retour à la liste des articles</a>

    <h1><?= htmlspecialchars($post->title); ?></h1>
    <p><?= htmlspecialchars($post->update_date); ?></p>
    <h2><?= htmlspecialchars($post->chapo); ?></h2>
    
    <p><?= htmlspecialchars($post->content); ?></p>
    <form class="blogPost__form" action="" method="post">
        <div class="blogPost__form__name">
            <div class="blogPost__form__name__lastname">
                <label for="">Nom</label>
                <input type="text" id="">
            </div>
            <div class="blogPost__form__name__firstname">
                <label for="">Prenom</label>
                <input type="text" id="">
            </div>
        </div>
        <div class="blogPost__form__mail">
            <label for="">Adresse email</label>
            <input type="email" id="">
        </div>
        <div class="blogPost__form__message">
            <label for="">Votre commentaire</label>
            <textarea id="" cols="30" rows="10"></textarea>
        </div>
        <button type="submit">Envoyer</button>
    </form>
    
</main>
<?php $content = ob_get_clean(); ?>

<?php require('layout.php'); ?>