<?php
session_start();
include"config.php";
?>
<html>
<body>
	<?php

	$studyID = $_SESSION['studyID'];
	
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
		}
		
		catch(PDOException $e){
			echo "Error: " . $e->getMessage();
		}	
	
		if($questiontype!="textbox"){
			$_SESSION['question'] = $questionIDFindResult->ID;
			$_SESSION['options'] = $questionanswerquantity;
			$_SESSION['type'] = $questiontype;
			?> <script> document.location.href="liam_answercreation.php" </script> <?php	
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
		unset($_SESSION['type']);
		unset($_SESSION['studyID']);
		unset($_SESSION['question']);

					?> <script> document.location.href="liam_answercreation.php@studyID="</script><?phpecho $studyID;
	}
	?>

</body>
</html>

<?php
$conn = null;
?>