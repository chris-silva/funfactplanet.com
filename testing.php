
<?php
$fullUsername = "admin3";
unlink("C:/wamp64/www/Fun_Facts/images/" . $fullUsername . ".jpg");


//unlink($fullUsername . "jpg");
/*
require_once "info.php";
$query = "SELECT * FROM members WHERE user='admin'";
		$result = mysqli_query($link, $query) or die(mysql_error());
		$row = mysqli_fetch_row($result);

$numberOfPics = $row[4];

echo $numberOfPics;
*/

/*
$u = "admin";
$i = 6;
echo $u . $i;
*/

/*
$fullUsername = "admin1";
$username = substr($fullUsername, 0, strlen($fullUsername) - 1);
echo $username;
$number = substr($fullUsername, strlen($fullUsername) - 1, strlen($fullUsername) );
echo $number;
*/

/*
require_once "info.php";
$query = "INSERT INTO members (user, pass, summary) VALUES ('h5', 'hhh', 'xxx')";
mysqli_query($link, $query);
*/

/*
$filename = "admin2";
$filename2 = "C:/wamp64/www/Fun_Facts/images/" . $filename . ".jpg"; //admin2.jpg
echo $filename2;
echo "<br>";
//bool rename ( string $oldname , string $newname [, resource $context ] )
$firstpic = "C:/wamp64/www/Fun_Facts/images/" .  substr($filename, 0, strlen($filename) - 1) . 10 . ".jpg";
echo $firstpic;
echo "<br>";
rename($filename2, $firstpic);
*/

//rename($filename, $firstpic, "C:/wamp64/www/Fun_Facts/images");
/*
$password = "grfrfrf";
$length = strlen( $password );

	for ( $i = 0; $i < $length; $i++ )
	{
		$character = $password{$i};
		
		if ( 
			!($character >= 'a' && $character <= 'z') &&
			!($character >= 'A' && $character <= 'Z') &&
			!($character >= '0' && $character <= '9') &&
			!( $character == '!' || $character == '@' || $character == '#' || $character == '%' || 
			   $character == '^' || $character == '&' || $character == '*' || $character == '<' ||
			   $character == '<' || $character == '>' || $character == '?'
			 )
		)
		{
			echo "false";
			break;
		}
	}
*/
//$day = date("z");
//echo $day;

/*
$i = 1;
for ( ; $i < 31; $i++)
{
	echo ( $i * 2 )% 900; 
	echo "<br>";
}
*/

?>