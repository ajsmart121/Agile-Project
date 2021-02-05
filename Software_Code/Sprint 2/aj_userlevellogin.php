<!DOCTYPE html>
  <link rel="stylesheet" type="text/css" href="fergus_login_fixed_font.css"> <!--use the theme CSS-->
  <link rel="stylesheet" type="text/css" href="PaulTheme2.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
<?php
session_start();
include"config.php";
unset($_SESSION['user']);
?>


<html>
  
  <head> 
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
<body>
  <!--Dundee Logo -->
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
  
  
  <div class="container">
    <form action="aj_userleveltest.php" method="post">
      <label for="username">Username:</label><br>
      <input type="text" id="username" name="username" value="username"><br>
      <label for="password">Password:</label><br>
      <input type="text" id="password" name="password" value="password"><br><br>
      <button type="submit" value="Submit">
    </form>
  </div>
</body>
</html>
        
<?php
$conn = null;
?>
<!-- Adapted from Liam's login code, adding security !-->
