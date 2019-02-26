<?php
include_once "info.php";
require_once "functions.php";
/*
$mys = "!fjkejjke42(";
$mys2 = "fdfdf3fede";
if ( preg_match("/[[0-9a-zA-Z][^-!\"#$%&'()*+,.\/:;<=>?@[\\\]^_{|}~]{10,16}/", $mys2 ) )
{
	echo "match";
}
else
{
	echo "not a match";
}
*/
$var = $_POST['id'];

$query = "SELECT * FROM facts WHERE id='$var'";
$result = mysqli_query($link, $query);
$row = mysqli_fetch_row($result);
echo $row[1];

?>