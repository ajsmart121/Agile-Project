<!DOCTYPE html>
<?php
session_start();
include"config.php";
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