<?php 

global $db;

try {
/*	$user = 'roote';
	$pass = 'root';
    $db = new PDO('mysql:host=localhost;dbname=autobusco', $user, $pass);
*/
    $user = 'diguiweb_root';
	$pass = 'bakaroot0@';
    $db = new PDO('mysql:host=localhost;dbname=diguiweb_shoot', $user, $pass);
} catch (PDOException $e) {
    print "Erreur !: " . $e->getMessage() . "<br/>";
    die();
}

function chargerClasse($classe)
{
  require $classe . '.php'; // On inclut la classe correspondante au paramètre passé.
}



?>