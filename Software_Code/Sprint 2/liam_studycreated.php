<!DOCTYPE html>
<?php
session_start();
include"config.php";
unset($_SESSION["questionsremaining"]);
unset($_SESSION["counter"]);

$studycreator = $_POST["studycreator"];
$studyname = $_POST["studyname"];
$questionquantity = $_POST["questionquantity"];
$email = $_POST["email"];
$approvalcode = $_POST["ethicscode"];
$ethicslink = $_POST["ethicslink"];
$ethicssubmitted = $_POST["ethicssubmitted"];
$ethicsapproved = $_POST["ethicsapproval"];
$ethicsdis = $_POST["ethicsdis"];

try{
	$studyInsert = "INSERT INTO Study (UserID, StudyQuestionCount, StudyName, EthicsApproved, creatorEmail, ethicsApprovalCode, ethicsLink, ethicsSubmitted, ethicsDisclosureText)
	VALUES ('$studycreator', '$questionquantity', '$studyname', '$ethicsapproved', '$email', '$approvalcode', '$ethicslink', '$ethicssubmitted', '$ethicsdis')";
	$conn->exec($studyInsert);
}
catch(PDOException $e){
	echo $studyInsert . "<br>" . $e->getMessage();
}
try{
	$studyIDFind = $conn->prepare("SELECT * FROM Study ORDER BY ID DESC LIMIT 1");
	$studyIDFind->execute();
	$studyIDFindResult = $studyIDFind->fetch(PDO::FETCH_OBJ);
	
	$_SESSION['studyID'] = $studyIDFindResult->ID;
	$_SESSION['questionsremaining'] = $studyIDFindResult->StudyQuestionCount;
	
}
catch(PDOException $e){
	echo "Error: " . $e->getMessage();
}	
?>
<html>
<body>
<script> document.location.href="liam_questioncreation.php" </script>
</body>
</html>
<?php
$conn = null;
?>