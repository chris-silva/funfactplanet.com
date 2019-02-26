<?php
//require_once "info.php";
include_once "info.php";

$fullUsername = $_POST['filename']; //ex. chris2
$username = substr($fullUsername, 0, strlen($fullUsername) - 1); //ex. chris
$number = substr($fullUsername, strlen($fullUsername) - 1, strlen($fullUsername) ); //ex. 2

$query = "SELECT * FROM members WHERE user='$username'";
		$result = mysqli_query($link, $query) or die(mysql_error());
		$row = mysqli_fetch_row($result);

$numberOfPics = $row[4]; //number of pics the user has

$i = $number; //number of file to be deleted e.g number is 6 in username6

//if deleting the last pic
if ($i == $numberOfPics)
{
	//unlink("C:/wamp64/www/Fun_Facts/images/" . $fullUsername . ".jpg");
        unlink("images/" . $fullUsername . ".jpg");

	/*Update the number of pics on the database*/
	$numberOfPics = $numberOfPics - 1;
	$query2 = "UPDATE members SET numberOfPics = '$numberOfPics' WHERE user='$username'";
	mysqli_query($link, $query2) or die(mysql_error());
}

while ($i < $numberOfPics)
{
	//$fileToBeCopied = "C:/wamp64/www/Fun_Facts/images/" . $username . ($i+1) . ".jpg";
        $fileToBeCopied = "images/" . $username . ($i+1) . ".jpg";

	//$fileToBeReplaced = "C:/wamp64/www/Fun_Facts/images/" . $username . ($i) . ".jpg";
        $fileToBeReplaced = "images/" . $username . ($i) . ".jpg";

	copy($fileToBeCopied, $fileToBeReplaced);
	$i++;
	if ($i == $numberOfPics)
	{
		//unlink("C:/wamp64/www/Fun_Facts/images/" . $username . ($i) . ".jpg");
                unlink("images/" . $username . ($i) . ".jpg");

		/*Update the number of pics on the database*/
		$numberOfPics = $numberOfPics - 1;
		$query2 = "UPDATE members SET numberOfPics = '$numberOfPics' WHERE user='$username'";
		mysqli_query($link, $query2) or die(mysql_error());
	}
}
		
?>