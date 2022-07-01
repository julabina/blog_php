<?php $title = "Mon blog - admin panel"; ?>

<?php
    session_start();    

    if((!isset($_SESSION['auth']) && $_SESSION['auth'] !== 'true') && (!isset($_SESSION['name']) && $_SESSION['name'] !== 'admin') && (!isset($_SESSION['userType']) && $_SESSION['userType'] !== 'admin')) {
        header('Location: /blog_php');           
    } 
?>

<?php ob_start(); ?>

<main>

    <h1>ADMIN PANEL</h1>
    <form action="/blog_php/adminlogout" method="post">
        <button type="submit">Se deconnecter</button>
    </form>
    
</main>
    
<?php $content = ob_get_clean(); ?>

<?php require('layout.php'); ?>