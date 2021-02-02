<!DOCTYPE html>
<?php
session_start();
include"config.php";

if(isset($_GET["surveyID"])){
	$surveyID = $_GET["surveyID"];
	echo "Survey ID: ".$surveyID;
}
if(isset($_GET["userID"])){
	$userID = $_GET["userID"];
	echo "User ID: ".$userID;
}

?>

<html>
<body>

<form action method="get">
	This form will allow you to see a particular user's response to a particular survey.
	<br>
	<br>
	<label for="surveyID">Please enter the ID of the survey:</label><br>
	<input type="text" id="surveyID" name="surveyID" value=""><br>
	<label for="surveyUser">Please enter the ID of the user::</label><br>
	<input type="text" id="userID" name="userID" value=""><br>
	<input type="submit" value="Submit">
</form> 

</body>
</html>


<?php
$conn = null;
?>