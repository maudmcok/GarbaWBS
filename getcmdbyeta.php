<?php require 'init.php';
/*
$json = file_get_contents('php://input');
$post = json_decode($json, true);*/

$result = array();

$result["Error"] = intval("1");

if (isset($_POST['eta_cmd'])) {
$eta_cmd= $_POST['eta_cmd'] ;


$sql = "SELECT * FROM cmdW , clientW WHERE cmdW.id_client = clientW.id_client AND cmdW.eta_cmdeta_cmd = '$eta_cmd' ";

$stmt = $db->query($sql);
$result["Error"] = intval("1");
$result["cmdW"] =  array();

if ($stmt->rowCount() > 0) {

	foreach($stmt as $row){
	$cmdW = array();
	$cmdW['id_cmd'] = $row['cmdW.id_cmd'];
	$cmdW['id_client'] = $row['cmdW.id_client'];
	$cmdW['nom'] = $row['clientW.nom_client'];
	$cmdW['prenom'] = $row['clientW.prenom_client'];
	$cmdW['numero'] = $row['clientW.num_client'];
	$cmdW['adresse'] = $row['clientW.adresse_livraison'];
	$cmdW['date_cmd'] = $row['cmdW.date_cmd'];
	$cmdW['total_prix'] = $row['cmdW.total_prix'];
	$cmdW['eta_cmd'] = $row['cmdW.eta_cmd'];

	array_push($result["cmdW"], $cmdW);
}

$result["Error"] = intval("0");
}
}


echo json_encode($result, TRUE);