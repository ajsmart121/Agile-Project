<?php
session_start();
include"config.php";

$sql = "SELECT ID, Forename, Surname, Email, UserLevelID FROM user";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
    echo "User ID: " . $row["ID"]. " - Name: " . $row["Forename"]. " " . $row["Surname"]. "<br>";
  }
} else {
  echo "0 results";
}
$conn->close();
?>

<!DOCTYPE html>
<html>
<body>
<form action="/action_page.php">
  <label for="username">Username:</label><br>
  <input type="text" id="username" name="username" value="Liam"><br>
  <label for="lname">Password:</label><br>
  <input type="text" id="password" name="password" value="McKenzie"><br><br>
  <input type="submit" value="Submit">
</form> 
</body>
</html>