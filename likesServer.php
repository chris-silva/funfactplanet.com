<?php
//likesSever updates the number of likes in facts table and adds or subtracts a row from the likes table
//require_once "info.php";
include_once "info.php";

$fID = $_POST['factId'];
$usador = $_POST['user'];
//echo $fID;
//echo $usador;

$query3 = "SELECT * FROM members where user ='$usador'";
$result3 = mysqli_query($link, $query3);
$rowY = mysqli_fetch_row($result3);
$num1 = $rowY[0]; // $num1 should have user id from current user from members table

$query4 = "SELECT * FROM likes where factid = '$fID' AND userid = '$num1'";
$result4 = mysqli_query($link, $query4);
$rowZ = mysqli_fetch_row($result4); //mysql_fetch_row could return false
$num2 = $rowZ[0]; // $num2 should have an id from the likes table

if ($rowZ) // this is if user has liked that particular fact before
{
	//deal with the likes table first
	$query5 = "DELETE FROM likes WHERE id='$num2'";
	mysqli_query($link, $query5);
	
	$query6 = "SELECT * FROM facts WHERE id='$fID'";
	$result6 = mysqli_query($link, $query6);
	$rowA = mysqli_fetch_row($result6);
	$numOfLikes2 = $rowA[4];
	$numOfLikes2 = $numOfLikes2 - 1;
	
	$update2 = "UPDATE facts SET likes = '$numOfLikes2' WHERE id='$fID'";
	mysqli_query($link, $update2);
	
	$query7 = "SELECT * FROM facts where id='$fID'";
	$result7 = mysqli_query($link, $query7);
	$newNumberofLikes2 = mysqli_fetch_row($result7);
	echo $newNumberofLikes2[4];
}
else //this is if that particular user has never liked that fact before
{
	//deal with the likes table first
	$query8 = "INSERT INTO likes(factid, userid) VALUES('$fID', '$num1')";
	mysqli_query($link, $query8);
	
	$query1 = "SELECT * FROM facts where id='$fID'";
	$result1 = mysqli_query($link, $query1);
	$rowX = mysqli_fetch_row($result1);
	$numOfLikes = $rowX[4];
	$numOfLikes = $numOfLikes + 1;
	//echo $numOfLikes;

	$update1 = "UPDATE facts SET likes = '$numOfLikes' WHERE id='$fID'";
	mysqli_query($link, $update1);

	$query2 = "SELECT * FROM facts where id='$fID'";
	$result2 = mysqli_query($link, $query2);
	$newNumberofLikes = mysqli_fetch_row($result2);
	echo $newNumberofLikes[4];
}

/*
$query2 = "UPDATE facts SET likes = '$numOfLikes' WHERE id='$fID'";
$result2 = mysql_query($query2);
$newNumberofLikes = mysql_fetch_row($result2);
echo $newNumberofLikes[4];
*/

/*
$query3 = "SELECT * FROM facts WHERE id = '$fID'";
$result3 = mysql_query($query3);
$rowY = mysql_fetch_row($result3);
echo $rowY[4];
*/
?>