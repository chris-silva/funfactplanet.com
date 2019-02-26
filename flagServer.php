<?php

require_once "info.php";

$fID = $_POST['factId'];
$usador = $_POST['user'];

$query1 = "UPDATE facts SET flag=1 WHERE id='$fID'";
mysqli_query($link, $query1);

$query2 = "SELECT * FROM members where user ='$usador'";
$result2 = mysqli_query($link, $query2);
$rowY = mysqli_fetch_row($result2);
$num1 = $rowY[0]; // $num1 should have user id from current user from members table

$query3 = "INSERT INTO flags(factid, userid) VALUES('$fID', '$num1')";
mysqli_query($link, $query3);

?>