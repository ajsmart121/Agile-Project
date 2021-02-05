<!DOCTYPE html>
<?php
session_start();
include"config.php";
?>

<?php
$studyID = $_GET['studyID'];

try{
	$QuestionsFind = $conn->prepare("SELECT QuestionText, ID, StudyID, QuestionAnswerCount, questiontype 
	FROM Question
	WHERE StudyID = '$studyID'");
	$QuestionsFind->execute();
	$QuestionsFindResult = $QuestionsFind->fetchALL();
	$questionCount = count($QuestionsFindResult);
	$_SESSION['questions'] = $QuestionsFindResult;
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
		<!-- The line below prints out the QuestionText -->
		<label for="answer[<?php $i+1 ?>]"> <?php echo $QuestionsFindResult[$i][0]; ?> </label><br>
		<?php
		//The line below checks the question type
		if($QuestionsFindResult[$i][4]=="radiobuttons"){
			//We then assign the ID of the current question to questionID
			$questionID = $QuestionsFindResult[$i][1];
			//We then search for all the answers assigned to this question
			try{
				$AnswersFind = $conn->prepare("SELECT ID, AnswerText
				FROM Answer
				WHERE QuestionID = '$questionID'");
				$AnswersFind->execute();
				$AnswersFindResult = $AnswersFind->fetchALL();
			}
			catch(PDOException $e){
				echo "Error: " . $e->getMessage();
			}
			//We then start a for loop that runs for the amount of answers assigned to the question
			for($j = 0; $j < $QuestionsFindResult[$i][3]; $j++){
				?>
				<input type="checkbox" id="answer[<?php echo $j; ?>]" name="answer[<?php echo $i; ?>]" value="<?php echo $AnswersFindResult[$j][1] ?>">
				<label for="answer[<?php echo $i; ?>]"><?php echo $AnswersFindResult[$j][1] ?></label><br>
				<?php
			}	
		}
		else{	
			?>
			<br><input type="text" id="answer[<?php echo $i; ?>]" name="answer[<?php echo $i; ?>]" value=""><br>
			<?php
		}
	}
	
	?>
	<input type="submit" value="Submit">
</form> 

</body>
</html>


<?php
$conn = null;
?>