<?php $title = "Mon blog - Login"; ?>

<?php session_start(); ?>

<?php ob_start(); ?>

<main>
<a href="/blog_php"><h1 class="blogTitle blogTitleLog">Mon blog</h1></a>
    <section class="blogLog">
        <?php if((isset($_SESSION['name']) && $_SESSION['name'] !== "") && (isset($_SESSION['auth']) && $_SESSION['auth'] === "true")): ?>
            <form action="/blog_php/logout" method="post">
                <button class="blogLog__logoutBtn" type="submit">Se deconnecter</button>
            </form>
        <?php else: ?>
        <div class="blogLog__formCont">
            <h2>Se connecter</h2>
            <form action="/blog_php/log" method="post">
                <div class="blogLog__formCont__long">
                    <label for="">Email</label>
                    <input type="email" name="email" id="">
                </div>
                <div class="blogLog__formCont__long">
                    <label for="">mot de passe</label>
                    <input type="password" name="password" id="">
                </div>
                <button class="blogLog__formCont__btn" type="submit">Valider</button>
            </form>
        </div>
        <div class="blogLog__formCont">
            <h2>S'enregistrer</h2>
            <form action="/blog_php/sign" method="post">
                <div class="blogLog__formCont__nameCont">
                    <div class="blogLog__formCont__nameCont__name">
                        <label for="">Nom</label>
                        <input type="text" name="lastname" id="">
                    </div>
                    <div class="blogLog__formCont__nameCont__name">
                        <label for="">Prenom</label>
                        <input type="text" name="firstname" id="">
                    </div>
                </div>
                <div class="blogLog__formCont__long">
                    <label for="">Email</label>
                    <input type="email" name="email" id="">
                </div>
                <div class="blogLog__formCont__long">
                    <label for="">mot de passe</label>
                    <input type="password" name="password" id="">
                </div>
                <button class="blogLog__formCont__btn" type="submit">Valider</button>
            </form>
        </div>
        <?php endif; ?>
    </section>
</main>
<footer>
    <?php if((isset($_SESSION['auth']) && $_SESSION['auth'] === 'true') && (isset($_SESSION['name']) && $_SESSION['name'] === 'admin') && (isset($_SESSION['userType']) && $_SESSION['userType'] === 'admin')): ?>
        
        <a href="/blog_php/adminPanel">admin panel</a>
        
    <?php endif; ?>  
</footer>

<?php $content = ob_get_clean(); ?>

<?php require('layout.php'); ?>