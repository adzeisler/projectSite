
<div id="content">

	<p><?php echo "<h2>Projects By Release</h2> "; ?>
	</p>

	<?php

		//connect and select a database
		mysql_connect("localhost","root", "eatpoop");
		mysql_select_db("project");
		
		if (isset($_GET['releaseID'])){
			$releaseID=$_GET['releaseID'];
			echo "<h3> $releaseID </h3>";
		}

				
		//Run a query
		$sql = "SELECT * FROM `projects` WHERE `releaseNo` = '".mysql_real_escape_string($releaseID)."'";
		$result = mysql_query($sql);
		
		?>
	<?php

	if ($releaseID != 0) {
		$rows = mysql_num_rows($result);
		if (  $rows > 0) {
			echo "<table> ";
			echo	"<tr>";
			echo "  	<th>PID</th> ";
			//echo "		<th>Release</th>";
			echo "		<th>Services</th>";
			echo "		<th>Backends</th>";
			echo "		<th>Developer</th>";
			//echo "		<th>Links</th>";
			//echo "		<th>Notes</th>";
			echo " 		<th>Delivery Dates";
			echo "	</tr>";

			
				//loop through all table rows
			while ($row = mysql_fetch_array($result)) {
				echo "<tr>";
				echo "<td>";
				echo "<a href=index.php?pidID=" . $row['pid']. ">" . $row['pid'] . "</a> </td>";
				//echo "<td>" . $row['releaseNo'] . "</td>";
				echo "<td>" . $row['services'] . "</td>";
				echo "<td>" . $row['backends'] . "</td>";
				echo "<td>" . $row['developer'] . "</td>";
				echo "<td> <a href=index.php?deliverableID=" . $row['pid']. ">" . "Click Here</a> </td>";
				//echo "<td>" . $row['links'] . "</td>";
				//echo "<td>" . $row['notes'] . "</td>";
				echo "</tr>";
			}
		
			//free result memory and close DB connection
			mysql_free_result($result);
			mysql_close();
			
			
	echo "</table>";
		}
		else {

	echo "<h3> No Projects for this Release</h3>";
		}
	}
	else {
	echo "<h3> <--- Please Select a Release </h3>";
}
?>


<h2> TODO:: Add Button to Add/edit/delete PIDs</h2>
</div> <!-- end of #content -->