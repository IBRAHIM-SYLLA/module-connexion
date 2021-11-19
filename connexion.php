<?php
session_start();
if (isset($_POST['login']) && isset($_POST['password'])){
    $bdd = mysqli_connect('localhost','root','','moduleconnexion');
    mysqli_set_charset($bdd, 'utf8');
    $login = $_POST['login'];
    $password = $_POST['password'];
    if($login !== "" && $password !== ""){
        $requete = "SELECT * FROM utilisateurs WHERE login = '$login' AND password = '$password'";
        $requete2 = mysqli_query($bdd, $requete);
        $reponse = mysqli_fetch_array($requete2);
        if($reponse){
            $_SESSION['login'] = $login;
             header('Location: index.php');
            $_SESSION['nom'] =$reponse['nom'];
            $_SESSION['prenom']=$reponse['prenom'];
            $_SESSION['password']=$reponse['password'];
        }
                if(isset($_SESSION['login'])){
                    $user = $_SESSION['login'];
                    // afficher un message
                    echo "Bonjour $user, vous êtes connecté";
                }
        else{
            echo "login ou password incorrect";
        }
    }

}
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
    <h1><em>Connexion</em></h1>
        <ul>
            <li><a href="index.php">Accueil</a></li>
            <li><a href="inscription.php">Inscription</a></li>
            <li><a href="connexion.php">Connexion</a></li>
            <li><a href="">Mon Profil</a></li>
            <li><a href="">Admin</a></li>
        </ul>
    </header>
    <main>
        <div class="inscription">
            <form  method="post">
              <label for="login">Login</label>
              <input type="text" id="login" name="login">

              <label for="passeword">Passeword</label>
              <input type="text" id="password" name="password">

              <input type="submit" value="Connexion">
            </form>
        </div>
    </main>

    <footer>

    </footer>
</body>
</html>