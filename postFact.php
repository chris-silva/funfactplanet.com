<?php
include_once "info.php";
require_once 'top.php';
//require_once 'info.php';

if ( isset($_SESSION['user']) )
{
	$query = "SELECT * FROM categories ORDER BY category ASC";
	
	$result = mysqli_query($link, $query);
	
	if (!$result) die("Database access failed: " . mysqli_error($link));
	
	$rows = mysqli_num_rows($result);
	
	echo "<form method='post' action='postFactProcessor.php'>";
		
	echo "Select category for fact: <select name = 'selection'>";
	
	for ( $i = 0; $i < $rows; $i++)
	{
		mysqli_data_seek($result, $i);
		$categoriesRow = mysqli_fetch_row($result);
		//$selection = mysql_result($result, $i, 'category');
		//echo "<option value=' " . mysql_result($result, $i, 'id') . " '> " . mysql_result($result, $i, 'category') . "</option>";
		//$selection = $categoriesRow[1];
		echo "<option value=' " . $categoriesRow[0] . " '> " . $categoriesRow[1] . "</option>";
	}
	echo "</select>";
	
	echo "<br /><br />Not finding the category that your were looking for? Add a new category here.";
	
	echo <<< _END
	<br />
	<br />
	Write fact: 
	<br />
	<textarea name="message" rows="10" cols="30"></textarea>
	<br />
_END;

	echo "<input type='submit' value='submit' /></form>";
}
else
{
	echo "You need to be logged in to post facts";
}

require_once "bottom.php";

?>


