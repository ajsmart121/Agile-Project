<!DOCTYPE html>
<?php
session_start();
include"config.php";
?>

<?php
$studyID = $_GET['studyID'];

try{
	$StudyFind = $conn->prepare("SELECT StudyName, CreatorEmail, EthicsLink, EthicsDisclosureText FROM Study
    WHERE ID = '$studyID'");
    $StudyFind->execute();
    $StudyFindResult = $StudyFind->fetch(PDO::FETCH_OBJ);
}
catch(PDOException $e){
	echo "Error: " . $e->getMessage();
}

?>
<html>
<body>

<form action="liam_survey.php" method="get">
	<?php
	echo nl2br($StudyFindResult->StudyName."\r\n");
	echo nl2br("If you have any questions, please email ".$StudyFindResult->CreatorEmail."\r\n");
    echo nl2br("Ethical assessment and statement: ".$StudyFindResult->EthicsLink."\r\n");
    echo nl2br("Ethics Disclosure: ".$StudyFindResult->EthicsDisclosureText."\r\n");
    echo nl2br("\r\n I understand and agree to the above Ethics Disclosure. \r\n I am aware of my rights and how to contact should a question arise.\r\n");
    ?>
	
	<input type="hidden" id="studyID" name="studyID" value="<?php echo $_SESSION['studyID'] ?>"><br>
	<input type="checkbox" name="Understood" required><br><br>

	<input type="submit" value="Submit">
</form> 

</body>
</html>


<?php
$conn = null;
?>