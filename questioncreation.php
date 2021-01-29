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
}

echo $questionquantity;
$questionquantity = $questionquantity - 1;
if($questionquantity >= 0){
	
?>




<html>
<body>
<form action method="post">

	<label for="questiontext">Study Creator ID:</label><br>
	<input type="text" id="questiontext" name="questiontext" value="Is this an example question?"><br>
	<input type="hidden" id ="questionquantity" name="questionquantity" value=<?php echo $questionquantity; ?> readonly>
	
	<input type="submit" value="Submit">
	</form> 
</body>
</html>

<?php
}

$conn = null;
?>