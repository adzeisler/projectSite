<div id="content">
<?php
if ($_POST){
	
//connect and select a database
		$con = mysql_connect("localhost","root", "eatpoop");
		mysql_select_db("project");
// Check connection
if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }

$value = $_POST['pidID'];


if (isset($_GET['pidID'])){
			$pidID=$value;
			}
$sql = "INSERT INTO `pids`(`pid`, `notes`) VALUES ('". $value. "', '$_POST[note]')";


if (!mysql_query($sql))
  {
  die('Error: ' . mysql_error($con));
  }
  

mysql_close($con);
}
?> 

	<?php	if (isset($_GET['pidID'])){
			$pidID=$_GET['pidID'];
			}
	?>
	
	<p><?php echo "<h2>Project Notes</h2>"; 
		echo "<h3> PID: ". $pidID ; ?></p>

	<?php
		//connect and select a database
		mysql_connect("localhost","root", "eatpoop");
		mysql_select_db("project");
		



		//Run a query
		$sql = "SELECT * FROM `pids` WHERE `pid` = '".mysql_real_escape_string($pidID)."'";
		$result = mysql_query($sql);
		
		?>


	<?php

		if ($pidID != 0) {
		$rows = mysql_num_rows($result);

		if (  $rows > 0) {
			echo "<table>";
			echo " <tr>";
			//echo "	<th>PID</th>";
			echo "	<th style=\"text-align:left; text-indent:10px;\">Notes</th>";
			echo "	<th>Timestamp</th>";
			echo "</tr>";

				//loop through all table rows
			while ($row = mysql_fetch_array($result)) {
				echo "<tr>";

				//echo "<td>"  . $row['pid'] . " </td>";
				echo "<td style=\"text-align:left; text-indent:10px;\">" . $row['notes'] . "</td>";
				echo "<td>" . $row['timestamp'] . "</td>";
				echo "</tr>";
			}
			//free result memory and close DB connection
			mysql_free_result($result);
			mysql_close();
			
			echo "</table>";
		}
		else {

			echo "<h3> No Notes for this Project</h3>";

		}
	}


echo "<p>
<form action=\"index.php?pidID=$pidID\" method=\"post\">
New Note: <input type=\"text\" name=\"note\" size=\"75\" maxLength=\"250\">
<input type=\"hidden\" name=\"pidID\" value=\"$pidID\">
<input type=\"submit\" value=\"Add Note\">
</form>
</p>"
?>


</div> <!-- end of #content -->