<?php
        require_once 'info.php';
	require_once 'top.php';
	
	require_once 'functions.js';
	require_once 'functions.php';

	/*
	$db_server = mysqli_connect($db_hostname, $db_username, $db_password);
	
	if (!$db_server) die("Unable to connect to MySQL: " . mysql_error());
	

	mysqli_select_db($link, $db_database)
		or die("Unable to select database: " . mysql_error());
	*/
	//The $categories variable is initialized by $_Get[' '] on top.php
	
	echo "<h1>";
	echo $categories;
	echo "</h1>";
	
	$IDofCategory = $_GET['categoriesID'];
	//echo $IDofCategory;
	//$query = "SELECT * FROM facts WHERE category='$categories'";
	$query = "SELECT * FROM facts WHERE categories='$IDofCategory'";
	
	$result = mysqli_query($link, $query);
	
	if (!$result) die("Database access failed: " . mysql_error());
	
	$rows = mysqli_num_rows($result);  //change $fifth to $rows
	$fifth = $rows;
	
	/*$rows has the number of facts*/
	
	echo "<h2>There are $rows facts about $categories</h2>";
	
	if ( $fifth >= 5)
	$fifth = 4;
	else
	$fifth = $fifth - 1;
	
	
	$j = 0;
	if ( isset($_GET['first']) )
	{
		$j = $_GET['first'];
	}		
	if ( isset($_GET['fifth'] ) )
	{
		$fifth = $_GET['fifth'];
	}

/*
var fID = '$fID';
	document.write(fID);
	var u = '$u';
*/

$newNumberofLikes = "";
echo <<< _END
	<script>	
	var str;
	var str2;
	
	//this updates the number of likes in the database and outputs the new number of likes
	function process(A, B, factIndexRelativePage)
	{	
		if ( B !== 'undefined' )
		{
			str = f(A, B); // str is the new number of likes after the user clicks the likes button
			document.getElementById("change" + factIndexRelativePage).innerHTML = str;
			process3(A, B, factIndexRelativePage);
		}
		else
		{
			alert("you must be logged in to like a fact");
		}
	}
	
	//this only displays the number of likes
	function process2(A) { str = f2(A); return str; }
	
	//this changes the likes button
	function process3(A, B, C)
	{
		var liked = 0;
		liked = f3(A, B);
		if (liked == 1) { 
			B = "\"" + B + "\"";
			//document.getElementById("pink" + C) = "<img src='Pictures/thumbs-up-button.jpg' height='42' width='42' onclick= 'process(A, B, C )' style= 'border-width:5px; border-style:outset; border-color:#ff3399' />";
			//document.getElementById("pink" + C).innerHTML = "<img src='Pictures/thumbs-up-button.jpg' height='42' width='42'  style= 'border-width:5px; border-style:outset; border-color:#ff3399' onclick = 'process(A, B, C )' />";
			
			document.getElementById("pink" + C).innerHTML = "<img src='Pictures/thumbs-up-button.jpg' height='42' width='42'  style= 'border-width:5px; border-style:solid; border-color:#ff3399'  />";
			
		}
		else {
			document.getElementById("pink" + C).innerHTML = "<img src='Pictures/thumbs-up-button.jpg' height='42' width='42' />";
		}
	}
	
	//this updates the number of dislikes in the database and outputs the new number of dislikes
	function process4(A, B, factIndexRelativePage)
	{	
		if ( B !== 'undefined' )
		{
			//document.write("hello");
			str2 = f4(A, B); // str is the new number of dislikes after the user clicks the likes button
			document.getElementById("cambiar" + factIndexRelativePage).innerHTML = str2;
			process6(A, B, factIndexRelativePage);
			//document.write(str2);
		}
		else
		{
			alert("you must be logged in to dislike a fact");
		}
	}
	
	//this only displays the number of dislikes
	function process5(A)
	{
		str2 = f5(A); return str2;
	}
	
	//this changes the dislikes button
	function process6(A, B, C)
	{
		var disliked = 0;
		disliked = f6(A, B);
//document.write(disliked);
		if (disliked == 1) { 
			B = "\"" + B + "\"";
			document.getElementById("var57" + C).innerHTML = "<img src='Pictures/thumbs-down-button.jpg' height='42' width='42'  style= 'border-width:5px; border-style:solid; border-color:#ff3399'  />";
		}
		else {
			document.getElementById("var57" + C).innerHTML = "<img src='Pictures/thumbs-down-button.jpg' height='42' width='42' />";
		}
	}
	
	function process7(A, B, factIndexRelativePage)
	{
		if ( B !== 'undefined' )
		{
			document.getElementById("flagid" + factIndexRelativePage).innerHTML = "<img src='images/red_flag.png'  height='42' width='42' style='margin-left:2em;'  />";
			f7(A, B);
		}
		else
		{
			alert("you must be logged in to flag a fact");
		}
	}
	
	function returnS() { return str; }
	</script>
