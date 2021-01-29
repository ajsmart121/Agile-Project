<!DOCTYPE html>
<?php
session_start();
include"config.php";
?>

<?php
$survey = $GET['surveyid'];
echo $survey;
?>

<?php
$conn = null;
?>