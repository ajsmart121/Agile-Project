<!DOCTYPE html>
<?php
session_start();
include"config.php";
?>

<?php
$survey = $_GET['surveyid'];
echo $survey;


try{
	$QuestionsFind = $conn->prepare("SELECT * FROM Question
	WHERE StudyID = '$survey'");
	$QuestionsFind->execute();
	$QuestionsFindResult = $QuestionsFind->fetch(PDO::FETCH_All);
	
	foreach($QuestionsFindResult as $row) {
		$studyList = $studyList.$row['QuestionText']."\n";
	}
}
catch(PDOException $e){
	echo "Error: " . $e->getMessage();
}	



?>

<?php
$conn = null;
?>