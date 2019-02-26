<?php
include_once 'info.php';
require_once 'top.php';

require_once 'functions.php';

$User = $_SESSION['user'];
$Category = $_POST["selection"]; //this is a number
$Fact = $_POST['message'];

//echo "Category: " . $Category . "<br>";
//echo "Fact: " . $Fact . "<br>";

$Fact = addslashes($Fact);
$date = date('Y-m-d H:i:s');

$query = "INSERT INTO facts(fact, author, categories, likes, dislikes, flag, dt) VALUES ('$Fact', '$User', '$Category', 0, 0, 0, '$date')";
$result = mysqli_query($link, $query);

//update numOfFacts in categories table	
$query2 = "SELECT * FROM categories WHERE id = '$Category'";
$result2 = mysqli_query($link, $query2);
$row = mysqli_fetch_row($result2);	
$num = $row[2] + 1;
$query3 = "UPDATE categories SET numOfFacts = '$num' WHERE id = '$Category';";
$result3 = mysqli_query($link, $query3);

//update factsPosted from members table
$query4 = "SELECT * FROM members where user='$User'";
$result4 = mysqli_query($link, $query4);
$row4 = mysqli_fetch_row($result4);
$num4 = $row4[5] + 1;
$query5 = "UPDATE members SET factsPosted = '$num4' WHERE user = '$User'";
$result5 = mysqli_query($link, $query5);

if (!$result && !$result2 && !$result3 && !$result4 && !$result5)
{ 
	die("Database access failed: " . mysqli_error($link) );
}
else
{
	echo "Fact was posted succesfully!";
	
	$query6 = "SELECT * FROM facts WHERE categories='$Category'";
	$result6 = mysqli_query($link, $query6);
	$lastIndex = mysqli_num_rows($result6);
	//echo "lastIndex: " . $lastIndex . "<br>";
	
	$query7 = "SELECT * FROM categories WHERE id='$Category'";
	$result7 = mysqli_query($link, $query7);
	$cat = mysqli_fetch_row($result7); //the category in string form
	$cate = $cat[1];
	
	$lastIndex = $lastIndex - 1;
	$firstIndex = getFirstIndex($lastIndex);
	
	if ( !$result6  && !$result7 )
	{
		die("Database access failed: " . mysqli_error($link) );
	}
	else
	{
		echo "<meta http-equiv='refresh' content='3; url=FACTS.php?categories=$cate&categoriesID=$Category&first=$firstIndex&fifth=$lastIndex' />";
	}
	
}
require_once "bottom.php";
?>