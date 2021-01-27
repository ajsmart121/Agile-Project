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
  <label for="fname">First name:</label><br>
  <input type="text" id="fname" name="fname" value="John"><br>
  <label for="lname">Last name:</label><br>
  <input type="text" id="lname" name="lname" value="Doe"><br><br>
  <input type="submit" value="Submit">
</form> 
</body>
</html>