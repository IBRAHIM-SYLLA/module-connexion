<?php
session_start();
$oldLog = $_SESSION['login'];
$bdd = mysqli_connect('localhost','root','','moduleconnexion');
mysqli_set_charset($bdd, 'utf8');
if(isset($_POST['submitProfil']))
{
    if(isset($_POST['login']) && isset($_POST['prenom']) && isset($_POST['nom']) && isset($_POST['password']))
    {
        $requete = mysqli_query($bdd,"SELECT login, prenom, nom, password FROM utilisateurs WHERE login = '$oldLog'");
        $user = mysqli_fetch_all($requete, MYSQLI_ASSOC);

        $login_update =  $_POST['login'];
        $prenom_update =  $_POST['prenom'];
        $nom_update =  $_POST['nom'];
        $password_update =  $_POST['password'];

        $requete2 = "UPDATE utilisateurs SET login = '$login_update', prenom = '$prenom_update', nom = '$nom_update', password = '$password_update' WHERE login = '$oldLog'";
        $reponse = $bdd->query($requete2);
        // $_SESSION['login'] = $_POST['login'];
        // header('Location: index.php');
            session_unset();
            header("location: connexion.php");
    }
}
if(isset($_POST['deconnexion'])){
    session_unset();
    header("location: connexion.php");
}
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="accueil connexion.css">
        <title>Profil</title>
    </head>
    <body>
            <header>
                <h1><em>Mon Profil</em></h1>
                <ul>
                    <li><a href="index.php">Accueil</a></li>
                    <?php if (empty($_SESSION)){
                        echo '<li><a href="inscription.php">Inscription</a></li>
                        <li><a href="connexion.php">Connexion</a></li>';
                    }?>
                    <li><a href="profil.php">Mon Profil</a></li>
                    <?php
                    if (isset($_SESSION['login']) && isset($_SESSION['password']) && $_SESSION['password'] == 'admin'){
                                echo '<li><a href="admin.php">Admin</a></li>';
                            }
                    if(!empty( $_SESSION)){
                        echo '<li><form action="" method="post">
                                <input class="index" type="submit" value="deconnexion" name = "deconnexion">
                            </form></li>';
                        }?>
                </ul>
            </header>
            <main>
                <div class ="inscription">
                            <form action="profil.php" method="post">
                                <label for="login">Login</label>
                                <input type="text" id="login" name="login" value="<?php echo $_SESSION['login']; ?>">

                                <label for="prenom">Prenom</label>
                                <input type="text" id="prenom" name="prenom" value="<?php echo $_SESSION['prenom'];?>">

                                <label for="nom">Nom</label>
                                <input type="text" id="nom" name="nom" value="<?php echo $_SESSION['nom'];?>">

                                <label for="password">Password</label>
                                <input type="password" id="password" name="password" value="<?php echo $_SESSION['password'];?>">

                                <input type="submit" name='submitProfil' value="mettre a jour">
                            </form>
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