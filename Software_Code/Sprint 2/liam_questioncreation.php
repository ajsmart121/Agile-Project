<?php
session_start();
include"config.php";
?>
<html>
<body>
	<?php
	$studyID = $_GET['surveyid'];
	if(!isset($_SESSION["questionsremaining"])){
		$_SESSION["questionsremaining"] = $_GET['questionquantity'];
	}
	echo $_SESSION["questionsremaining"];
	
	if(!isset($_SESSION["counter"])){
		$_SESSION["counter"] = 0;
	}
	
	if($_SESSION["questionsremaining"]>0){
	?>
	<form action method="post">
		<label for="questiontext">Question Text:</label><br>
		<input type="text" id="questiontext" name="questiontext" value="Is this an example question?"><br>
		<!--
		<label for="questiontype">Question Type:</label><br>
		<select id="questiontype" name="questiontype">
			<option value="1">Text</option>
			<option value="2">Single Choice</option>
			<option value="3">Multiple Choice</option>
		</select>
		<label for="questionanswerquantity">Question Answer Quantity:</label><br>
		<input type="text" id="questionanswerquantity" name="questionanswerquantity" value="1"><br>
		-->
		
		<input type="submit" value="Submit" onclick="addQuestion">
	</form> 
	<?php
	}
	else{
		unset($_SESSION["questionsremaining"]);
		unset($_SESSION["counter"]);
		echo "Questions submitted!";
		?>
		<a href="https://agilegroup05webapp.herokuapp.com/Software_Code/Sprint%202/liam_survey.php?surveyid=<?php echo $studyID; ?>">Survey Link</a>
		<?php
	}
	?>


	<script>
	function addQuestion(){
		<?php
		if ($_SESSION["counter"] > 0){
		$questiontext = $_POST["questiontext"];
		try{
			$questionInsert = "INSERT INTO question (QuestionText, QuestionAnswerCount, StudyID)
			VALUES ('$questiontext', '1', '$studyID')";
			$conn->exec($questionInsert);
			$_SESSION["questionsremaining"]--;
			
		}
		
		catch(PDOException $e){
			echo $questionInsert . "<br>" . $e->getMessage();
		}
		}
		
		$_SESSION["counter"]++;
		?>
		return true;
	}
	</script>
</body>
</html>

<?php
$conn = null;
?>