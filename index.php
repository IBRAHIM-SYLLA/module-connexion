<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="accueil connexion.css">
    <title>Document</title>
</head>
<body>
    <header>
    <h1><em> ANIME & Co</em></h1>
        <ul>
            <li><a href="index.php">Accueil</a></li>
            <?php if (empty($_SESSION)){
                echo '<li><a href="inscription.php">Inscription</a></li>
                <li><a href="connexion.php">Connexion</a></li>';
            }
                else{
                    echo '<li><a href="profil.php">Mon Profil</a></li>';
                }
            ?>
            <?php
                if (isset($_SESSION['utilisateurs']) && isset($_SESSION['password']) && $_SESSION['password'] == 'admin'){
                    echo '<li><a href="admin.php">Admin</a></li>';
                }
                if(!empty( $_SESSION)){
                        echo '<li><form action="" method="post">
                                <input class="index" type="submit" value="deconnexion" name = "deconnexion">
                            </form></li>';
                }
            ?>
        </ul>
    </header>
    <main>
        <?php
            if(isset($_POST['deconnexion'])){
                session_unset();
                header("location: connexion.php");
            }
            else if(!empty($_SESSION)){
                $user = $_SESSION['utilisateurs'];
                echo "<p id='bonjour'>Bonjour $user, vous êtes connectés".'</p>';
            }
        ?>
        <div class="gallimg">
            <img src="image/demon_salyer.png" alt="">
            <img src="image/naruto.jpg" alt="">
            <img src="image/ken.jpg" alt="">
            <img src="image/bleach.jpg" alt="">
            <img src="image/baki.jpg" alt="">
            <img src="image/hxh.jpeg" alt="">
            <img src="image/dbz.jpg" alt="">
            <img src="image/one.jpg" alt="">
        </div>
    </main>

    <footer>
        <div>
            <p class="footerh1">Suivez nous !</p>
            <div class="rs">
                <img src="image/facebook.svg" alt="" height="64px">
                <p>Instagram</p>
            </div>
            <div class="rs">
                <img src="image/instagram.svg" alt="" height="64px">
                <p>Instagram</p>
            </div>
        </div>
        <div>
            <p class="footerh1">Github</p>
            <a href="https://github.com/IBRAHIM-SYLLA/module-connexion.git" target="_blank"><p>Module-connexion</p></a>
        </div>
    </footer>
</body>
</html>