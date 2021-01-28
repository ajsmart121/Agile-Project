<?php
session_start();
include"config.php";

$studycreator = $_POST["studycreator"];
$studyname = $_POST["studyname"];
$questionquantity = $_POST["questionquantity"];

try{
	$userFind = $conn->prepare("SELECT * FROM user");
	$userFind->execute();
	$userFindResult = $userFind->fetch(PDO::FETCH_OBJ);
	
	echo $userFindResult->Username;
	echo $userFindResult->Password;
}

catch(PDOException $e){
	echo $userFind . "<br>" . $e->getMessage();
}

$conn = null;
?>