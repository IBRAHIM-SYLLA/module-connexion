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
</body>
</html>