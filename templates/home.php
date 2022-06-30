<?php $title = "Mon blog"; ?>

<?php ob_start(); ?>

<main>
    <h1>Mon blog</h1>
</main>

<?php $content = ob_get_clean(); ?>

<?php require('layout.php');