<!DOCTYPE html>
<?php
session_start();
include"config.php";

$studycreator = $_POST["studycreator"];
$studyname = $_POST["studyname"];
$questionquantity = $_POST["questionquantity"];

try{
	$studyInsert = "INSERT INTO Study (UserID, StudyQuestionCount, StudyName)
	VALUES ('$studycreator', '$questionquantity', '$studyname')";
	$conn->exec($studyInsert);
}

catch(PDOException $e){
	echo $studyInsert . "<br>" . $e->getMessage();
}
?>


<html>
<body>
<a href="https://agilegroup05webapp.herokuapp.com/Software_Code/Sprint%202/liam_questioncreation.php">Add Questions</a>			
</body>
</html>


<?php
$conn = null;
?>