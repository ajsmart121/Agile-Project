<!DOCTYPE html>
<html>
<?php 
$study = $_POST["study"];
$username = $_POST["username"];
$password = $_POST["password"];
$hashedPassword = hash("sha256", $password);
echo $hashedPassword;


try{
	$userFind = $conn->prepare("SELECT * FROM user
	WHERE Username = '$username' AND Password = '$hashedPassword'");
	$userFind->execute();
	$userFindResult = $userFind->fetch(PDO::FETCH_OBJ);

	echo $userFindResult->Username;
	echo $userFindResult->Password;

	if($userFindResult->ID!=0){
		?> 
		<script> document.location.href="PaulHome.html"</script>
<?php
	}
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
