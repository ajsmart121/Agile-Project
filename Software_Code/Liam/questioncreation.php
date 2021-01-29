<?php
session_start();
include"config.php";

$questionquantity = $_POST["questionquantity"];

if(isset($_POST["studycreator"])){
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
		$studyIDFind = "SELECT * FROM Study ORDER BY ID DESC LIMIT 1";
		$conn->exec($studyIDFind);
		$_SESSION['studyID'] = $studyIDFind->ID;
		echo $_SESSION['studyID'];
	}

	catch(PDOException $e){
		echo $studyIDFind . "<br>" . $e->getMessage();
	}
	
	

}

?>


<html>
<body>
<form action method="post" onsubmit="addQuestion()">

	<label for="questiontext">Study Creator ID:</label><br>
	<input type="text" id="questiontext" name="questiontext" value="Is this an example question?"><br>
	<input type="hidden" name="questionquantity" value=<?php echo $questionquantity ?> readonly>
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
		VALUES ('$questiontext', '1', '11')";
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

$conn = null;
?>