<!DOCTYPE html>
<?php
session_start();
include"config.php";

$questionID = $_SESSION['question'];
$questiontype = $_SESSION['type'];
$studyID = $_SESSION['studyID'];

$answerOptionCount = count($_POST['answertext']);

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

if($_SESSION["questionsremaining"]>0){
	?>
	<script> document.location.href="liam_questioncreation" </script>
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