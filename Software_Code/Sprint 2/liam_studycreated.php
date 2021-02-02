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
	header("Location: https://agilegroup05webapp.herokuapp.com/Software_Code/Sprint%202/liam_questioncreation.php");
}

catch(PDOException $e){
	echo $studyInsert . "<br>" . $e->getMessage();
}
?>


<html>
<body>

</body>
</html>


<?php
$conn = null;
?>