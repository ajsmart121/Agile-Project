<!DOCTYPE html>
<?php
session_start();
include"config.php";
?>

<?php
$survey = $_GET['surveyid'];

$questionList = "";
try{
	$QuestionsFind = $conn->prepare("SELECT * FROM Question
	WHERE StudyID = '$survey'");
	$QuestionsFind->execute();
	$QuestionsFindResult = $QuestionsFind->fetchALL();
	
	foreach($QuestionsFindResult as $row) {
		echo = $questionList.$row['QuestionText']."\n";
	}
}
catch(PDOException $e){
	echo "Error: " . $e->getMessage();
}	



?>

<?php
$conn = null;
?>