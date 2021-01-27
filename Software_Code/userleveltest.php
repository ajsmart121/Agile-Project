<!DOCTYPE html>
<?php
session_start();
include"config.php";

$username = $_POST["username"];
$password = $_POST["password"];


$sql = "SELECT * FROM user WHERE Username = '$username' AND Password = '$password' ";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
    echo "User ID: " . $row["ID"]. " - Name: " . $row["Forename"]. " " . $row["Surname"]. "<br>";
  }
} else {
  echo "0 results";
}



?>


<html>
<body>

</body>
</html>

<?php
$conn->close();
?>