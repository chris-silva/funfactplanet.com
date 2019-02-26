<?php
include_once "info.php";
require_once "top.php";
require_once "functions.php";

/*
function queryMysql($query)
{
	$result = mysqli_query($link, $query) or die(mysql_error());
	return $result;
}
*/

$error = "";

echo "<h2>Sign Up</h2>";

echo "<p>For username and password use alphanumeric characters
 or !, @, #, $, %, ^, &, *, <, > and ?. They must be 10 to 16 characters.</p>";

if ( isset($_POST['user']) )
{
	$user = $_POST['user'];
	$pass = $_POST['pass'];
	$pass2 = $_POST['pass2'];
	
	if ($user == "" || $pass == "" || $pass2 == "")
	{
		$error = "<span style='color:red'>Not all fields were entered.</span><br />";
	}
	else if ( checkInput( $user ) )
	{
	echo "<span style='color:red'>Invalid input for username.</span>";
	}
	else if ( $pass != $pass2 )
	{
		echo "<span style='color:red'>The passwords didn't match.</span>";
	}
	else if ( checkInput( $pass ) ) 
	{
		echo "<span style='color:red'>Invalid input for password.</span>";
	}
	else
	{
		
		if (!empty($_POST['userCode']) )
		{
			
			if ($_POST['userCode'] == $_POST['code'])
			{
				$query = "SELECT * FROM members WHERE user='$user'";
				$query2 = "SELECT * FROM members WHERE pass='$pass'";
				//if (mysqli_num_rows(queryMysql($query) ) )
				if ( mysqli_num_rows(mysqli_query($link, $query)) )
				{
					echo "<span style='color:red'>That username is already taken</span><br /><br />";
				}
				//else if ( mysqli_num_rows(queryMysql($query2)) )
				else if (mysqli_num_rows(mysqli_query($link, $query2)) )
				{
					echo "<span style='color:red'>That password is already taken</span><br /><br />";
				}
				else
				{
					$query = "INSERT INTO members(user, pass) VALUES('$user', '$pass')";
					//queryMysql($query);
					mysqli_query($link, $query);
					//die("<h4>Account created!</h4>Please Log in.");
                                        //echo "<h4>Account created</h4>";
                                        echo '<script type="text/javascript">alert("' . 'Account created!' . "\\n" . 'Please Log in.' . '")</script>';
				}
			}
			else
			{
				echo "<span style='color:red'>The codes did not match.</span>";
			}
			
		}
		else
		{
			echo "<span style='color:red'>No code was entered.</span>";
		}
		
	}
			
}


$one = rand(1,9);
$two = rand(0,9);
$three = rand(0,9);
$four = rand(0,9);
$five = rand(0,9);
$picOne = "<img src='Pictures/" . $one . ".jpg' alt=text'' height='42' width='22'";
$picTwo = "<img src='Pictures/" . $two . ".jpg' alt=text'' height='42' width='22'";
$picThree = "<img src='Pictures/" . $three . ".jpg' alt=text'' height='42' width='22'";
$picFour = "<img src='Pictures/" . $four . ".jpg' alt=text'' height='42' width='22'";
$picFive = "<img src='Pictures/" . $five . ".jpg' alt=text'' height='42' width='22'";
$code = $one * 10000 + $two * 1000 + $three * 100 + $four * 10 + $five;

echo <<< _END
	<table>
	<form method="post" action="signup.php"> $error
	<tr><td>Username <input type="text" maxlength="16" name="user"></td></tr>
	<tr><td>Password <input type="password" maxlength="16" name="pass"></td></tr>
	<tr><td>Re-enter Password <input type="password" maxlength="16" name="pass2"></td></tr>
	<tr>
	<td>
	<span>$picOne</span>
	<span>$picTwo</span>
	<span>$picThree</span>
	<span>$picFour</span>
	<span>$picFive</span>
	</td>
	</tr>
	<tr><td>Enter code <input type="number" maxlength="5" name="userCode"></td></tr>
	<tr><td><input type="hidden" name="code" value="$code"></td></tr>
	<tr><td><input type="submit" value="Sign up" /></td></tr>
	</form>
	</table>
	
_END;

require_once "bottom.php";
?>