<!DOCTYPE html>
<?php
session_start();
include"config.php";

$username = $_POST["username"];
$password = $_POST["password"];


try{
	$userFind = $conn->prepare("SELECT * FROM user
	WHERE Username = '$username' AND Password = '$password'");
	$userFind->execute();
	$userFindResult = $userFind->fetch(PDO::FETCH_OBJ);
	
	echo $userFindResult->Username;
}

catch(PDOException $e){
	echo $userFind . "<br>" . $e->getMessage();
}

?>


<html>
<body>

</body>
</html>

<?php
$conn = null;
?>