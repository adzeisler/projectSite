<?php
if (isset($_GET['pidID'])){
			$pidID=$_GET['pidID'];
			}
//connect and select a database
		$con = mysql_connect("localhost","root", "eatpoop");
		mysql_select_db("project");
// Check connection
if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }

$value = $_POST['pidID'];
$value1 = $_POST['note'];
$value2 = time();

$sql = "INSERT INTO `pids`(`pid`, `notes`) VALUES ('". $value. "', '$_POST[note]')";
//$sq l= "INSERT INTO 'pids' ('pid', 'notes') VALUES (\'" . $value . "','$_POST[note]');";


if (!mysql_query($sql))
  {
  die('Error: ' . mysql_error($con));
  }
echo "1 record added";

mysql_close($con);
?> 