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
	
	
	$languagestmt = $conn->prepare ("SELECT QuestionText FROM Question
	WHERE StudyID = '$survey'");

	
	$lrow = $languagestmt->fetchAll(PDO::FETCH_COLUMN || PDO::FETCH_GROUP, 0);

	
	echo $lrow[1];

	}
	catch(PDOException $e){
		echo "Error: " . $e->getMessage();
	}	



?>

<?php
$conn = null;
?>