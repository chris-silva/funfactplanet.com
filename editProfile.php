<?php
include_once "info.php";
require_once 'top.php';
require_once 'functions.js';

$typeok = true;

if ( isset($_SESSION['user']) )
{
	$user = $_SESSION['user'];
	echo "<h1>Edit Profile</h1>";
	echo "<h2>$user</h2>";
	

	if ( file_exists("images//$user" . "1" . ".jpg") )
	{
		echo "<img id=" . 'imageGallery' . " src=" . 'images/' . $user . "1.jpg" .  " alt=" . '' . " >";
		echo "<br>" . "<h3>Manage Pics</h3>";
	}
	else
	{
		echo "<img src=images/generic.jpg /><br />";
	}


	echo "<br />";
	
	echo "<table>";
	
	if ( file_exists("images//$user" . "1" . ".jpg") )
	{
		echo "<tr>";
		echo "<td><img src=images/" . "$user" . "1" . ".jpg " . "height=200 " . "width=150 " . "  /></td>";
		echo "<td><input type='checkbox' name='' value='' onclick= 'setMainPic(\"" . $user . "\", 1); reloadPage();'>Set as main<br> <input type='checkbox' name='' value='' onclick= 'deletePictures(\"" . $user . "\", 1); reloadPage();'>Delete</td>";
		echo "</tr>";
	}
	if ( file_exists("images//$user" . "2" . ".jpg") )
	{
		//https://stackoverflow.com/questions/27258989/passing-a-php-variable-as-a-parameter-using-html-onclick
		echo "<tr>";
		echo "<td><img src=images/" . "$user" . "2" . ".jpg " . "height=200 " . "width=150 " . "  /></td>";
		echo "<td><input type='checkbox' name='' value='' onclick= 'setMainPic(\"" . $user . "\", 2); reloadPage();'>Set as main<br> <input type='checkbox' name='' value='' onclick= 'deletePictures(\"" . $user . "\", 2); reloadPage();'>Delete</td>";
		echo "</tr>";
	}
	if ( file_exists("images//$user" . "3" . ".jpg") )
	{
		//echo "<img src=images/" . "$user" . "3" . ".jpg " . "height=200 " . "width=150 " . " onclick= 'imageChange(3)' " . " />  ";
		echo "<tr>";
		echo "<td><img src=images/" . "$user" . "3" . ".jpg " . "height=200 " . "width=150 " . "  /></td>";
		echo "<td><input type='checkbox' name='' value='' onclick= 'setMainPic(\"" . $user . "\", 3); reloadPage();'>Set as main<br> <input type='checkbox' name='' value='' onclick= 'deletePictures(\"" . $user . "\", 3); reloadPage();'>Delete</td>";
		echo "</tr>";
	}
	
	echo "</table>";
	
	if(isset($_POST['text']) )
	{
		$text = $_POST['text'];
		$query = "SELECT * FROM members WHERE user='$user'";
		$result = mysqli_query($link, $query) or die(mysql_error());
		//echo "here1";
		if ( mysqli_num_rows($result) )
		{
			$update = "UPDATE members SET summary='$text' WHERE user='$user'";
			mysqli_query($link, $update);
		}
		else
		{
			$insert = "INSERT INTO members VALUES('$text') WHERE user='$user'";
			return mysqli_query($link, $update) or die(mysql_error() );
		}
		echo "<meta http-equiv='refresh' content='0; profile.php' />";
	}
	
	$query2 = "SELECT * FROM members summary WHERE user='$user'";
	$result = mysqli_query($link, $query2);
	$row = mysqli_fetch_row($result);
	//$text = stripslashes($row[3]);
	$text = $row[3];
	//profile
	echo <<< _END
	<form method='post' action='editProfile.php' enctype='multipart/form-data'>
	upload an image:
		<input type='file' name='image' /><br />
	Enter or edit your details:<br />
		<textarea name='text' cols='40' rows='9'>$text</textarea><br />
	<input type='submit' value='save Profile' />
	</form>
	
_END;
	
	
	//if (isset($_FILES['image']['name']))
	//if (isset($_FILES['file']['image']))
	//if(!empty($_FILES))
	if( isset($_FILES['image']['tmp_name']) && $_FILES['image']['size'] > 0 )
	//if ( isset($_POST['image']) )
	{
		//echo $_FILES['image']['name'];
		//$saveto = "C:/wamp/www/Fun_Facts/images/" . "$user.jpg";
		
		/**************************July 24 2017**********************/
		$query3 = "SELECT * FROM members WHERE user='$user'";
		$result3 = mysqli_query($link, $query3) or die(mysql_error());
		$row3 = mysqli_fetch_row($result3);
		
		if ($row3[4] == 0)
		{
			//$saveto = "C:/wamp64/www/Fun_Facts/images/" . "$user" . "1.jpg";
                        $saveto = "images/" . "$user" . "1.jpg";
			$query4 = "UPDATE members SET numberOfPics = 1 WHERE user='$user'";
			mysqli_query($link, $query4) or die(mysql_error());
		}
		else if ($row3[4] == 1)
		{
			//$saveto = "C:/wamp64/www/Fun_Facts/images/" . "$user" . "2.jpg";
                        $saveto = "images/" . "$user" . "2.jpg";
			$query4 = "UPDATE members SET numberOfPics = 2 WHERE user='$user'";
			mysqli_query($link, $query4) or die(mysql_error());
		}
		else if ($row3[4] == 2)
		{
			//$saveto = "C:/wamp64/www/Fun_Facts/images/" . "$user" . "3.jpg";
                        $saveto = "images/" . "$user" . "3.jpg";
			$query4 = "UPDATE members SET numberOfPics = 3 WHERE user='$user'";
			mysqli_query($link, $query4) or die(mysql_error());
		}
		else
		{
			echo "<script>alert('The maximum number of pics to upload is 3.');window.location.replace('editProfile.php');</script>";
		}
		//$saveto = "C:/wamp64/www/Fun_Facts/images/" . "$user.jpg";
		//this names the image with the username 
			
		move_uploaded_file( $_FILES['image']['tmp_name'], $saveto);
			
		/*
		move_uploaded file
		1st parameter: The filename of the uploaded file.
		2nd parameter: The destination of the moved file.
		it seems that in the first parameter you use the actual name of the file and in
		the second parameter you give the path where you want to store the file and at
		the end of that path you give it a new name

		$_FILES["file"]["tmp_name"] - the name of the temporary copy of the file stored on the server
		*/
			
		switch($_FILES['image']['type'])
		{
			case "image/gif":  $src = imagecreatefromgif($saveto); break;	
			case "image/jpeg":
			case "image/pjpeg":  $src = imagecreatefromjpeg($saveto); break;
			case "image/png":  $src = imagecreatefrompng($saveto); break;
			default:  $typeok = FALSE; break;
		}
		
		//echo $saveto;
		//sleep(10);
		if($typeok)
		{
			
			list($w, $h) = getimagesize($saveto);
			/*
			The getimagesize() function will determine 
			the size of any given image file and return 
			the dimensions along with the file type and 
			a height/width text string to be used inside 
			a normal HTML IMG tag and the correspondant HTTP content type.
						
			Returns an array with up to 7 elements.
			Index 0 and 1 contains respectively the width and the height of the image.
						
			list($width, $height, $type, $attr) = getimagesize("img/flag.jpg");
						
			list — Assign variables as if they were an array
			Like array(), this is not really a function, but a language construct. 
			list() is used to assign a list of variables in one operation.
			*/
					
			//$max = 200;
			$max = 400;
			$tw = $w;
			$th = $h;
					
			echo "<script>document.write('hello');</script>";		
					
			if ($w > $h && $max < $w)
			{
				$th = $max / $w * $h;
				$tw = $max;
				
			}
			else if ($h > $w && $max < $h)
			{
				$tw = $max / $h * $w;
				$th = $max;
			}
			else if ($max < $w)
			{
				$tw = $th = $max;
			}
			$tmp = imagecreatetruecolor($tw, $th);
			//$tmp2 = imagecreatetruecolor(40, 40);
			//imagecreatetruecolor() returns an image 
			//identifier representing a black image of the specified size.
					
			imagecopyresampled($tmp, $src, 0, 0, 0, 0, $tw, $th, $w, $h);
			/*imagecopyresampled() copies a rectangular portion of one image
			to another image, smoothly interpolating pixel values so that, 
			in particular, reducing the size of an image still retains a great 
			deal of clarity.
					
			1st parameter: Destination image link resource.
			2nd parameter: Source image link resource.
			*/
					
			imageconvolution($tmp, array( //Sharpen image
			array(-1, -1, -1),
			array(-1, 16, -1),
			array(-1, -1, -1) ),
				8, 0);
			//Applies a convolution matrix on the image, using the given coefficient and offset.
					
			imagejpeg($tmp, $saveto);
			imagedestroy($tmp);
			imagedestroy($src);
		}
			
	}
		
	echo "<br /><hr><br />"; 
	/*********************************************************************************************/
	//facts
	$query6 = "SELECT * FROM facts fact WHERE author='$user'";
	$result5 = mysqli_query($link, $query6);
	$row2 = mysqli_num_rows($result5); //number of facts
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
		//echo "<p id='var56'>";
		echo "<p id='var" . $i . "'>";
		echo ($i + 1) . ') ';
		
		mysqli_data_seek($result5, $i);
			$factsRow = mysqli_fetch_row($result5);
			
			echo $factsRow[1];
			$ff = addslashes( $factsRow[1] );
			
			//https://www.youtube.com/watch?v=3BHiy1ZO3oc
			//echo "<br><span id=\"editLink\" onclick=\"setUpTextBox($i, '$ff' )\" style=\"color:blue;text-decoration: underline;\">edit        </span>";
			echo "<br><span id='editLink" . $i . "' onclick=\"setUpTextBox($i, '$ff' )\" style=\"color:blue;text-decoration: underline;\">edit        </span>";
			
			//echo "<br><span onclick='setUpTextBox(" . $i . "," . "\"" . $ff . "\"" . ")' style='color:blue;text-decoration: underline;'>edit</span>";
			//echo "<br><span onclick='setUpTextBox(" . $i . "," .  "bb\\\'b" . ")' style='color:blue;text-decoration: underline;'>edit</span>";
			
		echo "</p>";
	}
	
	echo "<br><br><br>";
	
	//navigation bar
	$count = $num2 / 5;
	
	for ( $x = 0; $x < $count; $x++)
	{
		
		$num = $x + 1;
		$primero = $x * 5;	
		echo "<a href='editProfile.php?start=$primero#fct'>" .$num . "</a>";
		echo "\t";
	}
	echo "<br>";
