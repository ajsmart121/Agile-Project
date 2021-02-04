<!DOCTYPE html>
<?php
session_start();
include"config.php";
?>

<?php
$studyID = $_GET['studyID'];
echo "Study ID = ".$studyID;

try{
	$QuestionsFind = $conn->prepare("SELECT QuestionText, ID, StudyID FROM Question
	WHERE StudyID = '$studyID'");
	$QuestionsFind->execute();
	$QuestionsFindResult = $QuestionsFind->fetchALL();
	$questionCount = count($QuestionsFindResult);
	$_SESSION['questions'] = $QuestionsFindResult;
	
	echo "Count ".$questionCount;
}
catch(PDOException $e){
	echo "Error: " . $e->getMessage();
}

?>
<html>
<body>

<form action="liam_submitsurvey.php" method="post">
	<?php
	
	for($i = 0; $i < $questionCount; $i++){
		echo "ID: ".$QuestionsFindResult[$i][1];
		?>
		<label for="answer[<?php $i+1 ?>]"> <?php echo $QuestionsFindResult[$i][0]; ?> </label><br>
		<input type="text" id="answer[<?php $i+1 ?>]" name="answer[<?php $i+1 ?>]" value=""><br>
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