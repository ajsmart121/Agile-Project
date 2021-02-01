<!DOCTYPE html>
<?php
session_start();
include"config.php";
?>

<html>
<body>

<form action method="post">
	This form will allow you to see a particular user's response to a particular survey.
	<label for="surveyID">Question Text:</label><br>
	<input type="text" id="surveyID" name="surveyID" value="Please enter the ID of the survey:"><br>
	<label for="surveyUser">Question Text:</label><br>
	<input type="text" id="surveyUser" name="surveyUser" value="IPlease enter the ID of the user:"><br>
	<input type="submit" value="Submit">
</form> 

</body>
</html>


<?php
$conn = null;
?>