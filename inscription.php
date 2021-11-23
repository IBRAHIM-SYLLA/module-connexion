<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="accueil connexion.css">
    <title>Inscription</title>
</head>
<body>
        <header>
        <h1><em>Inscription</em></h1>
            <ul>
                <li><a href="index.php">Accueil</a></li>
                <li><a href="inscription.php">Inscription</a></li>
                <li><a href="connexion.php">Connexion</a></li>
            </ul>
        </header>
    <main>
        <div class ="inscription">
        <?php
            $bdd = mysqli_connect('localhost','root','','moduleconnexion');
            mysqli_set_charset($bdd, 'utf8');
            if (isset($_POST['login']) && isset($_POST['prenom']) && isset($_POST['nom']) && isset($_POST['password'])){
                $i = $_POST['login'];
                $j = $_POST['prenom'];
                $k = $_POST['nom'];
                $l = $_POST['password'];
                    if ($l == $_POST['passconf']){
                        $veriflogin = mysqli_query($bdd,"SELECT login FROM utilisateurs WHERE login = '$i'");
                        $resultat = mysqli_fetch_all($veriflogin);
                            if(count($resultat) == 0){
                                $l = password_hash($l, PASSWORD_BCRYPT);
                                $requete = mysqli_query($bdd,"INSERT INTO utilisateurs (login, prenom, nom, password) VALUES ('$i', '$j', '$k', '$l')");
                                header('Location: connexion.php');
                            }
                        else {
                            echo "Login déjà utilisé !!!";
                        }
                    }
                    else
                    {
                        echo '<h3>*Les mot de passes doivent êtres identiques !!!</h3>';
                    }
            }
        ?>
            <form action="inscription.php" method="post">
              <label for="login">Login</label>
              <input type="text" id="login" name="login">

              <label for="prenom">Prenom</label>
              <input type="text" id="prenom" name="prenom">

              <label for="nom">Nom</label>
              <input type="text" id="nom" name="nom">

              <label for="password">password</label>
              <input type="password" id="password" name="password">

              <label for="passconf">passeword confirmation</label>
              <input type="password" id="passconf" name="passconf">

              <input type="submit" value="inscription">
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