<?php
//session_start();
include_once "info.php";
//require_once "info.php";
require_once "top.php";


/*$queryX = "SELECT * FROM facts";
$resultX = mysql_query($queryX);
$rowsX = mysql_num_rows($resultX);*/

$resultX = mysqli_query($link, "SELECT * FROM facts");
$rowsX = mysqli_num_rows($resultX);

echo <<< _END

<h2>Welcome</h2>

<p>funfactplanet.com is an online community where fun fact enthusiasts can
congregate to find and share facts. If you wish to post a fact just sign in
and go to post facts.</p>

<script>
	
	var s;
	var max = '$rowsX';
	
	function ajaxRequest()
	{
		try // Non IE Browser?
		{
			var request = new XMLHttpRequest()
		}
		catch(e1)
		{
			try // IE 6+?
			{
				request = new ActiveXObject("Msxml2.XMLHTTP")
			}
			catch(e2)
			{
				try // IE 5?
				{
					request = new ActiveXObject("Microsoft.XMLHTTP")
				}
				catch(e3) // There is no Ajax Support
				{
					request = false
				}
			}
		}
	return request
	}
	
	function getRandomFact(totalNumofFacts)
	{
		params = "id=" + Math.floor((Math.random() * totalNumofFacts) );
		
		//params = "id=23";
		
		request = new ajaxRequest();
		request.open("POST", "ajaxServer1.php", true)
		request.setRequestHeader("Content-type", "application/x-www-form-urlencoded")
		request.setRequestHeader("Content-length", params.length)
		request.setRequestHeader("Connection", "close")
		
		request.onreadystatechange = function()
		{
			if (this.readyState == 4)
			{
				if (this.status == 200)
				{
					if (this.responseText != null)
					{
						//document.getElementById("info").innerHTML = this.responseText;
						s = this.responseText;
						//document.write("first: " + s);
						//f(this.responseText);
						//return this.responseText;
					}
					else alert("Ajax error: No data received")
				}
				else alert ( "Ajax error: " + this.statusText)
			}
		}
		request.send(params)
	}
//var c = document.getElementById("info");
//getRandomFact();

function f()
{
	return s;
}

var myWindow;
getRandomFact(max); 

function myFunction() {
	
	if (myWindow==null)
	{
		getRandomFact(max); 
		myWindow = window.open("", "", "width=250, height=300, left=" + getWindowPosition() + ", top= " + getWindowPosition() + "");
		myWindow.document.write("<html><head><title>popFact</title><style><link href='CSSstyles.css' rel='stylesheet' type='text/css' /></style></head><body style='background-image: url(" + "images/OH1Cf1c.jpg" + ");background-repeat: repeat-y;background-position: center;'></body></html>");
		myWindow.document.write("<p style='color:black; font-size: 7vh; background-color: white'>" + f() + "</p>");
		//setTimeout(function() { closeWin(); }, 10000); //close the window in 10 seconds
	}
	else
	{
		closeWin();
		getRandomFact(max); 
		myWindow = window.open("", "", "width=250, height=300, left=" + getWindowPosition() + ", top= " + getWindowPosition() + "");
		myWindow.document.write("<html><head><title>popFact</title><style><link href='CSSstyles.css' rel='stylesheet' type='text/css' /></style></head><body style='background-image: url(" + "images/OH1Cf1c.jpg" + ");background-repeat: repeat-y;background-position: center;'></body></html>");
		myWindow.document.write("<p style='color:black; font-size: 7vh; background-color: white'>" + f() + "</p>");
		//setTimeout(function() { closeWin(); }, 10000); //close the window in 10 seconds
	}
	
}

function closeWin() {
    myWindow.close();
}

function getWindowPosition()
{
	return Math.floor((Math.random() * 1000) + 1); 
}

</script>

<!-- <p id='info'></p> -->

<h4 style="text-align: center">Try our fun fact generator!</h4>
<div style="text-align: center">
<!-- <img onmouseover="myFunction()" onmouseout="closeWin()" border="0" src="images/ws_Space_Blue.jpg" alt="Question Mark" width="200" height="200"> -->
<img onclick="myFunction()"  border="0" src="images/ws_Space_Blue.jpg" alt="Question Mark" width="200" height="200">
</div>
_END;

echo "<br>";
echo "<h2>Most liked facts</h2>";


	/*$queryMostLiked = "SELECT * FROM facts ORDER BY likes DESC";
	$resultMostLiked = mysql_query($queryMostLiked);*/
	
	$resultMostLiked = mysqli_query($link, "SELECT * FROM facts ORDER BY likes DESC");
	
	for ($i = 0; $i < 5; $i++)
	{
		/*$container = mysql_result($resultMostLiked, $i, 'fact');
		$numOfLikes = mysql_result($resultMostLiked, $i, 'likes');*/
		
		$success = mysqli_data_seek($resultMostLiked, $i);
		$factRow = mysqli_fetch_row($resultMostLiked);
		
		/*mysqli_data_seek($resultMostLiked, $i);
		$category = mysqli_fetch_row($result);*/
		
		$CategoryOfMostLiked = mysqli_query($link, "SELECT * FROM categories WHERE id='$factRow[3]'");
		$CategoryName = mysqli_fetch_row($CategoryOfMostLiked);
		
		if ($success)
		{
			if ( $i % 2 == 0)
			{
				echo "<div style='background-color: lightblue '>" . $factRow[1] . "<br>" . "<div style='display:inline; background-color: white '>" . $factRow[4] . " Likes</div>" . " | Category: " . "<a href='FACTS.php?categories=$CategoryName[1]&		categoriesID=$CategoryName[0]'>" . $CategoryName[1] . "</a></div>" ;
			}
			else
			{
				echo "<div style='background-color: #dddddd '>" . $factRow[1] . "<br>" . "<div style='display:inline; background-color: white '>" . $factRow[4] . " Likes</div>" . " | Category: " . "<a href='FACTS.php?categories=$CategoryName[1]&		categoriesID=$CategoryName[0]'>" . $CategoryName[1] . "</a></div>" ;
			}
		}
		/*if ($numOfLikes)
			echo $container . "<br>" . $numOfLikes . "<br>";*/
	}
	mysqli_free_result($resultMostLiked);

require_once "bottom.php";
?>