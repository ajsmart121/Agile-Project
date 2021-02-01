<!DOCTYPE html>
<?php
session_start();
include"config.php";
?>

<?php
$survey = $_GET['surveyid'];
$questionList = "";

try{
	$QuestionTextFind = $conn->prepare("SELECT QuestionText FROM Question
	WHERE StudyID = '$survey'");
	$QuestionTextFind->execute();
	$QuestionTextFindResult = $QuestionTextFind->fetchALL();
	$questionCount = count($QuestionTextFindResult);
	
}
catch(PDOException $e){
	echo "Error: " . $e->getMessage();
}

try{
	$QuestionIDFind = $conn->prepare("SELECT ID FROM Question
	WHERE StudyID = '$survey'");
	$QuestionIDFind->execute();
	$QuestionIDFindResult = $QuestionIDFind->fetchALL();
	$questionCount = count($QuestionIDFindResult);
	
}
catch(PDOException $e){
	echo "Error: " . $e->getMessage();
}



$dataString = serialize($QuestionIDFindResult);

?>
<html>
<body>

<form action="liam_submitsurvey.php" method="post">
	<?php
	for($i = 0; $i < $questionCount; $i++){
		echo "ID: ".$QuestionIDFindResult[$i];
		?>
		<label for="answer[<?php $i+1 ?>]"> <?php echo $QuestionTextFindResult[$i]; ?> </label><br>
		<input type="text" id="answer[<?php $i+1 ?>]" name="answer[<?php $i+1 ?>]" value=""><br>
		<input type="hidden" name="questionIDs" value=<?php echo $dataString; ?> readonly>
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