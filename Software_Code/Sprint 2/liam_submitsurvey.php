<!DOCTYPE html>
<?php
session_start();
include"config.php";
$userID = $_SESSION['user'];
$questions = $_SESSION['questions'];

$userAnswerCount = count($_POST['answer']);

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
			//Here we take the user input for their answers to the survey and insert them into the database
			for($i = 0; $i < $userAnswerCount; $i++){
				$useranswer = $_POST['answer'][$i];
				$questionid = $questions[$i][1];
				$studyID = $questions[$i][2];

			try{
				$userAnswerInsert = "INSERT INTO useranswer (QuestionID, UserID, UserAnswerText, StudyID)
				VALUES ('$questionid', '$userID', '$useranswer', '$studyID')";
				echo nl2br("User with ID: ".$userID." has successfully answered question with ID: ".$questionid." with the response of: ".$useranswer."!\r\n\r\n");
				$conn->exec($userAnswerInsert);
			}

			catch(PDOException $e){
				echo $userAnswerInsert . "<br>" . $e->getMessage();
				}
			}
			?>
		</div>
	</div>
</div>

</body>
<?php
$conn = null;
?>
