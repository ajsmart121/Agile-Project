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
  <input type="text" id="questionquantity" name="questionquantity" value="3"><br><br>

  <label for="ethicssubmitted">Ethics Sheet Submitted: <label><br>
  <input type="checkbox" id="ethicssubmitted" name="ethicssubmitted" value="Submitted" required><br>

  <label for="ethicsapproval">Ethics Sheet Approved: <label><br>
  <input type="checkbox" id="ethicsapproval" name="ethicsapproval" value="Approved" required><br><br>
  <!--made approval disabled and use db to approve to checked state?-->

  <input type="submit" value="Submit">
</form>
</body>
</html>

<?php
$conn = null;
?>
