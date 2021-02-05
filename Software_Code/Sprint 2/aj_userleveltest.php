<!DOCTYPE html>
<html>
<?php
session_start();
include"config.php";

$study = $_POST["study"];
$username = $_POST["username"];
$password = $_POST["password"];
$password = hash("sha256", $password);



try{
	$userFind = $conn->prepare("SELECT * FROM user
	WHERE Username = '$username' AND Password = '$password'");
	$userFind->execute();
	$userFindResult = $userFind->fetch(PDO::FETCH_OBJ);

	echo $userFindResult->Username;
	echo $userFindResult->Password;
	$_SESSION['user'] = $userFindResult->ID;
	
	?> <script> document.location.href="PaulHome.html" </script> <?php
}

catch(PDOException $e){
	echo $userFind . "<br>" . $e->getMessage();
}
?>
<body>
</body>
</html>
<?php
$conn = null;
?>
