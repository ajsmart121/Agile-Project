<!DOCTYPE html>
<?php
session_start();
include"config.php";
?>

<?php
$survey = $_GET['surveyid'];
$questionList = "";
try{
	$QuestionsFind = $conn->prepare("SELECT QuestionText, ID FROM Question
	WHERE StudyID = '$survey'");
	$QuestionsFind->execute();
	$QuestionsFindResult = $QuestionsFind->fetchALL();
	$questionCount = count($QuestionsFindResult);

}
catch(PDOException $e){
	echo "Error: " . $e->getMessage();
}

?>
<html>
<body>

<form action="submitsurvey.php" method="post">
	<?php

	for($i = 0; $i < $questionCount; $i++){
		?>
		<label for="answer[<?php $i+1 ?>]"> <?php echo $QuestionsFindResult[$i][0]; ?> </label><br>
		<input type="text" id="answer[<?php $i+1 ?>]" name="answer[<?php $i+1 ?>]" value=""><br>
		<input type="hidden" name="questionID" value=<?php echo $QuestionsFindResult[$i][1]; ?> readonly>
	<?php
	}
	?>
	<!-- ethics text-->
	<label for="ethicscheck">I Have read and understood the above disclosure and consent to my data being collected and used for this questionnaire.</label>
	<input type="checkbox" id="ethicscheck" name="ethicscheck" required>
	<input type="submit" value="Submit">
</form>

</body>
</html>


<?php
$conn = null;
?>
