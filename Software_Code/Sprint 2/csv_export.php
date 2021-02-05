<!DOCTYPE html>
<?php
session_start();
include"config.php";
$studyID = $_POST['studyID'];
$userID = $_POST['userID'];
?>

<?php
header('Content-Type: text/csv; charset=utf-8');
header('Content-Disposition: attachment; filename=data.csv');

$output = fopen('php://output', 'w');

fputcsv($output, array('Question ID', 'UserID', 'useranswertext', 'StudyID', 'ID'));

$rows = mysql_query("SELECT * from useranswer WHERE StudyID = '$studyID'");

// loop over the rows, outputting them
while ($row = mysql_fetch_assoc($rows)) fputcsv($output, $row);

?>


<?php
$conn = null;
?>