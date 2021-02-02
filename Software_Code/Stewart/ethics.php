<!DOCTYPE html>

<?php
session_start();
include"config.php";

$dbvalue = //if the value in the databse is true, set value of variable to be checked

$study = $_POST["study"];
$username = $_POST["username"];
$password = $_POST["password"];

?>


//db field is boolean and is called EthicsApproved


<html>
        <body>

            <label for="required">Ethics Form Approved? </label>
            <input type="checkbox" name="EthicsApprovalCheckbox" id="EthicsApprovalID" value="Approved" <?php echo ($dbvalue['EthicsApproved']==1 ? 'checked' . ' disabled' : '');?>>

        </body>
</html>

<?php
$conn = null;
?>
