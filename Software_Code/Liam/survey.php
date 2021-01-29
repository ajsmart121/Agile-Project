<!DOCTYPE html>
<?php
session_start();
include"config.php";
?>

<?php
$survey = $_GET['surveyid'];

$questionList = "";
try{
	$QuestionsFind = $conn->prepare("SELECT QuestionText FROM Question
	WHERE StudyID = '$survey'");
	$QuestionsFind->execute();
	$QuestionsFindResult = $QuestionsFind->fetchALL();
	
	}
	catch(PDOException $e){
		echo "Error: " . $e->getMessage();
	}
	
	$questionCount= count(QuestionsFindResult);
	echo $questionCount;
	echo $QuestionsFindResult[0][0];



?>

<?php
$conn = null;
?>