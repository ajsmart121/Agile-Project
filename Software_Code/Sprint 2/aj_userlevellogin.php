<!DOCTYPE html>
<?php
session_start();
include"config.php";
$conn = null;
?>


<html>
<body>
<form action="liam_userleveltest.php" method="post">
  <label for="study">Study ID:</label><br>
  <input type="text" id="study" name="study" value="1"><br>
  <label for="username">Username:</label><br>
  <input type="text" id="username" name="username" value="Liam"><br>
  <label for="password">Password:</label><br>
  <input type="text" id="password" name="password" value="Password"><br><br>
  <?php $password==hash("sha256", $password)
  echo($password) ?>
  <input type="submit" value="Submit">
</form>
</body>
</html>


<!-- Adapted from Liam's login code, adding security !-->
