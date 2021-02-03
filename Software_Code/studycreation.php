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

  <label for="email">Study Creator Email:</label><br>
  <input type="text" id="email" name="email" required placeholder="Example@example.example"><br>

  <label for="studyname">Study Name:</label><br>
  <input type="text" id="studyname" name="studyname"><br>

  <label for="ethicscode">Ethics Approval Code:</label><br>
  <input type="text" id="ethicscode" name="ethicscode" placeholder="ABC-123-DEF" required pattern="[A-Za-z]{3}+-+\[A-Za-z]{3}+-+\[0-9]{3}" title="ABC-123-DEF"><br>

  <label for="ethicscode">Ethics Link:</label><br>
  <input type="text" id="ethicslink" name="ethicslink" placeholder="Link to approved ethics form" required><br>

  <label for="questionquantity">Number of Questions:</label><br>
  <input type="text" id="questionquantity" name="questionquantity" value="3"><br><br>

  <label for="ethicssubmitted">Ethics Sheet Submitted: <label><br>
  <input type="checkbox" id="ethicssubmitted" name="ethicssubmitted" value="Submitted" required><br>

  <label for="ethicsapproval">Ethics Sheet Approved: <label><br>
  <input type="checkbox" id="ethicsapproval" name="ethicsapproval" value="Approved" required><br><br>
  <!--made approval disabled and use db to approve to checked state?-->

  <label for="ethicsdis">Ethics Disclosure Text:</label><br>
  <input type="text" id="ethicsdis" name="ethicsdis" placeholder="Disclosure Text Here." required><br>

  <input type="submit" value="Submit">
</form>
</body>
</html>

<?php
$conn = null;
?>
