<!DOCTYPE html>
<?php
session_start();
include"config.php";
unset($_SESSION["questionsremaining"]);

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

try{
	$studyIDFind = $conn->prepare("SELECT * FROM Study ORDER BY ID DESC LIMIT 1");
	$studyIDFind->execute();
	$studyIDFindResult = $studyIDFind->fetch(PDO::FETCH_OBJ);
	$studyID = $studyIDFindResult->ID;
	$questionquantity = $studyIDFindResult->StudyQuestionCount;
}
catch(PDOException $e){
	echo "Error: " . $e->getMessage();
}	
?>


<html>
<body>
<a href="liam_questioncreation.php?surveyid=<?php echo $studyID; ?>&questionquantity=<?php echo $questionquantity; ?>">Add Questions</a>
</body>
</html>


<?php
$conn = null;
?>