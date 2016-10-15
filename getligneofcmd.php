<?php require 'init.php';
/*
$json = file_get_contents('php://input');
$post = json_decode($json, true);*/

$result = array();
$result["Error"] = intval("1");

if (isset($_POST['cmdW'])) {
$cmd= $_POST['cmdW'] ;
$sql = "SELECT * FROM cmdW WHERE id_cmd ='$cmd' ";
$stmt = $db->query($sql);
 $resq = $stmt->fetch();
if ($resq) {

$sql = "SELECT * FROM ligne_cmdW, produitW WHERE ligne_cmdW.id_produit = produitW.id_produit AND ligne_cmdW.id_cmd = '$cmd'";

$stmt = $db->query($sql);
$result["Error"] = intval("1");
$result["ligne_cmdW"] =  array();

if ($stmt->rowCount() > 0) {

	foreach($stmt as $row){
	$ligne_cmdW = array();
	$ligne_cmdW['id_produit'] = $row['produitW.id_produit'];
	$ligne_cmdW['nom_produit'] = $row['produitW.nom_produit'];
	$ligne_cmdW['quantiter'] = $row['ligne_cmdW.quantite_produit'];
	$ligne_cmdW['prix'] = $row['produitW.prix_produit'];
	$ligne_cmdW['prix_total'] = (int)$ligne_cmdW['prix'] * (int)$ligne_cmdW['quantiter'] ;
	array_push($result["ligne_cmdW"], $ligne_cmdW);
}

$result["Error"] = intval("0");
}
	
	}
}
echo json_encode($result, TRUE);
?>