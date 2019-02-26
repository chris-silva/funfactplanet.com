
<?php
require_once "info.php";

//to determine what to query in facts ex (search facts 15 - 19 )
function getFirstIndex ($num1 )
{	
	//$num1 = 69; // 60, 63, 64, 65, 67, 69
	$digitCount = 0;
	$lastDigit = 0;
	$firstDigit = 0;
	$index1 = 0; $index2 = 0;

	$temp = $num1;
	while ( $temp != 0 )
	{
		$temp = (int)($temp/10);
		$digitCount++;
	}
	
	if ($digitCount == 1)
	{
		if ( $num1 >= 0 && $num1 < 5 )
			return 0;
		if ( $num1 >= 5 && $num1 <= 9 )
			return 5;
	}

	$lastDigit = $num1 % 10;
	
	$firstDigit = (int)( $num1 / pow( 10, $digitCount - 1 ) );
	
	
	$result;
	if ( $lastDigit >= 0 && $lastDigit < 5 )
	{
		while ($digitCount > 1)
		{
			$result = $firstDigit * pow( 10, $digitCount - 1 );
			$index1 = $index1 + $result;
			$digitCount--;
			$num1 = $num1 - $result;
			$firstDigit = (int)( $num1 / pow( 10, $digitCount - 1 ) );
		}
		
	}
	if ( $lastDigit >= 5 && $lastDigit <= 9 )
	{
		while ($digitCount > 1)
		{
			$result = $firstDigit * pow( 10, $digitCount - 1 );
			$index1 = $index1 + $result;
			$digitCount--;
			$num1 = $num1 - $result;
			$firstDigit = (int)( $num1 / pow( 10, $digitCount - 1 ) );
		}
		$index1 = $index1 + 5;
		
	}
	return $index1;
	
}

/////////////////////////////////////////////////////////////////////////////////////////////////

function checkInput( $password )
{
	$length = strlen( $password);
	
	if ( $length < 10 || $length > 16 )
	{
		
		return true;
	}
	
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
			return true;
		}
	}
	
	return false;
	
	
}


function select($tableName)
{
		$query = "SELECT * FROM '$tableName'";
		mysqli_query($link, $query);
}

?>