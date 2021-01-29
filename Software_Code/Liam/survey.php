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
	
	foreach($QuestionsFindResult as $column) {
		$questionList = $questionList.$column['QuestionText']."\n";
		
	}
	echo $questionList;
	}
	catch(PDOException $e){
		echo "Error: " . $e->getMessage();
	}	



?>

<?php
$conn = null;
?>