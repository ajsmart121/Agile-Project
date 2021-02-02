<!DOCTYPE html>
<?php
session_start();
include"config.php";
$_SESSION['userID'] = 61;
$userID = $_SESSION['userID'];
$questions = $_SESSION['questions'];

$userAnswerCount = count($_POST['answer']);


for($i = 0; $i < $userAnswerCount; $i++){
	$useranswer = $_POST['answer'][$i];
	$questionid = $questions[$i][1];
	$studyID = $questions[$i][2];
	
	try{
		$userAnswerInsert = "INSERT INTO useranswer (QuestionID, UserID, UserAnswerText, StudyID)
		VALUES ('$questionid', '$userID', '$useranswer', '$studyID')";
		//echo nl2br("The answer for question with ID ".$questionid." is ".$useranswer.". \r\n ");
		$conn->exec($userAnswerInsert);
	}

	catch(PDOException $e){
	}
}



?>



<?php
$conn = null;
?>