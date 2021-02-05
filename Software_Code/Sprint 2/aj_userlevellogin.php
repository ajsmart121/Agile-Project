<!DOCTYPE html>
  <link rel="stylesheet" type="text/css" href="fergus_login_fixed_font.css"> <!--use the theme CSS-->
<?php
session_start();
include"config.php";
$conn = null;
?>


<html>
<body>
  
  <div class="container">
    <form action="aj_userleveltest.php" method="post">
      <label for="study">Study ID:</label><br>
      <input type="text" id="study" name="study" value="1"><br>
      <label for="username">Username:</label><br>
      <input type="text" id="username" name="username" value="Username"><br>
      <label for="password">Password:</label><br>
      <input type="text" id="password" name="password" value="Password"><br><br>
      <input type="submit" value="Submit">
    </form>
  </div>
</body>
</html>


<!-- Adapted from Liam's login code, adding security !-->
