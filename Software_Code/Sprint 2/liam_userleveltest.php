<!DOCTYPE html>
<?php
session_start();
include"config.php";

$study = $_POST["study"];
$username = $_POST["username"];
$password = password_hash($password, "sha256");
//$password = $_POST[$password];

echo $username;
echo "\n";
echo $password;


try{
	$userFind = $conn->prepare("SELECT * FROM user
	WHERE Username = '$username' AND Password = '$password'");
	$userFind->execute();
	$userFindResult = $userFind->fetch(PDO::FETCH_OBJ);

	//echo $userFindResult->Username;
	//echo $userFindResult->Password;
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
