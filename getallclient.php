<?php require 'init.php';

$json = file_get_contents('php://input');
$post = json_decode($json, true);

$result = array();


$sql = "SELECT * FROM clientW";

$stmt = $db->query($sql);
$result["Error"] = intval("1");
$result["clientW"] =  array();

if ($stmt->rowCount() > 0) {

	foreach($stmt as $row){
	$clientW = array();
	$clientW['id_client'] = $row['id_client'];
	$clientW['num_client'] = $row['num_client'];
	$clientW['nom_client'] = $row['nom_client'];
	$clientW['prenom_client'] = $row['prenom_client'];
	$clientW['password'] = $row['password'];
	$clientW['adresse_livraison'] = $row['adresse_livraison'];
	array_push($result["clientW"], $clientW);
}

$result["Error"] = intval("0");
}
if ($stmt->rowCount() == 0) { $result["Entry"] = intval("0");}


echo json_encode($result, TRUE);
?>