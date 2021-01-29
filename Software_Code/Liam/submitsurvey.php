<!DOCTYPE html>
<?php
session_start();
include"config.php";

print_r( $_POST['question']);
echo $_POST['question'][1];
?>



<?php
$conn = null;
?>