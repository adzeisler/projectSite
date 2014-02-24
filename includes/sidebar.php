		<div id="sidebar">
			<!-- <h3>Navigation</h3>
				<li><a href='#'>Home</a></li>
				<li><a href='#'>About Us</a></li>
				<li><a href='#'>Links</a></li>
				<li><a href='#'>Portfolio</a></li>
				<li><a href='#'>Contact</a></li> -->


	<?php
		//connect and select a database
		mysql_connect("localhost","root", "eatpoop");
		mysql_select_db("project");

		//Run a query
		$result = mysql_query("SELECT * FROM releases");

		?>

		<table>
			<h3> <tr>
				<th>Release</th>
				<th>Version</th>
			</h3> </tr>
		
			<?php
				//loop through all table rows
			while ($row = mysql_fetch_array($result)) {
				echo "<tr>";
				echo "<td>" ;
				echo "<a href='index.php?releaseID=".$row['releaseNo'] . "'>"  .  $row['releaseNo']."</a>  </td>";
				echo "<td>" . $row['version'] . "</td>";
				echo "</tr>";
			}
			//free result memory and close DB connection
			mysql_free_result($result);
			mysql_close();
			?>
			
		</table>




		</div> <!-- end of #sidbar -->