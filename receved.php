<?php require 'init.php';

/*$json = file_get_contents('php://input');
$_POST = json_decode($json, true);*/
$result["Error"] = intval("1");
$result = array();

if (isset($_POST['nom']) && isset($_POST['prenom'])  && isset($_POST['numero']) && isset($_POST['adresse'] && isset($_POST['p1'] && isset($_POST['p2'] && isset($_POST['p3'] && isset($_POST['attieke']) ) {
	if ($_POST['nom'] !=""  && $_POST['prenom'] !=""  && $_POST['numero'] !="" && $_POST['adresse'] !=""  && $_POST['p1'] !=""  && $_POST['p2'] !=""  && $_POST['p3'] !=""  && $_POST['attieke'] !="" ) {

		$x1 =  $_POST['nom']."".$_POST['numero']."".date(dmY_His);
		$x2 =  $_POST['numero'];
		$x3 =  $_POST['nom'];
		$x4 =  $_POST['prenom'] ;
		$x5 =  $_POST['adresse'];
		$x6 =  date(d-m-Y H:i:s);
		$x7 =  $_POST['nom']."".$_POST['numero'];

		$sql = "INSERT INTO recevedW VALUES( '$x1', '$x2', '$x3', '$x4', '$x5', '$x6','$x7' )";

		$stmt = $db->query($sql);

		if($stmt->rowCount() > 0){
				 if($_POST['p1'] != 0 ){ 
				 	$m = $_POST['p1'];
				 		$sql = "INSERT INTO ligne_cmdW VALUES( $x1, p1 , $m )"; $stmt = $db->query($sql); if($stmt->rowCount() <= 0){ $result["ErrorP"] = intval("021"); }
				 }
				 if($_POST['p2'] != 0 ){ 
				 		$m = $_POST['p2'];
				 		$sql = "INSERT INTO ligne_cmdW VALUES( $x1, p2 , $m )"; $stmt = $db->query($sql); if($stmt->rowCount() <= 0){ $result["ErrorP"] = intval("022"); }
				 }
				 if($_POST['p3'] != 0 ){ 
				 		$m = $_POST['p3'];
				 		$sql = "INSERT INTO ligne_cmdW VALUES( $x1, p3 , $m )"; $stmt = $db->query($sql); if($stmt->rowCount() <= 0){ $result["ErrorP"] = intval("023"); }
				 }
				 if($_POST['attieke'] != 0 ){ 
				 		$m = $_POST['attieke'];
				 		$sql = "INSERT INTO ligne_cmdW VALUES( $x1, p4 , $m )"; $stmt = $db->query($sql); if($stmt->rowCount() <= 0){ $result["ErrorP"] = intval("024"); }
				 }
				 if (isset($result["ErrorP"])) {
				 	$sql = "DELETE INTO ligne_cmdW WHERE id_cmd = '$x1' ";  $stmt = $db->query($sql); if($stmt->rowCount() > 0){ $result["ErrorLigneCmd"] = intval("1"); }
				 }else{	
				 		$sql = "INSERT INTO cmdW VALUES( '$x1', '$x7', '$6', 'actif' )"; $stmt = $db->query($sql); if($stmt->rowCount() <=  0){ $result["ErrorCmd"] = intval("0"); }else{

				 			$sql = "SELECT * FROM clientW WHERE num_client = '$x2' ";	$stmt = $db->query($sql);	if($stmt->rowCount() <= 0) {	
															$hashdef =  password_hash("garba",PASSWORD_BCRYPT,['cost' => 13]) ;
															$sql = "INSERT INTO clientW VALUES( '$x7', '$x2', '$x3', '$x4', '$hashdef', '$x5' )";
															$stmt = $db->query($sql);	if(!$stmt){	$result["ErrorCreaClient"] = intval("1");	}else{	$result["resultCrea"] = " creation ok ";	}
				 			}
				 		}

				 }
	

			}else{
						$sql = "DELETE INTO recevedW WHERE id_cmd = '$x1' ";  $stmt = $db->query($sql); if($stmt->rowCount() > 0){ $result["ErrorD"] = intval("0"); }
			}
	}

}


echo json_encode($result, TRUE);
?>