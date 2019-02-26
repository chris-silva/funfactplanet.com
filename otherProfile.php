<?php
include_once "info.php";
require_once "top.php";
$user = $_GET['author'];
echo "<h1>$user</h1>";

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
	echo "<img src=images/generic.jpg /><br /><br /><hr>";
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

$query = "SELECT * FROM members summary WHERE user='$user'";
$result = mysqli_query($link, $query);
$row = mysqli_fetch_row($result);

echo "<h2>Summary</h2><br />";

echo $row[3];
require_once "bottom.php";
?>