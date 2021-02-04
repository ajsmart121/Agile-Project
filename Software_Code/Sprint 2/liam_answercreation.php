<!DOCTYPE html>
<?php
session_start();
include"config.php";


$questionID = $_SESSION['question'];
echo nl2br($questionID."\r\n");

$questiontype = $_SESSION['type'];
echo nl2br($questiontype."\r\n");

$questionanswerquantity = $_SESSION['options'];
echo nl2br($questionanswerquantity."\r\n");

$studyID = $_SESSION['studyID'];
echo nl2br($studyID."\r\n");

?>

<html>
<body>

<form action="liam_answerscreated.php method="post">
	<?php
	/*
	for($i = 0; $i < $questionanswerquantity; $i++){
		?>
		<label for="option[<?php $i+1 ?>]"> <?php echo "Option ".$i+1; ?> </label><br>
		<input type="text" id="option[<?php $i+1 ?>]" name="option[<?php $i+1 ?>]" value=""><br>
		<?php
	}
	*/
	?>
	<input type="submit" value="Submit">
</form> 

</body>
</html>

<?php
$conn = null;
?>