<?php
session_start();
include"config.php";

$studyID = $_SESSION['studyID'];
	
	if(isset($_POST["questiontext"])){
		
		$questiontext = $_POST["questiontext"];
		$questiontype=$_POST["questiontype"];
		$questionanswerquantity = $_POST["questionanswerquantity"];
		
		try{
			$questionInsert = "INSERT INTO question (QuestionText, QuestionAnswerCount, StudyID, QuestionType)
			VALUES ('$questiontext', '$questionanswerquantity', '$studyID', '$questiontype')";
			$conn->exec($questionInsert);
			$_SESSION["questionsremaining"]--;
		}

		catch(PDOException $e){
			echo $questionInsert . "<br>" . $e->getMessage();
		}
		
		try{
			$questionIDFind = $conn->prepare("SELECT * FROM Question ORDER BY ID DESC LIMIT 1");
			$questionIDFind->execute();
			$questionIDFindResult = $questionIDFind->fetch(PDO::FETCH_OBJ);
		}
		
		catch(PDOException $e){
			echo "Error: " . $e->getMessage();
		}	
	
		if($questiontype!="textbox"){
			$_SESSION['question'] = $questionIDFindResult->ID;
			$_SESSION['options'] = $questionanswerquantity;
			$_SESSION['type'] = $questiontype;
			header('Location: liam_answercreation.php');
			exit;	
		}
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
  <input id="button2" type="button2" class="button2" value="Home" onclick="document.location=''">

  <!--For accessibility options-->

</div>

<!--creates main page container-->
<div class = "Body Layout">
	<div class = "container">
		<div id = box2>
		<?php
		if($_SESSION["questionsremaining"]>0){
			?>
			<form action method="post">
			<label for="questiontext">Question Text:</label><br>
			<input type="text" id="questiontext" name="questiontext" value=""><br>
			<label for="questionanswerquantity">Question Answer Quantity:</label><br>
			<input type="text" id="questionanswerquantity" name="questionanswerquantity" value=""><br>
			<label for="questiontype">Question Type:</label>
			<select id="questiontype" name="questiontype">
				<option value="textbox">Text Box</option>
				<option value="radiobuttons">Radio Buttons</option>
				<!--- <option value="checkbox">Check Boxes</option> --->
			</select><br>
			<input type="submit" value="Submit">
			</form> 
			<?php
		}
		else{
			unset($_SESSION["questionsremaining"]);
			unset($_SESSION['type']);
			unset($_SESSION['studyID']);
			unset($_SESSION['question']);
			header('Location: liam_survey.php?studyID='.$studyID);
			exit;
		}
		?>
		</div>
	</div>
</div>

</body>
<?php
$conn = null;
?>
