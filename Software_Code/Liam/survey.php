<!DOCTYPE html>
<?php
session_start();
include"config.php";
?>

<?php
$survey = $GET['surveyID'];
echo $survey;
?>

<?php
$conn = null;
?>