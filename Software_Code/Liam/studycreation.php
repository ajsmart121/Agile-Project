<!DOCTYPE html>
<?php
session_start();
include"config.php";
?>


<html>
<body>
<form action="questioncreation.php" method="post">
  
  <label for="studycreator">Study Creator ID:</label><br>
  <input type="text" id="studycreator" name="studycreator" value="11"><br>
  
  <label for="studyname">Study Name:</label><br>
  <input type="text" id="studyname" name="studyname"><br>
  
  <label for="questionquantity">Number of Questions:</label><br>
  <input type="text" id="questionquantity" name="questionquantity" value="1"><br>
  
  <input type="submit" value="Submit">
</form> 
</body>
</html>

<?php
$conn = null;
?>