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
		
		<input id="demo" type="submit" value="Submit">
	</form> 
	<?php
	}
	else{
		unset($_SESSION["questionsremaining"]);
		echo "Questions submitted!";
		?>
		<a href="https://agilegroup05webapp.herokuapp.com/Software_Code/Sprint%202/liam_survey.php?surveyid=<?php echo $studyID; ?>">Survey Link</a>
		<?php
	}
	?>


	<script>
	document.getElementById("demo").onclick = function() {myFunction()};

	
	function myFunction() {
		<?php
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

		?>
		return true;
	}
	</script>
</body>
</html>

<?php
$conn = null;
?>