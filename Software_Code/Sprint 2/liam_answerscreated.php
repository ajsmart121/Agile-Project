<!DOCTYPE html>
<?php
session_start();
include"config.php";

//Brings in $_SESSION variables to hold a few things we need across various pages
$questionID = $_SESSION['question'];
$questiontype = $_SESSION['type'];
$studyID = $_SESSION['studyID'];

$answerOptionCount = count($_POST['answertext']);

//This for loop is used for inserting the answers for the current question
for($i = 0; $i < $answerOptionCount; $i++){
	$answertext = $_POST['answertext'][$i];
	
	try{
		$AnswerInsert = "INSERT INTO Answer (AnswerText, QuestionID)
		VALUES ('$answertext', '$questionID')";
		$conn->exec($AnswerInsert);
	}

	catch(PDOException $e){
		echo $AnswerInsert . "<br>" . $e->getMessage();
	}
}

//WE then check if there are more questions to be created, if so we go back the creation page, and if not we go to the survey page
if($_SESSION["questionsremaining"]>0){
	?>
	<script> document.location.href="liam_questioncreation.php" </script>
	<?php
}
else{
	unset($_SESSION['questionsremaining']);
	unset($_SESSION['type']);
	unset($_SESSION['studyID']);
	unset($_SESSION['question']);
	header('Location: liam_survey.php?studyID='.$studyID);
	exit;
}
?>


<?php
$conn = null;
?>
