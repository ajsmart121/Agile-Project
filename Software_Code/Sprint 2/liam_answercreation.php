<!DOCTYPE html>
<?php
session_start();
include"config.php";


echo $_GET['questiontype'];

echo $_GET['questionanswerquantity'];

echo $_GET['studyID'];
$questionanswerquantity = $_GET['questionanswerquantity'];

?>

<html>
<body>

<form action="liam_answerscreated.php method="post">
	<?php
	for($i = 0; $i < $questionanswerquantity; $i++){
		?>
		<label for="option[<?php $i+1 ?>]"> <?php echo "Option ".$i; ?> </label><br>
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