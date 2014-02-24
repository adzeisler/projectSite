<!DOCTYPE>

<html xml:lang="en" lang="en">

<head>

	<meta http-equiv="content-type" content="text/html; charset=utf-8" />
	<meta name="description" content="" />
	<meta name="keywords" content="" />
	<meta name="author" content="Andrew Zeisler" />

	<link rel="stylesheet" type="text/css" href="styles/style.css" media="screen" />

	<title>MY SUPER AWEOMSE PROJECT TRACKER</title>

</head>

<body>
	<div id="wrapper">


		<?php include('includes/header.php'); ?>

		

		<?php include('includes/sidebar.php'); ?>

		<?php 
$releaseID = 0;
$pidID = 0;
//foreach ($_GET as $temp) {
//	echo "this guy " . $temp;
//}

			if ($_GET == "0" ) {

				echo "<h3> Please select a Release</h3>";
			}
			elseif (isset($_GET['releaseID'])) {
			
				include ("includes/release.php");
			}
			elseif (isset($_GET['pidID'])) {
			
				include ("includes/pid.php");
			}
			elseif (isset($_GET['deliverableID'])) {
			
				include ("includes/deliverables.php");
			}


		?>


	</div> <!-- end of #wrapper -->

</body>

</html>
