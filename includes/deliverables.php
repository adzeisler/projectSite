<div id="content">


		<?php 

		if ($_POST){
		$deliverableID=$_GET['deliverableID'];
		

		echo "<p> <h2>Delivery Dates for PID:  " . $deliverableID ."</h2> </p> ";

		//connect and select a database
		//mysql_connect("localhost","root", "eatpoop");
		//mysql_select_db("project");
		

		//connect and select a database
		$con = mysql_connect("localhost","root", "eatpoop");
		mysql_select_db("project");
		// Check connection
		if (mysqli_connect_errno())
		  {
		  echo "Failed to connect to MySQL: " . mysqli_connect_error();
		  }
		//echo $deliverableID;

		$value = $_POST['deliverableID'];


		if (isset($_GET['deliverableID'])){
					$deliverableID=$value;
					}
		
		//Run a query
		$sql = "SELECT * FROM `deliverables` WHERE `pid` = '".mysql_real_escape_string($deliverableID)."'";
		$result = mysql_query($sql);

		$rows = mysql_num_rows($result);
		if (  $rows > 0)
		{

			$sql = "UPDATE `deliverables` SET  `$_POST[columnName]`='$_POST[note]' WHERE `pid`= '$value'";
			

		}
		else
		{
			echo "you failed";
			$sql = "INSERT INTO `deliverables` (`pid`, `$_POST[columnName]` ) VALUES ('". $value. "', '$_POST[note]')";
		}
		
		if (!mysql_query($sql))
		  {
		  die('Error: ' . mysql_error($con));
		  }
		  

		mysql_close($con);

	}

	;

		if (isset($_GET['deliverableID'])){
			$deliverableID=$_GET['deliverableID'];
			}

		echo "<h2>Delivery Dates for PID: ". $deliverableID."</h2>";

	//connect and select a database
		mysql_connect("localhost","root", "eatpoop");
		mysql_select_db("project");

		//Run a query
		$sql = "SELECT * FROM `deliverables` WHERE `pid` = '".mysql_real_escape_string($deliverableID)."'";
		$result = mysql_query($sql);

		$rows = mysql_num_rows($result);
		if (  $rows > 0) {
		
		$adapter;
		$backend;
		$aid;
		$design;
		$dev;
		$code;
		

		echo "<table>";
		echo "	<tr>";
		//echo "		<th>PID</th>";
		echo "		<th>Adapter Date</th>";
		echo "		<th>Backend Date</th>";
		echo "		<th>AID Date</th>";
		echo "		<th>Design Package Date</th>";
		echo "		<th>Dev Package Date</th>";
		echo "		<th>Code Drop Date</th>";
		//echo "		<th>Notes</th>";
		echo "	</tr>";

			
				//loop through all table rows
			while ($row = mysql_fetch_array($result)) {
				echo "<tr>";
			//	echo "<td>"  . $row['pid'] . " </td>";
				echo "<td>" . $row['adapter'] . "</td>";
				$adapter = $row['adapter'];
				echo "<td>" . $row['backend'] . "</td>";
				$backend = $row['backend'];
				echo "<td>"  . $row['aid'] . " </td>";
				$aid = $row['aid'];
				echo "<td>" . $row['design'] . "</td>";
				$design = $row['design'];
				echo "<td>" . $row['dev'] . "</td>";
				$dev = $row['dev'];
				echo "<td>" . $row['code'] . "</td>";
				$code = $row['code'];
			//	echo "<td>" . $row['notes'] . "</td>";
				echo "</tr>";
			}
			//free result memory and close DB connection
			mysql_free_result($result);
			mysql_close();
			
		echo "</table>";
	}
	else {
	echo "<p> Please set up the Delivery Dates </p>";
}


if (empty($adapter))
{

echo "<p>
<form action=\"index.php?deliverableID=$deliverableID\" method=\"post\">
Adapter Date <input type=\"text\" name=\"note\" size=\"25\" maxLength=\"250\">
<input type=\"hidden\" name=\"deliverableID\" value=\"$deliverableID\">
<input type=\"hidden\" name=\"columnName\" value=\"adapter\">
<input type=\"submit\" value=\"Add Date\">
</form>
</p>";
}

if (empty($backend))
{
echo "<p>
<form action=\"index.php?deliverableID=$deliverableID\" method=\"post\">
Backend Date <input type=\"text\" name=\"note\" size=\"25\" maxLength=\"250\">
<input type=\"hidden\" name=\"deliverableID\" value=\"$deliverableID\">
<input type=\"hidden\" name=\"columnName\" value=\"backend\">
<input type=\"submit\" value=\"Add Date\">
</form>
</p>";
}

if (empty($aid))
{
echo "<p>
<form action=\"index.php?deliverableID=$deliverableID\" method=\"post\">
AID Date <input type=\"text\" name=\"note\" size=\"25\" maxLength=\"250\">
<input type=\"hidden\" name=\"deliverableID\" value=\"$deliverableID\">
<input type=\"hidden\" name=\"columnName\" value=\"aid\">
<input type=\"submit\" value=\"Add Date\">
</form>
</p>";
}

if (empty($design))
{
echo "<p>
<form action=\"index.php?deliverableID=$deliverableID\" method=\"post\">
Design Date <input type=\"text\" name=\"note\" size=\"25\" maxLength=\"250\">
<input type=\"hidden\" name=\"deliverableID\" value=\"$deliverableID\">
<input type=\"hidden\" name=\"columnName\" value=\"design\">
<input type=\"submit\" value=\"Add Date\">
</form>
</p>";
}

if (empty($dev))
{
echo "<p>
<form action=\"index.php?deliverableID=$deliverableID\" method=\"post\">
Dev Package Date <input type=\"text\" name=\"note\" size=\"25\" maxLength=\"250\">
<input type=\"hidden\" name=\"deliverableID\" value=\"$deliverableID\">
<input type=\"hidden\" name=\"columnName\" value=\"dev\">
<input type=\"submit\" value=\"Add Date\">
</form>
</p>";
}

if (empty($code))
{
echo "<p>
<form action=\"index.php?deliverableID=$deliverableID\" method=\"post\">
Code Drop Date <input type=\"text\" name=\"note\" size=\"25\" maxLength=\"250\">
<input type=\"hidden\" name=\"deliverableID\" value=\"$deliverableID\">
<input type=\"hidden\" name=\"columnName\" value=\"code\">
<input type=\"submit\" value=\"Add Date\">
</form>
</p>";
}
?>


<h2> TODO:: Add Button to edit dates</h2>
</div> <!-- end of #content -->