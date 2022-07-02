<?php $title = "Mon blog - Login"; ?>

<?php session_start(); ?>

<?php ob_start(); ?>

<main>
    <section>
        <?php if((isset($_SESSION['name']) && $_SESSION['name'] !== "") && (isset($_SESSION['auth']) && $_SESSION['auth'] === "true")): ?>
            <form action="/blog_php/logout" method="post">
                <button type="submit">Se deconnecter</button>
            </form>
        <?php else: ?>
        <div>
            <h2>Se connecter</h2>
            <form action="/blog_php/log" method="post">
                <div>
                    <label for="">Email</label>
                    <input type="email" name="email" id="">
                </div>
                <div>
                    <label for="">mot de passe</label>
                    <input type="password" name="password" id="">
                </div>
                <button type="submit">Valider</button>
            </form>
        </div>
        <div>
            <h2>S'enregistrer</h2>
            <form action="/blog_php/sign" method="post">
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
                    <label for="">mot de passe</label>
                    <input type="password" name="password" id="">
                </div>
                <button type="submit">Valider</button>
            </form>
        </div>
        <?php endif; ?>
    </section>
</main>

<?php $content = ob_get_clean(); ?>

<?php require('layout.php'); ?>