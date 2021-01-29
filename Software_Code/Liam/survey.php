<!DOCTYPE html>
<?php
session_start();
include"config.php";
?>

<?php
$survey = $_GET['surveyid'];

$questionList = "";
try{
	$QuestionsFind = $conn->prepare("SELECT QuestionText FROM Question
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
		<label for="question <?php $i+1 ?> "> <?php echo $QuestionsFindResult[$i][0]; ?> </label><br>
		<input type="text" id="question <?php $i+1 ?> " name="question <?php $i+1 ?> " value=""><br>
	<?php
	}
	?>
	<input type="submit" value="Submit">
</form> 

</body>
</html>


<?php
$conn = null;
?>