<?php
//dislikesServer2 only displays the number of dislikes
require_once "info.php";

$fID = $_POST['factId'];

$query1 = "SELECT * FROM facts where id='$fID'";
$result1 = mysqli_query($link, $query1);
$rowX = mysqli_fetch_row($result1);

echo $rowX[5];
?>