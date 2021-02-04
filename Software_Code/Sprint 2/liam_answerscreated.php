<!DOCTYPE html>
<?php
session_start();
include"config.php";


$answerOptionCount = count($_POST['option']);

for($i = 0; $i < $answerOptionCount; $i++){
	$answeroption = $_POST['option'][$i];
	
	try{
		$AnswerInsert = "INSERT INTO Answer (AnswerText, AnswerType, QuestionID)
		VALUES (''$AnswerText', '$AnswerType', '$questionID')";
		$conn->exec($AnswerInsert);
	}

	catch(PDOException $e){
		echo $AnswerInsert . "<br>" . $e->getMessage();
	}
}


if($_SESSION["questionsremaining"]>0){
	?>
	<meta http-equiv="refresh" content="0; URL=liam_questioncreation.php?surveyid=<?php echo $studyID; ?>&questionquantity=<?php echo $questionquantity; ?>"/>	
	<?php
}
else{
	?>
	<meta http-equiv="refresh" content="0; URL=liam_answercreation.php?questiontype=
	<?php echo $questiontype; ?>&questionanswerquantity=<?php echo $questionanswerquantity; ?>"/>
	
	<?php
}
?>


<?php
$conn = null;
?>