$study = $_POST["study"];
$username = $_POST["username"];
$password = password_hash($password, "sha256");
$hashedPassword = $_POST[$hashedPassword];
echo $hashedPassword;
$password = $_POST[$password];


try{
	$userFind = $conn->prepare("SELECT * FROM user
	WHERE Username = '$username' AND Password = '$hashedPassword'");
	WHERE Username = '$username' AND Password = '$password'");
	$userFind->execute();
	$userFindResult = $userFind->fetch(PDO::FETCH_OBJ);

	echo $userFindResult->Username;
	echo $userFindResult->Password;
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
