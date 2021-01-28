<!DOCTYPE html>
<?php
session_start();
include"config.php";

$studycreator = $_POST["studycreator"];
$studyname = $_POST["studyname"];
$questionquantity = $_POST["questionquantity"];




try{
	$studyInsert = "INSERT INTO Study (UserID)
	VALUES ('$studycreator')";
	$conn->exec($studyInsert);
}

catch(PDOException $e){
	echo $studyInsert . "<br>" . $e->getMessage();
	}
}
$conn = null;
?>