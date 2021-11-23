<?php
session_start();
    $bdd = mysqli_connect('localhost','root','','moduleconnexion');
mysqli_set_charset($bdd, 'utf8');

$requete = mysqli_query($bdd,"SELECT * FROM utilisateurs");

$utilisateurs = mysqli_fetch_all($requete, MYSQLI_ASSOC);

if ($_SESSION['login'] != 'admin'){
    header('Location: index.php');
    exit();
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
        <title>admin</title>
    </head>
        <body>
                <header>
                    <h1><em>Administration</em></h1>
                        <ul>
                            <li><a href="index.php">Accueil</a></li>
                            <?php if (empty($_SESSION)){
                                echo '<li><a href="inscription.php">Inscription</a></li>
                                <li><a href="connexion.php">Connexion</a></li>';
                            }?>
                            <li><a href="profil.php">Mon Profil</a></li>
                            <?php if (isset($_POST['login']) && isset($_POST['password']) == 'admin'){
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
                <div id = 'table'>
                    <table>
                        <thead>
                            <tr>
                                <th>id</th>
                                <th>login</th>
                                <th>prenom</th>
                                <th>nom</th>
                                <th>password</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                foreach ($utilisateurs as $utilisateur){
                                    echo'<tr><td>'.$utilisateur['id'].'</td>';
                                    echo'<td>'.$utilisateur['login'].'</td>';
                                    echo'<td>'.$utilisateur['prenom'].'</td>';
                                    echo'<td>'.$utilisateur['nom'].'</td>';
                                    echo'<td>'.$utilisateur['password'].'</td>';
                                }
                            ?>
                        </tbody>
                    </table>
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