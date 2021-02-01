<!DOCTYPE html>
<?php
session_start();
include"config.php";
$_SESSION['userID'] = 61;
$userID = $_SESSION['userID'];

$userAnswerCount = count($_POST['answer']);
$questionIDs = unserialize($_POST['questionIDs']);

for($i = 0; $i < $userAnswerCount; $i++){
	$useranswer = $_POST['answer'][$i];
	$questionid = $questionIDs[$i][1];
	
	try{
		$userAnswerInsert = "INSERT INTO useranswer (QuestionID, UserID, UserAnswerText)
		VALUES ('', '$userID', '$useranswer')";
		echo nl2br("The answer for question with ID ".$questionid." is ".$useranswer.". \r\n ");
		$conn->exec($userAnswerInsert);
	}

	catch(PDOException $e){
	}
}


?>



<?php
$conn = null;
?>