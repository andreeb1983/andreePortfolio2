<?php require 'admin/connexion.php';

session_start(); // à mettre dans toutes les pages de l'admin

// traitement pour la connexion à l'admin
if(isset($_POST['connexion'])){
    $email = addslashes($_POST['email']);
    $password = addslashes($_POST['password']);

    $sql = $pdoCV -> prepare (" SELECT * FROM t_users WHERE email='$email' AND password='$password'");
    // on vérifie l'email et le password
    $sql -> execute();
    $nbr_user = $sql -> rowCount(); // on compte si il est dans la BDD; le compte répond 0 si il n'y est pas et répond 1 si il y est

    if($nbr_user == 0){
        echo '<p>Erreur !</p>'; // il n'y est pas
    } else {
       // echo $nbr_user; // il y est
       $line_user = $sql -> fetch();
       $_SESSION['connexion_admin'] = 'connecté'; // connexion à l'admin

       $_SESSION['email'] = $line_user['email'];
       $_SESSION['firstname'] = $line_user['firstname'];
       $_SESSION['password'] = $line_user['password'];

       //echo $line_user['firstname'];
       header('location:../back/admin/index_admin.html');
    }
}

?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Admin : authentification</title>
</head>
<body>
    <form action="authentification.php" method="post">
    <h1>Admin : authentification</h1>
    <label for="email">Votre email</label>
    <input type="email" name="email" placeholder="beta@mail.com" required>

    <label for="password">Mot de passe</label>
    <input type="password" name="password" placeholder="...." required>
    <button name="connexion" type="submit">Se connecter</button>
    </form>
    
    
</body>
</html>