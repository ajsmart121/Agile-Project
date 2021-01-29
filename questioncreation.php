<?php
session_start();
include"config.php";

if(isset($_POST["questionquantity"])){
	$_SESSION['questionsremaining'] = $_POST["questionquantity"];
}
else{
	$_SESSION['questionsremaining']--;
}
if(isset($_POST["studycreator"])){
	unset($_SESSION['studyID']);
	$studycreator = $_POST["studycreator"];
	$studyname = $_POST["studyname"];

	try{
		$studyInsert = "INSERT INTO Study (UserID, StudyQuestionCount, StudyName)
		VALUES ('$studycreator', '$questionquantity', '$studyname')";
		$conn->exec($studyInsert);
	}

	catch(PDOException $e){
		echo $studyInsert . "<br>" . $e->getMessage();
	}
	
	try{
		$studyIDFind = $conn->prepare("SELECT * FROM Study ORDER BY ID DESC LIMIT 1");
		$studyIDFind->execute();
		$studyIDFindResult = $studyIDFind->fetch(PDO::FETCH_OBJ);

	}
	catch(PDOException $e){
		echo "Error: " . $e->getMessage();
	}	
}

if(!isset($_SESSION['studyID'])){
	$_SESSION['studyID'] = $studyIDFindResult->ID;
}
else{
	$studyID = $_SESSION['studyID'];
}
if($_SESSION['questionsremaining']>0)
{
	?>


	<html>
	<body>
		<form action method="post" onsubmit="addQuestion()">
			<label for="questiontext">Question Text:</label><br>
			<input type="text" id="questiontext" name="questiontext" value="Is this an example question?"><br>
			<input type="submit" value="Submit">
		</form> 
	</body>
	</html>

	<script>
	function addQuestion(){
		<?php
		$questiontext = $_POST["questiontext"];
		try{
			$questionInsert = "INSERT INTO question (QuestionText, QuestionAnswerCount, StudyID)
			VALUES ('$questiontext', '1', '$studyID')";
			$conn->exec($questionInsert);
		}

		catch(PDOException $e){
			echo $questionInsert . "<br>" . $e->getMessage();
		}
		?>
		return true;
	}
	</script>

	<?php
}
else{
	echo "Questions completed!";
}	
$conn = null;
?>