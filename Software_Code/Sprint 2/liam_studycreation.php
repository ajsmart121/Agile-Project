<?php
session_start();
include"config.php";
?>
<head>
  <link rel="stylesheet" type="text/css" href="PaulTheme2.css"> <!--use the theme CSS-->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous"><!--use the bootstrap-->
    <title>
        Study Creation
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
			<form action="liam_studycreated.php" method="post">

			  <input type="hidden" id="studycreator" name="studycreator" value="<?php echo $_SESSION['user'] ?>"><br>

			  <label for="email">Study Creator Email:</label><br>
			  <input type="text" id="email" name="email" required placeholder="Example@example.example"><br>

			  <label for="studyname">Study Name:</label><br>
			  <input type="text" id="studyname" name="studyname"><br>

			  <label for="ethicscode">Ethics Approval Code:</label><br>
			  <input type="text" id="ethicscode" name="ethicscode" placeholder="ABC-123-DEF" required pattern="[A-Za-z]{3}+-+\[A-Za-z]{3}+-+\[0-9]{3}" title="ABC-123-DEF"><br>

			  <label for="ethicslink">Ethics Link:</label><br>
			  <input type="text" id="ethicslink" name="ethicslink" placeholder="Link to approved ethics form" required><br>

			  <label for="questionquantity">Number of Questions:</label><br>
			  <input type="text" id="questionquantity" name="questionquantity" value="3"><br>

			  <label for="ethicssubmitted">Ethics Sheet Submitted: </label><br>
			  <input type="checkbox" id="ethicssubmitted" name="ethicssubmitted" value="Submitted" required><br>

			  <label for="ethicsapproval">Ethics Sheet Approved: </label><br>
			  <input type="checkbox" id="ethicsapproval" name="ethicsapproval" value="Approved" required><br>

			  <label for="ethicsdis">Ethics Disclosure Text:</label><br>
			  <input type="text" id="ethicsdis" name="ethicsdis" placeholder="Disclosure Text Here." required><br>

			  <input type="submit" value="Submit">
			</form>
		</div>
	</div>
</div>

</body>
<?php
$conn = null;
?>
