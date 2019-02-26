<?php
include_once 'info.php';
include_once "top.php";
	
	if (isset($_POST['category']))
	{
		$Category = $_POST['category'];
		$query = "INSERT INTO categories(category, numOfFacts) VALUES ('$Category', 0)";
		$result = mysqli_query($link, $query);
		if ($result)
		{
			echo "Category posted successfully.";
		}
		else
		{
			echo "There was an error posting category.";
		}
	}	
	else if (isset($_SESSION['user']))
	{
echo  <<<_END
		<form method='post' action='postCategory.php'>
		Category <input type='text' maxlength='16' name='category' />
		<br>

		<input type='submit' value='Post Category' />
		</form>
_END;
	}
	else
	{
		echo "You must be logged in to post a category.";
	}
	
include_once "bottom.php"
?>