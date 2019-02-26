<?php

require_once 'info.php';
require_once "top.php";

	/*
	$db_server = mysql_connect($db_hostname, $db_username, $db_password);
	
	if (!$db_server) die("Unable to connect to MySQL: " . mysql_error());
	
	mysql_select_db($db_database)
		or die("Unable to select database: " . mysql_error());
*/
	//$query = "SELECT * FROM categories";
	$query = "SELECT * FROM categories ORDER BY category ASC";
	
	$result = mysqli_query($link, $query);
	
	if (!$result) die("Database access failed: " . mysql_error());
	
	$rows = mysqli_num_rows($result);		
		
	$j = 0;
	$firstLetter = ')';
	
	echo "<br>";
	
	echo "<br>" . "<h1>Categories<a name='top' id='top'></a></h1>";
	
	echo "<p>
	<a href='#a'>A</a> | <a href='#b'>B</a> | <a href='#c'>C</a> | 
	<a href='#d'>D</a> | <a href='#e'>E</a> | <a href='#f'>F</a> | 
	<a href='#g'>G</a> | <a href='#h'>H</a> | <a href='#i'>I</a> | 
	<a href='#j'>J</a> | <a href='#k'>K</a> | <a href='#l'>L</a> | 
	<a href='#m'>M</a> | <a href='#n'>N</a> | <a href='#o'>O</a> | 
	<a href='#p'>P</a> | <a href='#q'>Q</a> | <a href='#r'>R</a> | 
	<a href='#s'>S</a> | <a href='#t'>T</a> | <a href='#u'>U</a> | 
	<a href='#v'>V</a> | <a href='#w'>W</a> | <a href='#x'>X</a> | 
	<a href='#y'>Y</a> | <a href='#z'>Z</a></p>";
	
	for ( ; $j < $rows; $j++ )
	{
		//$num = mysql_result($result, $j, 'id');
		//$name = mysql_result($result, $j, 'category');
		
																											mysqli_data_seek($result, $j);
																												$categoriesRow = mysqli_fetch_row($result);
																												$num = $categoriesRow[0];
																												$name = $categoriesRow[1];

		if ( $name{0} != $firstLetter )
		{
			$firstLetter = $name{0};
			echo "<h1>". strtoupper($name{0}) . "<a name='$firstLetter' id= '$firstLetter'> <small><a href='#top'> back to top</a></small> </h1>";
			//$firstLetter = $name{0};
		}
		
		
		//echo "<a href='FACTS.php?categories=$name&categoriesID=$num'>". mysql_result($result, $j, 'category'). "</a>";
		echo "<a href='FACTS.php?categories=$name&categoriesID=$num'>". $name. "</a>";
		echo "<br>";
	}

	require_once 'bottom.php';
?>