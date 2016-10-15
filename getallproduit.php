<?php require 'init.php';
/*
$json = file_get_contents('php://input');
$post = json_decode($json, true);*/

$result = array();


$sql = " SELECT * FROM produitW ";

$stmt = $db->query($sql);
$result["Error"] = intval("1");

$result["produitW"] =  array();

if ($stmt->rowCount() >= 0) {
$result["Error"] = intval("4");
	foreach($stmt as $row){
	$produitW = array();
	$produitW['id_produit'] = $row['id_produit'];
	$produitW['nom_produit'] = $row['nom_produit'];
	$produitW['prix'] = $row['prix_produit'];
	array_push($result["produitW"], $produitW);
}

$result["Error"] = intval("0");
}


echo json_encode($result);
?>