
<?php

if (isset($_SESSION['user']))
{
	$user = $_SESSION['user'];
	echo "you are logged in as $user <br />";
	echo "click <a href='logout.php'>here</a> to log out";
}
else
{
echo  <<<_END
<form method='post' action='login.php'>
Username <input type='text' maxlength='16' name='user' />
<br>
Password <input type='password' maxlength='16' name='pass' />
<br>
<input type='submit' value='Login' />
</form>
Not a member? Sign in <a href='signup.php'>here.</a>
_END;


}

?>