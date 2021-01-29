<?php
session_start();
include"config.php";

if(isset($_POST["questionquantity"])){
	$questionquantity = $_POST["questionquantity"];
	$_SESSION['questionquantity'] = $questionquantity;
}

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
}

$_SESSION['questionquantity']--;

if($_SESSION['questionquantity'] >= 0){
	
?>




<html>
<body>
<form action method="post" onsubmit="addQuestion()">

	<label for="questiontext">Study Creator ID:</label><br>
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
}
else{
	echo "Questions all added!";	
}

$conn = null;
?>