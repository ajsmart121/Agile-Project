<!DOCTYPE html>
<?php
session_start();
include"config.php";
$_SESSION['userID'] = 61;
$userID = $_SESSION['userID'];
print_r( $_POST['answer']);

$userAnswerCount = count($_POST['answer']);


for($i = 0; $i < $userAnswerCount; $i++){
	$useranswer = $_POST['answer'][$i+1];
	$questionid = $_POST['questionID'][$i+1];
	
	try{
		$userAnswerInsert = "INSERT INTO useranswer (QuestionID, UserID, UserAnswerText)
		VALUES ('$questionid', '$userID', '$useranswer')";
		$conn->exec($userAnswerInsert);
	}

	catch(PDOException $e){
	}
}


?>



<?php
$conn = null;
?>