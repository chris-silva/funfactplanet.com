<?php

//include "info.php";
require_once "info.php";
//session_start();
//$link2 = $link;
/*
function queryMysql($query)
{
	$result = mysqli_query($link2, $query) or die(mysql_error());
	return $result;
}
*/
if ( !is_null($_POST['user']) && !is_null($_POST['pass']))
{
	$user = $_POST['user'];
	$pass = $_POST['pass'];
	/*
	if ($user == "" || $pass == "")
	{
		echo "not all fields were entered";
	}
	*/
	
		$query = "SELECT user, pass FROM members
			WHERE BINARY user='$user' AND pass = '$pass'";
		//if(mysqli_num_rows(queryMysql($query)) == 0)
		if(mysqli_num_rows( mysqli_query($link, $query) ) == 0 )
		{
			echo "<h1>Invalid username or password</h1>";
			echo "<meta http-equiv='refresh' content='2; url=index.php' />";
		}
		else
		{
			$_SESSION['user'] = $user ;
			$_SESSION['pass'] = $pass ;
			echo "<h1>Login Succesful.</h1>";
			echo "<meta http-equiv='refresh' content='2; url=index.php' />";
		}
	
}
else
{
	echo "<h1>Not all fields were entered.</h1>";
	echo "<meta http-equiv='refresh' content='2; url=index.php' />";
}
echo "<br>";
//echo "Click <a href='HOME.php'>here</a> ";

?>