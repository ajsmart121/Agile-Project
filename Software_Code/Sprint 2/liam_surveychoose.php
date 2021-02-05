<!DOCTYPE html>
<?php
session_start();
include"config.php";
$userID = $_SESSION['user'];
?>


<html>
<body>
<?php
echo "You are logged in as ".$_SESSION['user'];
?>

<form  action="stewart_surveyethics.php" method="get">
  <label for="studyID">Please enter the ID of the study you wish to view:</label><br>
  <input type="text" id="studyID" name="studyID" value=""><br>
  <input type="submit" value="Submit">
</form> 
</body>
</html>

<?php
$conn = null;
?>