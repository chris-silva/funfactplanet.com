 
  


</div>
  
  <div id='rightBanner'><!--Content for  id &quot;rightBanner&quot; Goes Here-->
  <?php
                echo "<div id='registration'>";
		require_once 'registration.php';
                echo "</div>";
	?>
	
	<div id='dailyFact'>
	<?php
		$queryForDailyFact = "SELECT * FROM facts";
		$resultForDailyFact = mysqli_query($link, $queryForDailyFact);
		if (!$resultForDailyFact) die("Database access failed: " . mysql_error());
		$numOfFacts = mysqli_num_rows($resultForDailyFact);
		//echo $numOfFacts;
		//echo "<br>";
		
		
		/*get highest value for id in facts*/
		$queryMax = "SELECT id FROM facts WHERE id=(select MAX(id) FROM facts)";
		$resultMax = mysqli_query($link, $queryMax);
		$rowForMaxFactID = mysqli_fetch_row($resultMax);
		$maxID = $rowForMaxFactID[0];
		//echo $maxID;
		
		
		$indexForDailyFact = (int)(time() / 86400) % $numOfFacts;
		
		//$indexForDailyFact = 130;
		//echo 'indexForDailyFact' . "$indexForDailyFact";
		
		$queryForDailyFact2 = "SELECT * FROM facts WHERE id='$indexForDailyFact'";
		$resultForDailyFact2 = mysqli_query($link, $queryForDailyFact2);
		
		if ( mysqli_num_rows($resultForDailyFact2) == 0)
		{

			while ( mysqli_num_rows($resultForDailyFact2) == 0)
			{
				//echo $indexForDailyFact;
				$indexForDailyFact = $indexForDailyFact + 1;
				
				if ($indexForDailyFact > $maxID)
				{
					$indexForDailyFact = 0;
				}
				
				$queryForDailyFact2 = "SELECT * FROM facts WHERE id='$indexForDailyFact'";
				$resultForDailyFact2 = mysqli_query($link, $queryForDailyFact2);
			}
				
		}
				
		//echo 'indexForDailyFact' . "$indexForDailyFact";
		
		while(!$resultForDailyFact2)
		{
			/*This number can't go higher than the highest id in facts
			because it will result in an infinite loop*/
			$indexForDailyFact++;
			
			if ($indexForDailyFact > $maxID)
			{
				$indexForDailyFact = 0;
			}
			
			$queryForDailyFact2 = "SELECT * FROM facts WHERE id='$indexForDailyFact'";
			$resultForDailyFact2 = mysqli_query($link, $queryForDailyFact2);
		}
		
		$queryForDailyFact3 = "SELECT * FROM facts WHERE id='$indexForDailyFact'";
		$resultForDailyFact3 = mysqli_query($link, $queryForDailyFact3);
		$dailyFact = mysqli_fetch_row($resultForDailyFact3);
		
		echo "<h1>Fact of the Day</h1>";
		echo 'fact #' . $dailyFact[0] . " " . $dailyFact[1];
		echo "<br>";
		echo "<br>";
		echo date("F j, Y");
	?>
	</div><!-- dailyFact -->
 </div> <!-- rightBanner -->
  <div id="Footer"> Privacy Policy | Sitemap | &copy; Fact Planet Productions </div>

  </div> <!-- mainContainer -->
  
</body>
</html>

