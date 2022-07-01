<?php $title = "Mon blog - log"; ?>

<?php session_start(); ?>

<?php ob_start(); ?>

<main>
<a href="/blog_php/">Retour</a>
<?php if((isset($_SESSION['auth']) && $_SESSION['auth'] === 'true') && (isset($_SESSION['name']) && $_SESSION['name'] === 'admin') && (isset($_SESSION['userType']) && $_SESSION['userType'] === 'admin')): ?>

    <form action="/blog_php/adminlogout" method="post">
        <button type="submit">Se deconnecter</button>
    </form>

<?php else: ?>   

    <form action="/blog_php/adminlog" method="post">
        <div>
            <label for="logEmail"></label>
            <input type="email" name="email" id="logEmail">
        </div>
        <div>
            <label for="logPassword"></label>
            <input type="password" name="password" id="logPassword">
        </div>
        <button type="submit">Se connecter</button>
    </form>
    
    <?php endif; ?>

</main>

<?php $content = ob_get_clean(); ?>

<?php require('layout.php'); ?>