<?php
try{
     $pdoCV = new PDO('mysql:host=andreebaibamb.mysql.db;dbname=andreebaibamb', 'andreebaibamb', 'Scare1985') or die(print_r($pdoCV->errorInfo()));
     // force la prise en charge de l'utf-8 
     $pdoCV->exec('SET NAMES utf8');
} catch(Exception $e){
     die('Erreur à noter : ' . $e -> getMessage() . $e -> getFile() . $e -> getLine());
}
