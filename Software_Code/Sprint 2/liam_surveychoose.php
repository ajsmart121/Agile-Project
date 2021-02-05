<!DOCTYPE html>
<?php
session_start();
include"config.php";
?>


<html>
<body>
<form  action="liam_survey.php" method="post">
  <label for="studyID">Please enter the ID of the study you wish to view:</label><br>
  <input type="text" id="studyID" name="studyID" value=""><br>
  <input type="submit" value="Submit">
</form> 
</body>
</html>

<?php
$conn = null;
?>