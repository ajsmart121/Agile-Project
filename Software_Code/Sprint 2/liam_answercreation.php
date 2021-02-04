<!DOCTYPE html>
<?php
session_start();
include"config.php";


$questionID = $_SESSION['question'];
$questiontype = $_SESSION['type'];
$questionanswerquantity = $_SESSION['options'];
$studyID = $_SESSION['studyID'];

?>

<html>
<body>

<form action="liam_answerscreated.php" method="post">
	<?php
	
	for($i = 0; $i < $questionanswerquantity; $i++){
		?>
		<label for="answertext[<?php $i+1 ?>]"> <?php echo "Option ".$i+1; ?> </label><br>
		<input type="text" id="answertext[<?php $i+1 ?>]" name="answertext[<?php $i+1 ?>]" value=""><br>
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