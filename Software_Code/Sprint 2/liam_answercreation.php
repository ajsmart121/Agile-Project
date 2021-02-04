<!DOCTYPE html>
<?php
session_start();
include"config.php";


$questionID $_GET['questionID'];
$questionID $_GET['questiontype'];
$questionID $_GET['questionanswerquantity'];

$_GET['studyID'];
$questionanswerquantity = $_GET['questionanswerquantity'];

?>

<html>
<body>

<form action="liam_answerscreated.php method="post">
	<?php
	for($i = 0; $i < $questionanswerquantity; $i++){
		?>
		<label for="option[<?php $i+1 ?>]"> <?php echo "Option ".$i+1; ?> </label><br>
		<input type="text" id="option[<?php $i+1 ?>]" name="option[<?php $i+1 ?>]" value=""><br>
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