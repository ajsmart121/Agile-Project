<!DOCTYPE html>
<?php
session_start();
include"config.php";
?>

<?php
$survey = $_GET['surveyid'];
echo $survey;
?>

<?php
$conn = null;
?>