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
			VALUES ('$questiontext', '$questionanswerquantity', '$studyID', '$questiontype')";
			$conn->exec($questionInsert);
			$_SESSION["questionsremaining"]--;
		}

		catch(PDOException $e){
			echo $questionInsert . "<br>" . $e->getMessage();
		}
		
		try{
			$questionIDFind = $conn->prepare("SELECT * FROM Question ORDER BY ID DESC LIMIT 1");
			$questionIDFind->execute();
			$questionIDFindResult = $questionIDFind->fetch(PDO::FETCH_OBJ);
			$questionID = $questionIDFindResult->ID;
		}
		
		catch(PDOException $e){
			echo "Error: " . $e->getMessage();
		}	
	
		if($questiontype!="textbox"){
			
			?>
			<meta http-equiv="refresh" content="0; URL=liam_answercreation.php?questionID=<?php echo $questionID; ?>&questiontype=<?php echo $questiontype; ?>&questionanswerquantity=<?php echo $questionanswerquantity; ?>&studyID=<?php echo $studyID; ?>"/>
			<?php
			
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
		<a href="liam_survey.php?surveyid=<?php echo $studyID; ?>">Survey Link</a>
		<?php
	}
	?>

</body>
</html>

<?php
$conn = null;
?>