<?php
include_once "info.php";
//require_once "info.php";
require_once "top.php";

//require_once 'top.php';

if ( isset($_SESSION['user']) )
{
	$user = $_SESSION['user'];
	echo "<table><tr>
	<td><h1>$user</h1></td>
	<td><a href='editProfile.php'>edit<a/></td>
	</tr></table>";
	
	/*
	if ( file_exists("images/$user.jpg") )
	{
		echo "<p><img src='images/$user.jpg' border='1' float='left' /></p>";
	}
	else
	{
		echo "<img src='images/generic.jpg' />";	
		echo "<br />";
	}		
	*/
	
	echo <<< _END

	<script>

	var imageContainer;

	function imageChange(num)
	{
		imageContainer = "images/" + '$user' + num + ".jpg";
		document.getElementById("imageGallery").src = imageContainer;
	}

	</script>

_END;


	if ( file_exists("images//$user" . "1" . ".jpg") )
	{
		echo "<img id=" . 'imageGallery' . " src=" . 'images/' . $user . "1.jpg" .  " alt=" . '' . " ><br /><br /><hr>";
	}
	else
	{
		echo "<img src=images/generic.jpg /><br /><hr>";
	}


	echo "<br />";

	if ( file_exists("images//$user" . "1" . ".jpg") )
	{
		echo "<img src=images/" . "$user" . "1" . ".jpg " . "height=200 " . "width=150 " . " onclick= 'imageChange(1)' " . " />  ";
	}
	if ( file_exists("images//$user" . "2" . ".jpg") )
	{
		echo "<img src=images/" . "$user" . "2" . ".jpg " . "height=200 " . "width=150 " . " onclick= 'imageChange(2)' " . " />  ";
	}
	if ( file_exists("images//$user" . "3" . ".jpg") )
	{
		echo "<img src=images/" . "$user" . "3" . ".jpg " . "height=200 " . "width=150 " . " onclick= 'imageChange(3)' " . " />  ";
	}
	
	$query2 = "SELECT * FROM members summary WHERE user='$user'";
	$result = mysqli_query($link, $query2);
	$row = mysqli_fetch_row($result);
	
	//summary
	echo "<h2>Summary</h2>";
	echo  $row[3];
	echo "<br />";
	
	//facts
	$query3 = "SELECT * FROM facts fact WHERE author='$user'";
	$result2 = mysqli_query($link, $query3);
	$row2 = mysqli_num_rows($result2); //number of facts
	echo "<h2 id='fct'>" . $row2 . " facts posted by me" . "</h2>";
	
	$num2 = $row2;
	
	$i; //index of facts
	if (isset($_GET['start']))
	{
		$i = $_GET['start'];
		if ($i + 5 < $row2)
		$row2 = $i + 5;
	}
	else
	{
		$i = 0;
		if ($i + 5 < $row2)
		$row2 = $i + 5;
	}
	
	//displays facts
	for(; $i < $row2; $i++)
	{
		echo "<p>";
		echo ($i + 1) . ') ';
		
		//echo mysql_result($result2, $i, 'fact');
		mysqli_data_seek($result2, $i);
			$factsRow = mysqli_fetch_row($result2);
			//$fID = $factsRow[0];
			echo $factsRow[1];
		
		echo "</p>";
	}
	
	echo "<br><br><br>";
	
	//navigation bar
	$count = $num2 / 5;
	
	for ( $x = 0; $x < $count; $x++)
	{
		
		$num = $x + 1;
		$primero = $x * 5;	
		echo "<a href='profile.php?start=$primero#fct'>" .$num . "</a>";
		echo "\t";
	}
	echo "<br>";
/////////////////////////////// LIKES ///////////////////////////////////

//get the user id of the user in integer form
$query4 = "SELECT * FROM members id WHERE user='$user'";
$result4 = mysqli_query($link, $query4);
$idNum = mysqli_fetch_row($result4);
//echo $idNum[0];

//get the number of likes from the user
$query5 = "SELECT * FROM likes WHERE userid='$idNum[0]'";
$result5 = mysqli_query($link, $query5);
$numOfLikes = mysqli_num_rows($result5);

echo "<br><br><h2 id='lik'>" . "I have " . $numOfLikes . " likes</h2>";

$query6 = "SELECT facts.fact
FROM facts
INNER JOIN likes
ON facts.id=likes.factid WHERE likes.userid = '$idNum[0]'";
$result6 = mysqli_query($link, $query6);


//$likesLimit = 1;
if (isset($_GET['likesStart']))
{
	$l = $_GET['likesStart'];
	if ( $l + 5 < $numOfLikes)
		$likesLimitPerPage = $l + 5;
	else
		$likesLimitPerPage = $numOfLikes;
}
else
{
	$l = 0;
	if ( $l + 5 < $numOfLikes)
		$likesLimitPerPage = $l + 5;
	else
		$likesLimitPerPage = $numOfLikes;
}

//display likes
for(; $l < $likesLimitPerPage; $l++)
{
	echo "<p>";
	echo ($l + 1) . ') ';
	
	//echo mysql_result($result6, $l, 'fact');
	mysqli_data_seek($result6, $l);
			$joinedRow = mysqli_fetch_row($result6);
			echo $joinedRow[0];
	
	echo "</p>";
}

//navigation bar
$likesPageNumbers = $numOfLikes / 5;


	for ( $x = 0; $x < $likesPageNumbers; $x++)
	{
		
		$num = $x + 1;
		$primero = $x * 5;	
		//echo "<a href='profile.php?likesStart=$primero'>" .$num . "</a>";
		echo "<a href='profile.php?likesStart=$primero#lik'>" .$num . "</a>";
		echo "\t";
	}

/*********************************   Dislikes   ****************************/

$query7 = "SELECT * FROM dislikes WHERE userid='$idNum[0]'"; //$idNum[0] is the id # of the user (borrowed from likes above)
$result7 = mysqli_query($link, $query7);
$numOfDislikes = mysqli_num_rows($result7);

echo "<br><br><h2 id='dlik'>" . "I have " . $numOfDislikes . " dislikes</h2>";

$query8 = "SELECT facts.fact
FROM facts
INNER JOIN dislikes
ON facts.id=dislikes.factid WHERE dislikes.userid = '$idNum[0]'";
$result8 = mysqli_query($link, $query8);


if (isset($_GET['dislikesStart']))
{
	$t = $_GET['dislikesStart'];
	if ( $t + 5 < $numOfDislikes)
		$dislikesLimitPerPage = $t + 5;
	else
		$dislikesLimitPerPage = $numOfDislikes;
}
else
{
	$t = 0;
	if ( $t + 5 < $numOfDislikes)
		$dislikesLimitPerPage = $t + 5;
	else
		$dislikesLimitPerPage = $numOfDislikes;
}

//display dislikes
for(; $t < $dislikesLimitPerPage; $t++)
{
	echo "<p>";
	echo ($t + 1) . ') ';
	
	mysqli_data_seek($result8, $t);
			$joinedRow2 = mysqli_fetch_row($result8);
			echo $joinedRow2[0];
	
	echo "</p>";
}

//navigation bar
$dislikesPageNumbers = $numOfDislikes / 5;

	for ( $y = 0; $y < $dislikesPageNumbers; $y++)
	{
		
		$num2 = $y + 1;
		$primero2 = $y * 5;	
		//echo "<a href='profile.php?likesStart=$primero2#dlik'>" .$num2 . "</a>";
echo "<a href='profile.php?dislikesStart=$primero2#dlik'>" .$num2 . "</a>";
		echo "\t";
	}
/************************************Dislikes*******************************/


}
else
{
	echo "<br /><br />You must be logged in to use this page.";
}



/*
echo "<br><br><h2 onclick = getFacts()>" . "I have " . $numOfLikes . " likes</h2>";
echo <<< _JAVASCRIPT
<script>
</script>
_JAVASCRIPT;
*/

require_once "bottom.php";
?>