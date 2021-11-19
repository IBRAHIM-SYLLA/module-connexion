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
        var_dump($requete2);
        $reponse = $bdd->query($requete2);
        var_dump($user);
        var_dump($reponse);
        $_SESSION['login'] = $_POST['login'];
        header('Location: index.php');
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<div class ="inscription">
            <form action="profil.php" method="post">
              <label for="login">Login</label>
              <input type="text" id="login" name="login" value="<?php echo $_SESSION['login']; ?>">

              <label for="prenom">Prenom</label>
              <input type="text" id="prenom" name="prenom" value="<?php echo $_SESSION['prenom'];?>">

              <label for="nom">Nom</label>
              <input type="text" id="nom" name="nom" value="<?php echo $_SESSION['nom'];?>">

              <label for="password">password</label>
              <input type="password" id="password" name="password" value="<?php echo $_SESSION['password'];?>">

              <label for="passconf">passeword confirmation</label>
              <input type="password" id="passconf" name="passconf">

              <input type="submit" name='submitProfil' value="mettre a jour">
            </form>
</body>
</html>