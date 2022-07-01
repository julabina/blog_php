<?php $title = "Mon blog"; ?>

<?php session_start(); ?>

<?php ob_start(); ?>

<main>

    <h1>Mon nom et mon Prenom</h1>

    <img src="assets/moi.webp" alt="une photo de moi">

    <p>une phrase d’accroche qui me ressemble</p>

    <div>
        <a href="/blog_php/articles">articles</a>
        <a href="#">S'inscrire ou se connecter</a>
    </div>

    <form action="" method="post">
        <div>
            <div>
                <label for="">Nom</label>
                <input type="text" name="lastname" id="">
            </div>
            <div>
                <label for="">Prenom</label>
                <input type="text" name="firstname" id="">
            </div>
        </div>
        <div>
            <label for="">Email</label>
            <input type="email" name="email" id="">
        </div>
        <div>
            <label for="">Message</label>
            <textarea name="message" id=""></textarea>
        </div>
        <button type="submit">Envoyer</button>
    </form>

    <a href="#">Un lien vers mon cv</a>

    <div>
        <a href="#">Github</a>
        <a href="#">Linkedin</a>
    </div>

</main>
<footer>
    <?php if((isset($_SESSION['auth']) && $_SESSION['auth'] === 'true') && (isset($_SESSION['name']) && $_SESSION['name'] === 'admin') && (isset($_SESSION['userType']) && $_SESSION['userType'] === 'admin')): ?>
        
        <a href="/blog_php/adminPanel">admin panel</a>
        
    <?php endif; ?>  
</footer>

<?php $content = ob_get_clean(); ?>

<?php require('layout.php');