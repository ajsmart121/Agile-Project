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
	
	if(isset($_POST["questiontext"])){
		$questiontext = $_POST["questiontext"];
		$questiontype=$_POST["questiontype"];
		$questionanswerquantity = $_POST["questionanswerquantity"];
		try{
			$questionInsert = "INSERT INTO question (QuestionText, QuestionAnswerCount, StudyID, QuestionType)
			VALUES ('$questiontext', '$questionanswerquantity', '$studyID', '0')";
			$conn->exec($questionInsert);
			$_SESSION["questionsremaining"]--;
		}

		catch(PDOException $e){
			echo $questionInsert . "<br>" . $e->getMessage();
		}
	
		if($questiontype!="TextBox"){
			header('Location: https://agilegroup05webapp.herokuapp.com/Software_Code/Sprint%202/liam_createanswer.php?questiontype=$questiontype&questionanswerquantity=$questionanswerquantity');
			exit;
		}
	
	}
	

	if($_SESSION["questionsremaining"]>0){
		?>
		<form action method="post">
			<label for="questiontext">Question Text:</label><br>
			<input type="text" id="questiontext" name="questiontext" value=""><br>
			<label for="questionanswerquantity">Question Answer Quantity:</label><br>
			<input type="text" id="questionanswerquantity" name="questionanswerquantity" value=""><br>
			<label for="questiontype">Question Type:</label>
			<select id="questiontype" name="questiontype">
				<option value="textbox">Text Box</option>
				<option value="radiobuttons">Radio Buttons</option>
				<option value="checkbox">Check Boxes</option>
			</select><br>
			<input type="submit" value="Submit">
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

</body>
</html>

<?php
$conn = null;
?>