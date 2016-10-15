<?php

require 'init.php';

$result = array();
$numero = $_POST['numero'];
$pass = $_POST['pass'];


$sql = "SELECT * FROM clientW WHERE num_client = '$numero' ";

$stmt = $db->query($sql);

$result["Error"] = intval("1");


if ($stmt->rowCount() > 0) {

$result["Error"] = intval("1");
	foreach($stmt as $row){

if(password_verify($pass , $row['pass'])) {
    $result["Error"] = intval("0");
} else {
    $result["Error"] = intval("1");
}


}

}


echo json_encode($result);
?>