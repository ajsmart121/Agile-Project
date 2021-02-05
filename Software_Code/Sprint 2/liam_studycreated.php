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


//Here we take all of the input from the initial study creation page and insert it to the database, to create a survey with no questions, ready for the next stage
try{
	$studyInsert = "INSERT INTO Study (UserID, StudyQuestionCount, StudyName, EthicsApproved, creatorEmail, ethicsApprovalCode, ethicsLink, ethicsSubmitted, ethicsDisclosureText)
	VALUES ('$studycreator', '$questionquantity', '$studyname', '$ethicsapproved', '$email', '$approvalcode', '$ethicslink', '$ethicssubmitted', '$ethicsdis')";
	$conn->exec($studyInsert);
}
catch(PDOException $e){
	echo $studyInsert . "<br>" . $e->getMessage();
}

//We then search for the most recent entry to the study table, to (hopefully) find the ID of the survey we just created, which we'll need in the next steps
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
