<?php
//require_once "info.php";
include_once "info.php";

$userPicNum = $_POST['filename'];

//$picTemp = "C:/wamp64/www/Fun_Facts/images/" . substr($userPicNum, 0, strlen($userPicNum) - 1) . "temp.jpg";
$picTemp = "images/" . substr($userPicNum, 0, strlen($userPicNum) - 1) . "temp.jpg";

$usernameWithoutPicNum = substr($userPicNum, 0, strlen($userPicNum) - 1);  

//$userPicNum = "C:/wamp64/www/Fun_Facts/images/" . $userPicNum . ".jpg";
$userPicNum = "images/" . $userPicNum . ".jpg";

copy($userPicNum, $picTemp);

//$firstPic = "C:/wamp64/www/Fun_Facts/images/" . $usernameWithoutPicNum . "1.jpg";
$firstPic = "images/" . $usernameWithoutPicNum . "1.jpg";

rename($firstPic, $userPicNum);
rename($picTemp, $firstPic);

?>