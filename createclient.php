<?php 

require 'init.php';

$result["Error"] = intval("0");
$result = array();


if (isset($_POST['nom']) && isset($_POST['prenom']) && isset($_POST['pass']) && isset($_POST['numero']) && isset($_POST['adresse']) ) {
	if ($_POST['nom'] !=""  && $_POST['prenom'] !="" && $_POST['pass'] !="" && $_POST['numero'] !="" && $_POST['adresse'] !="" ) {



		$x1 =  $_POST['nom']."".$_POST['numero'];
		$x2 =  $_POST['nom'];
		$x3 =  $_POST['prenom'];
		$x4 =  password_hash($_POST['pass'],PASSWORD_BCRYPT,['cost' => 13]) ;
		$x5 =  $_POST['numero'];
		$x6 =  $_POST['adresse'];


		$sql = "INSERT INTO clientW VALUES( '$x1', '$x5', '$x2', '$x3', '$x4', '$x6' )";
		$stmt = $db->query($sql);

		
		if(!$stmt){
				$result["Error"] = intval("1");
			}else{
				$result["result"] = "ok";
			}
	

}
}


echo json_encode($result);

?>