_END;
	
	for (  ; $j <= $fifth; ++$j)
	{
		$numero = $j + 1;
		echo "$numero. ";
		
		mysqli_data_seek($result, $j);
			$factsRow = mysqli_fetch_row($result);
			$fID = $factsRow[0];
			echo $factsRow[1];
		
		//echo mysql_result($result, $j, 'fact') . '<br />';
		
		//$fID = mysql_result($result, $j, 'id');
		$u = "";
				
		if (isset($_SESSION['user'])) 
		{
			$u = $_SESSION['user'];
		}
		else
		{
			$u = 'undefined';
		}
		
		//echo "fID: " . $fID . "<br />";
		
		echo "<table><tr>";
		
		
		//this works
		//echo "<td><img src='Pictures/thumbs-up-button.jpg' height='42' width='42' onclick= 'process($fID, "."\"" .$u. "\""." )'/></td><td> " . mysql_result($result, $j, 'likes') . "</td>";
/*
		 echo "<script> document.write( f3($fID, "."\"" .$u. "\""." ) )</script>";
		echo "<script> document.write('<p>' + 'hello' + '</p>') </script>";
		if (true) { 
			echo "<td><img src='Pictures/thumbs-up-button.jpg' height='42' width='42' onclick= 'process($fID, "."\"" .$u. "\""." , $j )' style= 'border-width:5px; border-style:outset; border-color:#ff3399' /></td>";
		}
		else {
			echo "<td><img src='Pictures/thumbs-up-button.jpg' height='42' width='42' onclick= 'process($fID, "."\"" .$u. "\""." , $j )'/></td>";
		}
*/
	// this works
		//echo "<td id='pink$j' ><img src='Pictures/thumbs-up-button.jpg' height='42' width='42' onclick= 'process($fID, "."\"" .$u. "\""." , $j )'/></td>";
		
		//picture for the likes
		echo "<td id='pink$j' onclick= 'process($fID, "."\"" .$u. "\""." , $j )'><img src='Pictures/thumbs-up-button.jpg' height='42' width='42' /></td>";
		
echo <<< _END2
	<script>
	process3('$fID', '$u', '$j');
		
	</script>
_END2;
	
		//right here
		//echo "<td> " . mysql_result($result, $j, 'likes') . "</td>";
		
		//this is the number of likes
		echo "<td><p id='change" . $j . "'> <script> document.write( process2($fID) ) </script> </p> </td>";
		
		//picture for the dislikes
		echo "<td id='var57$j' onclick= 'process4($fID, "."\"" .$u. "\""." , $j )'><img src='Pictures/thumbs-down-button.jpg' height='42' width='42' /></td><td> "; /* . mysql_result($result, $j, 'dislikes') . "  </td>"; */
		echo "<script>process6('$fID', '$u', '$j')</script>";
		
		
		//this is the number of dislikes
		//echo "<td><p id='cambiar" . $j . "'> <script> document.write( process5($fID) ) </script> </p> </td>";
		echo "<td><p id='cambiar$j'> <script> document.write( process5($fID) ) </script> </p> </td>";
		
		//if ( mysql_result($result, $j, 'flag') == 0)
		if ( $factsRow[6] == 0)
		{
			echo " <td id='flagid$j'><img src='images/white_flag_2.png' height='42' width='42' style='margin-left:2em;' onclick= 'process7($fID, "."\"" .$u. "\""." , $j )' /></td>";
		}
		else
		{
			echo " <td><img src='images/red_flag.png'  height='42' width='42' style='margin-left:2em;'  /></td>";
		}
		
		echo "<td>\t</td>";
		
		//echo "<td>" . "Posted by " . "<a href='otherProfile.php?author=" . mysql_result($result, $j, 'author') . " '>" . mysql_result($result, $j, 'author') . "</a></td>";
		echo "<td>" . "Posted by " . "<a href='otherProfile.php?author=" . $factsRow[2] . " '>" . $factsRow[2] . "</a></td>";
		
		//$author = mysql_result($result, $j, 'author');
		$author = $factsRow[2] . "1";
		if ( !file_exists("images//$author.jpg") )
			$author = "generic";
		
		echo "<td><img src='images/$author.jpg' border='1' height='42' width='42' /><td>";
		
		//echo "<td>|</td>";
		
		
		//datetime
		echo "<td>";
		if ( $factsRow[7] != null )
		{
			echo " on " . $factsRow[7];
		}
		echo "</td>";
		
		
echo "</tr></table>";		
		
		echo "<br />";
		echo "<br />";
		
	} //for

	//echo $newNumberofLikes;
	
	/*unlike c++, the / operator in php gives decimals. This operation is always going
	to yield either a whole integer or a decimal with only one digit after the decimal
	point.
	24 / 5 is going to yield 4.8
	25 / 5 is going to yield 5
	26 / 5 is goint to yield 5.2
	*/
		$count = $rows / 5;		
		
	/*	
		$leftover = $rows % 5;		//gives 3
		
		if ($leftover != 0)
			$count = $count + 1;
	*/
	
	/*This for loop is going to send through the url bar
	indexes of facts in the database. 
	ex 0 - 4, which would be facts 1 through 5
	ex 5 - 9, which would be facts 6 through 10
	ex 10 - 14, which would be facts 11 through 15*/
	for ( $x = 0; $x < $count; $x++)
	{
		$num = $x + 1;
		$primero = $x * 5 ;
		$quinto = 4 + $x * 5 ;
		if ($quinto >= $rows)
			$quinto = $rows - 1;
		
		echo "<a href='FACTS.php?categories=$categories&categoriesID=$IDofCategory&first=$primero&fifth=$quinto'>$num</a>";
		echo "\t";
	}
	
	require_once 'bottom.php';
?>