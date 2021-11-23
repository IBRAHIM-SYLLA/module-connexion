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
    <title>Connexion</title>
</head>
<body>
    <header>
    <h1><em>Connexion</em></h1>
        <ul>
            <li><a href="index.php">Accueil</a></li>
            <li><a href="inscription.php">Inscription</a></li>
            <li><a href="connexion.php">Connexion</a></li>
            <li><a href="">Mon Profil</a></li>
        </ul>
    </header>
    <main>
        <div class="inscription">

            <?php
                $bdd = mysqli_connect('localhost','root','','moduleconnexion');
                mysqli_set_charset($bdd, 'utf8');
                if (!empty($_POST)){
                    if (isset($_POST['login']) && isset($_POST['password']) && !empty($_POST['login']) && !empty($_POST['password'])){
                        $login = $_POST['login'];
                        $password = $_POST['password'];
                        $sql = "SELECT * FROM utilisateurs WHERE login = '$login'";
                        $req = mysqli_query($bdd, $sql);
                        $utilisateurs = mysqli_fetch_all($req, MYSQLI_ASSOC);
                        if (count($utilisateurs) > 0){
                            if(password_verify($password, $utilisateurs[0]['password']) || $password == $utilisateurs[0]['password']){
                                $_SESSION['utilisateurs'] = [
                                    'id' => $utilisateurs[0]['id'],
                                    'login' => $utilisateurs[0]['login'],
                                    'prenom' => $utilisateurs[0]['prenom'],
                                    'nom' => $utilisateurs[0]['nom'],
                                    'password' => $utilisateurs[0]['password'],
                                ];
                                header('Location: index.php');
                                exit();
                            }
                        var_dump($_SESSION);
                        var_dump($utilisateurs);
                        }
                        else{
                            echo "<h3>login ou password incorrect</h3>";
                        }
                    }
                }?>
             <!-- if (isset($_POST['login']) && isset($_POST['password'])){

                $password = $_POST['password'];
                // if($login !== "" && $password !== ""){
                    $requete = "SELECT * FROM utilisateurs WHERE login = '$login' AND password = '$password'";
                    $requete2 = mysqli_query($bdd, $requete);
                    $reponse = mysqli_fetch_all($requete2);
                        $_SESSION['login'] = $login;
                        // $_SESSION['nom'] =$reponse['nom'];
                        // $_SESSION['prenom']=$reponse['prenom'];
                        $_SESSION['password']=$reponse['password'];
                    if(password_verify($password, $reponse['password']) || $password == $reponse['password']){
                    
                    exit();
                    }
                    else{
                       
                    }
                // }
             -->
            <form  method="post">
              <label for="login">Login</label>
              <input type="text" id="login" name="login">

              <label for="passeword">Passeword</label>
              <input type="password" id="password" name="password">

              <input type="submit" value="Connexion">
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