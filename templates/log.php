<?php $title = "Mon blog - log"; ?>

<?php ob_start(); ?>

<main>
    <form action="/blog_php/adminlog" method="post">
        <div>
            <label for="logName"></label>
            <input type="text" name="name" id="logName">
        </div>
        <div>
            <label for="logPassword"></label>
            <input type="password" name="password" id="logPassword">
        </div>
        <button type="submit">Se connecter</button>
    </form>
</main>

<?php $content = ob_get_clean(); ?>

<?php require('layout.php'); ?>