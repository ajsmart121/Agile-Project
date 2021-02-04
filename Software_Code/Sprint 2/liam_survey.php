<!DOCTYPE html>
<?php
session_start();
include"config.php";
?>

<?php
$survey = $_GET['surveyid'];

try{
	$QuestionsFind = $conn->prepare("SELECT QuestionText, ID, StudyID FROM Question
	WHERE StudyID = '$survey'");
	$QuestionsFind->execute();
	$QuestionsFindResult = $QuestionsFind->fetchALL();
	$questionCount = count($QuestionsFindResult);
	$_SESSION['questions'] = $QuestionsFindResult;

}
catch(PDOException $e){
	echo "Error: " . $e->getMessage();
}

try{
	$StudyFind = $conn->prepare("SELECT CreatorEmail, EthicsLink, EthicsDisclosureText FROM Study
	WHERE ID = '$survey'");
	$StudyFind->execute();
	$StudyFindResult = $StudyFind->fetch(PDO::FETCH_OBJ);
	$email = $StudyFindResult->CreatorEmail;
	$ethicslink = $StudyFindResult->EthicsLink;
	$ethicsdis = $StudyFindResult->EthicsDisclosureText;

}
catch(PDOException $e){
	echo "Error: " . $e->getMessage();
}

?>
<html>
<body>

<form action="liam_submitsurvey.php" method="post">
	<?php

	echo nl2br("If you have any questions, please email ".$email."\r\n");
	echo nl2br("Ethical assessment and statement: ".$ethicslink."\r\n");
	echo nl2br("Ethics Disclosure: \r\n".$ethicsdis."\r\n");
	echo nl2br("\r\n I understand and agree to the above Ethics Disclosure. \r\n I am aware of my rights and how to contact should a question arise.".$ethicsdis."\r\n");
	<input type="checkbox" name="Understood" required>

	for($i = 0; $i < $questionCount; $i++){
		echo "ID: ".$QuestionsFindResult[$i][1];
		?>
		<label for="answer[<?php $i+1 ?>]"> <?php echo $QuestionsFindResult[$i][0]; ?> </label><br>
		<input type="text" id="answer[<?php $i+1 ?>]" name="answer[<?php $i+1 ?>]" value=""><br>
	<?php
	}
	?>
	<input type="submit" value="Submit">
</form>

</body>
</html>


<?php
$conn = null;
?>
