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
	
	if(!isset($_SESSION["counter"])){
		$_SESSION["counter"]=0;
	}
		
	if($_SESSION["counter"] < $_SESSION["questionsremaining"]){
		try{
		$questiontext = $_POST["questiontext"];
		$questionInsert = "INSERT INTO question (QuestionText, QuestionAnswerCount, StudyID)
		VALUES ('$questiontext', '1', '$studyID')";
		$conn->exec($questionInsert);
		$_SESSION["counter"]++;
		}
		
		catch(PDOException $e){
			echo $questionInsert . "<br>" . $e->getMessage();
		}
	}
	
	if($_SESSION["questionsremaining"]>0){
		
	?>
	<form action method="post">
		<label for="questiontext">Question Text:</label><br>
		<input type="text" id="questiontext" name="questiontext" value="Is this an example question?"><br>
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