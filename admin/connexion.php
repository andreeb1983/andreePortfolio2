<?php 
/* Ce fichier sera inclus dans TOUS les scripts (hors inc eux mêmes) pour initialiser les éléments suivants :
- connexion à la BDD
- créer ou ouvrir une session
- définir le chemin absolu du site (comme dans wordpress)
- inclure le fichier fonctions.inc.php à la fin de ce fichier pour l'embarquer dans tous les scripts.
*/

// connexion à la BDD

// $host = 'localhost';  // chemin vers le serveur de données
// $database = 'lyly_portfolio';  // nom de la base de données
// $user = 'root';  // nom d'utilisateur pour se connecter
// $psw = '';  // mot de passe de l'utilisateur local (sur PC) 'root' sur les macs

// $pdoCV = new PDO('mysql:host='.$host.';dbname='.$database,$user,$psw);   
// //$pdoCV est le nom de la variable pour la connexion à la BDD qui nous sert partout où l'on doit se servir de cette connexion
// $pdoCV->exec("SET NAMES utf8");

$pdoCV = new PDO('mysql:host=localhost;dbname=andree_portfolio',  
'root',  
'',  
array(PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING, 
      PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8')
);

// créer ou ouvrir une session
session_start();


// définir le chemin absolu du site (comme dans wordpress)
define('RACINE_SITE', '/andreePortfolio2/');  // cette constante servira a créer les chemins absolus utilisés dans haut.inc.php car ce fichier sera inclus dans des scripts qui se situent dans des dossiers différents du site. On ne peut donc pas faire de chemin relatif dans ce fichier.

// Variables d'affichage :
$contenu = '';

// inclusion du fichier fonction.inc.php :
require_once ('fonctions.inc.php');
?>