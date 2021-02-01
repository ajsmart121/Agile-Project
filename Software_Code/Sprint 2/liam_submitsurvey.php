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
		VALUES ('$questionid', '$userID', '$useranswer')";
		$conn->exec($userAnswerInsert);
		echo "Answer ".$useranswer. "successfully added as user ".$userID."'s response to question ".$questionid."!";
	}

	catch(PDOException $e){
	}
}


?>



<?php
$conn = null;
?>