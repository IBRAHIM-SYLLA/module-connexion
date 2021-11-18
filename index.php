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
            <li><a href="inscription.php">Inscription</a></li>
            <li><a href="connexion.php">Connexion</a></li>
            <li><a href="">Mon Profil</a></li>
            <li><a href="">Admin</a></li>
          </ul>
    </header>
    <main>
        <?php 
                    session_start();
                    if(isset($_POST['deconnexion']))
                    { 
                        session_unset();
                        header("location:connexion.php");
                    }
                    else if($_SESSION['login'] !== ""){
                        $user = $_SESSION['login'];
                        echo "<br>Bonjour $user, vous êtes connectés".'<br>';
                    }
    
        ?>
        <form action="" method="post">
            <input class="index" type="submit" value="deconnexion" name = "deconnexion">
        </form>
    </main>

    <footer>

    </footer>
</body>
</html>