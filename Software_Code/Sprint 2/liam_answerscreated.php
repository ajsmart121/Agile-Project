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
		$AnswerInsert = "INSERT INTO Answer (AnswerText, AnswerType, QuestionID)
		VALUES ('0', '$questiontype', '$questionID')";
		$conn->exec($AnswerInsert);
	}

	catch(PDOException $e){
		echo $AnswerInsert . "<br>" . $e->getMessage();
	}
}

if($_SESSION["questionsremaining"]>0){
	?>
	<meta http-equiv="refresh" content="0; URL=liam_questioncreation.php"/>	
	<?php
}
else{
	unset($_SESSION['questionsremaining']);
	unset($_SESSION['type']);
	unset($_SESSION['studyID']);
	unset($_SESSION['question']);
	echo "Questions submitted!";
	?>
	<meta http-equiv="refresh" content="0; URL=liam_survey.php?surveyid=<?php echo $studyID; ?>"/>
	<?php
}
?>


<?php
$conn = null;
?>