<!DOCTYPE html>
<?php
session_start();
include"config.php";

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

$conn = null;
?>


<html>
<body>
<form action="userleveltest.php" method="post">
  <label for="username">Username:</label><br>
  <input type="text" id="username" name="username" value="Liam"><br>
  <label for="lname">Password:</label><br>
  <input type="text" id="password" name="password" value="Password"><br><br>
  <input type="submit" value="Submit">
</form> 
</body>
</html>