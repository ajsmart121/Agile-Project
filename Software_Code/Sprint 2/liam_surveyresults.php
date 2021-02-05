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
?>
<head>
  <link rel="stylesheet" type="text/css" href="PaulTheme2.css"> <!--use the theme CSS-->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous"><!--use the bootstrap-->
    <title>
        Login Page
    </title>
<!--setbackground to Dundee Colours-->
    <style>
        body {
          background-color: #3e5bc7;
        }
    </style>
</head>

<!--Dundee Logo -->
<body>
  <div class="dropdown" id="dropdownAccessibility">
    <button onclick="showAccessibilty()" class="dropbtn">Colours</button>
  <div class = "Accessibility" id="Accessibility">
      <button herf="#" id="AccessibilityButtonNormal" class="AccessibilityButton" onclick="ChangeColorNormal()" type = "NormalColour">Normal</button>
      <button herf="#" id="AccessibilityButtonProtan" class="AccessibilityButton" onclick="ChangeColorProtan()" type = "ProtanColour">Protan</button>
      <button herf="#" id="AccessibilityButtonDeutran" class="AccessibilityButton" onclick="ChangeColorDeutran()" type = "DeutranColour">Deutran</button>
      <button herf="#" id="AccessibilityButtonTritan" class="AccessibilityButton" onclick="ChangeColorTritan()" type = "TritanColour">Tritan</button>
  </div>
</div>

 <div class="dropdown" id="dropdownFontSize">
   <button onclick="showFont()" class="dropbtn">Font Size</button>
  <div class = "FontSize" id="FontSize">
    <button herf="#" id="XXSmallFontSize" class="FontButton" onclick="XXSmallFontSize()" type = "XXSmallTextSize">XX-Small Font Size</button>
    <button herf="#" id="XSmallFontSize" class="FontButton" onclick="XSmallFontSize()" type = "XSmallTextSize">X-Small Font Size</button>
    <button herf="#" id="SmallFontSize" class="FontButton" onclick="SmallFontSize()" type = "SmallTextSize">Small Font Size</button>
    <button herf="#" id="MediumFontSize" class="FontButton" onclick="MediumFontSize()" type = "MediumFontSize">Medium Font Size</button>
    <button herf="#" id="LargeFontSize" class="FontButton" onclick="LargeFontSize()" type = "LargeFontSize">Large Font Size</button>
    <button herf="#" id="XLargeFontSize" class="FontButton" onclick="XLargeFontSize()" type = "XLargeFontSize">X-Large Font Size</button>
    <button herf="#" id="XXLargeFontSize" class="FontButton" onclick="XXLargeFontSize()" type = "XXLargeFontSize">XX-Large Font Size</button>
  </div>
</div>

<script src="PaulAccessibility.js"></script>

<div class = "Header Layout">
  <img src="PaulWhiteLogo.png" alt="Logo" style="width:20%">
</div>

<!--Adds home button-->
<div class = "Header Layout">
  <input id="button2" type="button2" class="button2" value="Home" onclick="document.location='PaulHome.php'">

  <!--For accessibility options-->

</div>

<!--creates main page container-->
<div class = "Body Layout">
	<div class = "container">
		<div id = box2>
			<?php
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
			<form action method="get">
				This form will allow you to see a particular user's response to a particular survey.
				<label for="surveyID">Please enter the ID of the survey:</label><br>
				<input type="text" id="surveyID" name="surveyID" value=""><br>
				<label for="surveyUser">Please enter the ID of the user:</label><br>
				<input type="text" id="userID" name="userID" value=""><br>
				<input type="submit" value="Submit">
			</form> 
		</div>
	</div>
</div>

</body>
<?php
$conn = null;
?>
