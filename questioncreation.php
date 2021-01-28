<?php
session_start();
include"config.php";

$studycreator = $_POST["studycreator"];
$studyname = $_POST["studyname"];
$questionquantity = $_POST["questionquantity"];

try{
	$userFind = $conn->prepare("SELECT * FROM study");
	$userFind->execute();
	$userFindResult = $userFind->fetch(PDO::FETCH_OBJ);
}

catch(PDOException $e){
	echo $userFind . "<br>" . $e->getMessage();
}
	
$conn = null;
?>