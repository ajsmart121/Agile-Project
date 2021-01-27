<!DOCTYPE html>
<?php
session_start();
include"config.php";

$study = $_POST["study"];
$username = $_POST["username"];
$password = $_POST["password"];


try{
	$userFind = $conn->prepare("SELECT * FROM ul.user
	WHERE ul.Username = '$username' AND ul.Password = '$password'");
	$userFind->execute();
	$userFindResult = $userFind->fetch(PDO::FETCH_OBJ);
	
	echo $userFindResult->Username;
}

catch(PDOException $e){
	echo $userFind . "<br>" . $e->getMessage();
}

	echo $userFindResult->Password;
?>


<html>
<body>

</body>
</html>

<?php
$conn = null;
?>