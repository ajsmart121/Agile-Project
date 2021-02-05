<!DOCTYPE html>
<?php
session_start();
include"config.php";

if(isset($_GET["surveyID"])){
	$surveyID = $_GET["surveyID"];
}
if(isset($_GET["userID"])){
	$userID = $_GET["userID"];
}

if(isset($surveyID) && isset($userID)){

	try{
		$QuestionsFind = $conn->prepare("SELECT q.QuestionText, ua.UserAnswerText FROM Question q, useranswer ua
		WHERE q.StudyID = '$surveyID'
		AND ua.QuestionID = q.ID");
		$QuestionsFind->execute();
		$QuestionsFindResult = $QuestionsFind->fetchALL();
		$questionCount = count($QuestionsFindResult);
		
		
		for($i = 0; $i < $questionCount; $i++){
			echo nl2br("Question ".($i+1).": ".$QuestionsFindResult[$i][0]."\r\n");
			echo nl2br("Answer ".($i+1).": ".$QuestionsFindResult[$i][1]."\r\n");
		}
		
		
	}
	
	catch(PDOException $e){
		echo "Error: " . $e->getMessage();
	}
	
}	

?>

<html>
<body>

<form action method="get">
	This form will allow you to see a particular user's response to a particular survey.
	<br>
	<br>
	<label for="surveyID">Please enter the ID of the survey:</label><br>
	<input type="text" id="surveyID" name="surveyID" value=""><br>
	<label for="surveyUser">Please enter the ID of the user:</label><br>
	<input type="text" id="userID" name="userID" value=""><br>
	<input type="submit" value="Submit">
</form> 

</body>
</html>


<?php
$conn = null;
?>