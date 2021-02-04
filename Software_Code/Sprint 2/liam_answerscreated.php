<!DOCTYPE html>
<?php
session_start();
include"config.php";

$questionID = $_SESSION['question'];
$questiontype = $_SESSION['type'];
$studyID = $_SESSION['studyID'];
$answertext = $_POST['answertext'];


$answerOptionCount = count($_POST['option']);

for($i = 0; $i < $answerOptionCount; $i++){
	$answeroption = $_POST['option'][$i];
	
	try{
		$AnswerInsert = "INSERT INTO Answer (AnswerText, AnswerType, QuestionID)
		VALUES (''$AnswerText', '$questiontype', '$questionID')";
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
	unset($_SESSION["questionsremaining"]);
	echo "Questions submitted!";
	?>
	<a href="liam_survey.php?surveyid=<?php echo $studyID; ?>">Survey Link</a>
	<?php
}
?>


<?php
$conn = null;
?>