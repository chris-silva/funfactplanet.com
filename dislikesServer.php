<?php
//dislikesServer updates the number of dislikes in facts table and adds or subtracts a row from the dislikes table
//require_once "info.php";
include_once "info.php";


$fID = $_POST['factId'];
$usador = $_POST['user'];

$query3 = "SELECT * FROM members where user ='$usador'";
$result3 = mysqli_query($link, $query3);
$rowY = mysqli_fetch_row($result3);
$num1 = $rowY[0]; // $num1 should have user id from current user from members table

$query4 = "SELECT * FROM dislikes where factid = '$fID' AND userid = '$num1'";
$result4 = mysqli_query($link, $query4);
$rowZ = mysqli_fetch_row($result4); //mysql_fetch_row could return false
$num2 = $rowZ[0]; // $num2 should have an id from the likes table

if ($rowZ) // this is if user has disliked that particular fact before
{
	//deal with the dislikes table first
	$query5 = "DELETE FROM dislikes WHERE id='$num2'";
	mysqli_query($link, $query5);
	
	$query6 = "SELECT * FROM facts WHERE id='$fID'";
	$result6 = mysqli_query($link, $query6);
	$rowA = mysqli_fetch_row($result6);
	$numOfdisLikes2 = $rowA[5];
	$numOfdisLikes2 = $numOfdisLikes2 - 1;
	
	$update2 = "UPDATE facts SET dislikes = '$numOfdisLikes2' WHERE id='$fID'";
	mysqli_query($link, $update2);
	
	$query7 = "SELECT * FROM facts where id='$fID'";
	$result7 = mysqli_query($link, $query7);
	$newNumberofdisLikes2 = mysqli_fetch_row($result7);
	echo $newNumberofdisLikes2[5];
}
else //this is if that particular user has never disliked that fact before
{
	//deal with the dislikes table first
	$query8 = "INSERT INTO dislikes(factid, userid) VALUES('$fID', '$num1')";
	mysqli_query($link, $query8);
	
	$query1 = "SELECT * FROM facts where id='$fID'";
	$result1 = mysqli_query($link, $query1);
	$rowX = mysqli_fetch_row($result1);
	$numOfdisLikes = $rowX[5];
	$numOfdisLikes = $numOfdisLikes + 1;

	$update1 = "UPDATE facts SET dislikes = '$numOfdisLikes' WHERE id='$fID'";
	mysqli_query($link, $update1);

	$query2 = "SELECT * FROM facts where id='$fID'";
	$result2 = mysqli_query($link, $query2);
	$newNumberofdisLikes = mysqli_fetch_row($result2);
	echo $newNumberofdisLikes[5];
}


?>