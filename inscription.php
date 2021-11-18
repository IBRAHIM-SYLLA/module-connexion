<?php
$bdd = mysqli_connect('localhost','root','','moduleconnexion');
mysqli_set_charset($bdd, 'utf8');
if (isset($_POST['login']) && isset($_POST['prenom']) && isset($_POST['nom']) && isset($_POST['password'])){
    $i = $_POST['login']; 
    $j = $_POST['prenom'];
    $k = $_POST['nom'];
    $l = $_POST['password'];
        if ($l == $_POST['passconf']){
        
            //$select = mysqli_fetch_all("SELECT login FROM utilisateurs");
            if($i !== "SELECT login FROM utilisateurs"){
            $requete = mysqli_query($bdd,"INSERT INTO utilisateurs (login, prenom, nom, password) VALUES ('$i', '$j', '$k', '$l')");
        }
        else {
            echo "login déjà utilisé";
        }
     
        }
   else
   {
       echo '<h3>*Les mot de passes doivent êtres identiques !!!</h3>';
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
        <h1><em>Inscription</em></h1>
            <ul>
                <li><a href="index.php">Accueil</a></li>
                <li><a href="inscription.php">Inscription</a></li>
                <li><a href="connexion.php">Connexion</a></li> 
                <li><a href="">Mon Profil</a></li>
                <li><a href="">Admin</a></li>
            </ul>
        </header>
    <main>
        <div class ="inscription">
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

    </footer>
</body>
</html>