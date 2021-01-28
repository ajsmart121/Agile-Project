<!DOCTYPE html>
<?php
session_start();
include"config.php";

$studycreator = $_POST["studycreator"];
$studyname = $_POST["studyname"];
$questionquantity = $_POST["questionquantity"];




try{
	$studyInsert = "INSERT INTO Study (UserID, StudyName, StudyQuestionCount)
	VALUES ('$studycreator', '$studyname', '$questionquantity')";
	$conn->exec($studyInsert);
}

catch(PDOException $e){
	echo $studyInsert . "<br>" . $e->getMessage();
	}
}









?>


<html>
<body>
<form action="studyconfirmation.php" method="post">
  
  <label for="questiontext">Question Text:</label><br>
  <input type="text" id="questiontext" name="questiontext" value="Is this an example question?"><br>
  
  <input type="submit" value="Submit">
</form> 
</body>
</html>

<?php
$conn = null;
?>