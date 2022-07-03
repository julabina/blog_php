<?php $title = "Mon blog"; ?>

<?php session_start(); ?>

<?php ob_start(); ?>

<header>
    <div>
        <h1>John Doe</h1>
        <p>Une phrase d’accroche qui me ressemble</p>
    </div>
    
    <img src="assets/moi.webp" alt="une photo de moi">
</header>
<main class="home">


    <nav>
        <a href="/blog_php/articles">articles</a>
        <a href="/blog_php/log">S'inscrire ou se connecter</a>
    </nav>

    <h2>Contactez moi</h2>
    <form action="" method="post">
        <div class="home__form__nameCont">
            <div class="home__form__nameCont__name">
                <label for="">Nom</label>
                <input type="text" name="lastname" id="">
            </div>
            <div class="home__form__nameCont__name">
                <label for="">Prenom</label>
                <input type="text" name="firstname" id="">
            </div>
        </div>
        <div class="home__form__mail">
            <label for="">Email</label>
            <input type="email" name="email" id="">
        </div>
        <div class="home__form__message">
            <label for="">Message</label>
            <textarea name="message" id=""></textarea>
        </div>
        <button class="home__form__btn" type="submit">Envoyer</button>
    </form>

    <a class="home__cv" href="#">Téléchargez mon cv</a>

    <div class="home__social">
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