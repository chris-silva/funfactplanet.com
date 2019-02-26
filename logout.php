<?php
//require_once "info.php";
include "info.php";

/*
Functions that send/modify HTTP headers must be invoked before any output is made. summary below Otherwise the call fails:
echo "<h3>Log Out</h3>";
*/

if (isset( $_SESSION['user']) )
{
	destroySession();
	echo "You have been logged out. Please
	<a href='index.php'>Click here</a> to
	refresh the screen.";
}
else
{ 
	echo "You are not logged in";
}

function destroySession()
{
	$_SESSION=array();

	if (session_id() != "" || isset($_COOKIE[session_name()]))
	{
		setcookie(session_name(), '', time()-2592000, '/');

		session_destroy();
	}

}


?>