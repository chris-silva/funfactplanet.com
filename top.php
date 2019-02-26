<?php

//include "info.php";

if ( isset($_GET['categories']) )
{
	$categories = $_GET['categories'];
	//put $categories inside the title tag
}
?>

<html>

<!DOCTYPE html PUBLIC '-//W3C//DTD XHTML 1.0 Transitional//EN' 'http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd'>
<html xmlns='http://www.w3.org/1999/xhtml'>

<head>
<meta http-equiv='Content-Type' content='text/html; charset=utf-8' />
<!-- InstanceBeginEditable name='doctitle' -->
<title></title>
<!-- InstanceEndEditable -->
<style type='text/css'>
#Tablediv table {
	float: left;
}
</style>
<link href='CSSstyles.css' rel='stylesheet' type='text/css' />
<!-- InstanceBeginEditable name='head' -->
<!-- InstanceEndEditable -->

</head>

<body>


<div id='MainContainer'>
  <div id='topBanner'></div>
  
  <!--<div id='LogoHeader'><img src='Pictures/FunFactsLogo.jpg' width='424' height='113' />-->
  <div id='LogoHeader'><img src='Pictures/Planet-clipart-clipartfest-6.png' width='300' height='175' />
  </div>
  
  <div id='Header'>
    <h2>The Home For Fun Fact Aficionados<br />
	</h2>
  </div>
  
  <div id='NavBar'>
      <ul>
        <li><a href='index.php'>Home</a></li>
		<li><a href='profile.php'>My Profile</a></li>
		<li><a href='editProfile.php'>Edit My Profile</a></li>
		<li><a href='AtoZ.php'>Facts A-Z </a></li>
        <!-- <li><a href='../../AtoZ.html'>Facts A-Z </a></li> -->
		<li><a href='postFact.php'>Post Facts</a></li>
		 <!-- <li><a href='categories.html'>Categories</a></li> -->
       <li><a href='../../postCategory.php'>Post Categories</a></li>
        <li><a href='links.php'>Links</a></li>
        <li><a href='#'>About Us</a></li>
      </ul>
    </div> <!-- id='NavBar' -->
  
  <div id='Sidebar'>
	
	<?php
	
		echo "<h1 style='text-align: center'>" . "Popular" . "<br />" . "Categories" . "<br />" . "</h1>";
		$query = "SELECT * FROM categories ORDER BY numOfFacts DESC";
		$result = mysqli_query($link, $query);
		
		for ( $i = 0; $i < 10; $i++)
		{	
			mysqli_data_seek($result, $i);
			$category = mysqli_fetch_row($result);
			$id = $category[0];
			$cat = $category[1];
			$number = $category[2];
						
			if ( $i % 2 == 0)
			{
				echo "<div style='text-align: center; font-size: 150%; background-color: lightblue '><a href='FACTS.php?categories=$cat&categoriesID=$id'>" .  $cat . ' ' . $number . " <img src='images/facts.jpg' style='width:50px;height:25px;'></a><br></div>";
			}
			else
			{
				//echo "<div style='text-align: center; font-size: 150%; background-color: #dddddd '><a href='FACTS.php?categories=$cat&categoriesID=$id'>" .  $cat . ' ' . $number . " facts</a><br></div>";
				echo "<div style='text-align: center; font-size: 150%; background-color: #dddddd '><a href='FACTS.php?categories=$cat&categoriesID=$id'>" .  $cat . ' ' . $number . " <img src='images/facts.jpg' style='width:50px;height:25px;'></a><br></div>";
			}
		}
		mysqli_free_result($result);
		
		echo "<h1 style='text-align: center'>" . "Top" . "<br />" . "Members" . "<br />" . "</h1>";
		$query2 = "SELECT * FROM members ORDER BY factsPosted DESC";
		$result2 = mysqli_query($link, $query2);
		
		for ( $i = 0; $i < 5; $i++)
		{
			mysqli_data_seek($result2, $i);
			$memberRow = mysqli_fetch_row($result2);
			$username = $memberRow[1];
			$pic = $username . "1.jpg";
			if ( !file_exists("images/" . $pic) )
			{
				$pic = "generic.jpg";
			}
			
			echo "<img src='images/" . $pic . "' style='width:42px;height:42px;'>";
			//echo "  " . $username . "<br>";
			echo "<a href='otherProfile.php?author=" . $username . " '> " . $username . "</a><br>";
		}
		mysqli_free_result($result2);
	?>
	
	
	
     </div> <!-- Sidebar -->
  <!-- InstanceBeginEditable name='Main' -->
  <div id='Main'>

