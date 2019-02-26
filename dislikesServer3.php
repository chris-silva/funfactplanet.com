<?php
//checks whether the user has already disliked a fact
//require_once "info.php";
include_once "info.php";

$fID = $_POST['factId'];
$usador = $_POST['user'];

$query3 = "SELECT * FROM members where user ='$usador'";
$result3 = mysqli_query($link, $query3);
$rowY = mysqli_fetch_row($result3);
$u = $rowY[0]; // $u should have user id from current user from members table

$query1 = "SELECT * FROM dislikes where factid ='$fID' AND userid='$u'";
$result1 = mysqli_query($link, $query1);
$num1 = mysqli_num_rows($result1);

if ( $num1 == 0  )
{
	echo 0;
}
else
{
	echo 1;
}

?>