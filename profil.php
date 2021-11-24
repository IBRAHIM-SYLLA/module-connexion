<?php
    session_start();
    $id = $_SESSION['utilisateurs']['id'];
    $bdd = mysqli_connect('localhost','root','','moduleconnexion');
    mysqli_set_charset($bdd, 'utf8');

?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="style.css">
        <title>Profil</title>
    </head>
    <body>
            <header>
                <h1><em>Mon Profil</em></h1>
                <ul>
                    <li><a href="index.php">Accueil</a></li>
                    <?php
                        if (empty($_SESSION)){
                                echo '<li><a href="inscription.php">Inscription</a></li>
                                <li><a href="connexion.php">Connexion</a></li>';
                        }
                        else{
                            echo '<li><a href="profil.php">Mon Profil</a></li>';
                        }
                    ?>
                    <?php
                        if (isset($_SESSION['login']) && isset($_SESSION['password']) && $_SESSION['password'] == 'admin'){
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
                <div class ="inscription">
                    <?php
                        if(isset($_POST['submitProfil'])){
                            if(isset($_POST['login']) && isset($_POST['prenom']) && isset($_POST['nom']) && isset($_POST['password'])){
                                $login_update =  $_POST['login'];
                                $prenom_update =  $_POST['prenom'];
                                $nom_update =  $_POST['nom'];
                                $password_update =  $_POST['password'];

                                $password_hash = password_hash($password_update, PASSWORD_BCRYPT);

                                $requete2 = "UPDATE utilisateurs SET login = '$login_update', prenom = '$prenom_update', nom = '$nom_update', password = '$password_hash' WHERE id = '$id'";
                                $reponse = $bdd->query($requete2);
                                $_SESSION['utilisateurs']['login']= $login_update;
                                $_SESSION['utilisateurs']['prenom']= $prenom_update;
                                $_SESSION['utilisateurs']['nom']= $nom_update;
                                $_SESSION['utilisateurs']['password']= $password_hash;
                                $message = '<h3>Bravo ! Profil mis a jour !</h3>';
                                echo $message;
                            }
                        }
                        if(isset($_POST['deconnexion'])){
                            session_unset();
                            header("location: connexion.php");
                        }
                    ?>
                            <form action="profil.php" method="post">
                                <label for="login">Login</label>
                                <input type="text" id="login" name="login" value="<?php echo $_SESSION['utilisateurs']['login']; ?>">

                                <label for="prenom">Prenom</label>
                                <input type="text" id="prenom" name="prenom" value="<?php echo $_SESSION['utilisateurs']['prenom'];?>">

                                <label for="nom">Nom</label>
                                <input type="text" id="nom" name="nom" value="<?php echo $_SESSION['utilisateurs']['nom'];?>">

                                <label for="password">Password</label>
                                <input type="password" id="password" name="password">
                                <input type="submit" name='submitProfil' value="mettre a jour">
                            </form>
                </div>
            </main>
            <footer>
                <div>
                    <p class="footerh1">Suivez nous !</p>
                        <div class="rs">
                            <img class="icone" src="image/facebook.svg" alt="" height="64px">
                            <p>Facebook</p>
                        </div>
                        <div class="rs">
                            <img class="icone" src="image/instagram.svg" alt="" height="64px">
                            <p>Instagram</p>
                        </div>
                <div>
                    <p class="footerh1">Github</p>
                    <a href="https://github.com/IBRAHIM-SYLLA/module-connexion.git" target="_blank"><p>Module-connexion</p></a>
                </div>
            </footer>
    </body>
</html>