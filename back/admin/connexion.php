<?php

// Connexion à la BDD :
// echo '<h3> 01- Connexion à la BDD </h3>';

$host='localhost'; // Le chemin vers le serveur de données
$database='andree_portfolio'; // Le nom de la base de données
$user='root';   // le nom de l'utilisateur pour se connecter
$password=''; // Le mot de passe de l'utilisateur local (sur PC)


$pdoCV = new PDO('mysql:host='.$host.';dbname='.$database,$user,$password);
// $pdoCV est le nom de la variable pour la connexion à la BDD qui nous sert partout où l'on doit se servir de cette connexion
$pdoCV->exec('SET NAMES utf8');

?>