/////////////////////////////// LIKES ///////////////////////////////////

//get the user id of the user in integer form
$query7 = "SELECT * FROM members id WHERE user='$user'";
$result7 = mysqli_query($link, $query7);
$idNum = mysqli_fetch_row($result7);
//echo $idNum[0];

//get the number of likes from the user
$query8 = "SELECT * FROM likes WHERE userid='$idNum[0]'";
$result8 = mysqli_query($link, $query8);
$numOfLikes = mysqli_num_rows($result8);

echo "<br><br><h2 id='lik'>" . "I have " . $numOfLikes . " likes</h2>";

$query9 = "SELECT facts.fact
FROM facts
INNER JOIN likes
ON facts.id=likes.factid WHERE likes.userid = '$idNum[0]'";
$result9 = mysqli_query($link, $query9);


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
	mysqli_data_seek($result9, $l);
			$joinedRow = mysqli_fetch_row($result9);
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
		echo "<a href='editProfile.php?likesStart=$primero#lik'>" .$num . "</a>";
		echo "\t";
	}

/*********************************   Dislikes   ****************************/

$query10 = "SELECT * FROM dislikes WHERE userid='$idNum[0]'"; //$idNum[0] is the id # of the user (borrowed from likes above)
$result10 = mysqli_query($link, $query10);
$numOfDislikes = mysqli_num_rows($result10);

echo "<br><br><h2 id='dlik'>" . "I have " . $numOfDislikes . " dislikes</h2>";

$query11 = "SELECT facts.fact
FROM facts
INNER JOIN dislikes
ON facts.id=dislikes.factid WHERE dislikes.userid = '$idNum[0]'";
$result11 = mysqli_query($link, $query11);


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
	
	mysqli_data_seek($result11, $t);
			$joinedRow2 = mysqli_fetch_row($result11);
			echo $joinedRow2[0];
	
	echo "</p>";
}

//navigation bar
$dislikesPageNumbers = $numOfDislikes / 5;

	for ( $y = 0; $y < $dislikesPageNumbers; $y++)
	{
		
		$num2 = $y + 1;
		$primero2 = $y * 5;	
		//echo "<a href='editProfile.php?likesStart=$primero2#dlik'>" .$num2 . "</a>";
echo "<a href='editProfile.php?dislikesStart=$primero2#dlik'>" .$num2 . "</a>";
		echo "\t";
	}
/*****************************************Dislikes***************************************/
	
}
else
{
	echo "<br /><br />You must be logged in to use this page.";
}

require_once "bottom.php";
?>