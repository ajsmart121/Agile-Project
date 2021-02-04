<!DOCTYPE html>
<?php
session_start();
include"config.php";
unset($_SESSION["questionsremaining"]);

$studycreator = $_POST["studycreator"];
$studyname = $_POST["studyname"];
$questionquantity = $_POST["questionquantity"];
$email = $_POST["email"];
$approvalcode = $_POST["ethicscode"];
$ethicslink = $_POST["ethicslink"];
$ethicssubmitted = $_POST["ethicssubmitted"];
$ethicsapproved = $_POST["ethicsapproved"];
$ethicsdis = $_POST["ethicsdis"];


try{
	$studyInsert = "INSERT INTO Study (UserID, StudyQuestionCount, StudyName, CreatorEmail, EthicsApprovalCode, EthicsLink, EthicsSubmitted, EthicsApproved, EthicsDisclosureText)
	VALUES ('$studycreator', '$questionquantity', '$studyname','$email','$approvalcode','$ethicslink','$ethicssubmitted','$ethicsapproved','$ethicsdis');
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
