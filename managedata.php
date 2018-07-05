<?php

 ob_start();
 session_start();
 include 'config.php';
 require_once 'database_connect.php';
 
 // if session is not set this will redirect to login page
 if( !isset($_SESSION['user']) ) {
  header("Location: index.php");
  exit;
 }
 // select loggedin users detail
 $query = "SELECT * FROM users WHERE userId=".$_SESSION['user'];
 $result = pg_query($db, $query);
 $userRow = pg_fetch_array($result);


echo "<html>";

include 'head.php';

echo "<body>";

	echo "<h2>Select a customer and table from the drop down lists to manage the data</h2>";

	echo "<form action='prepareinsert.php' method='post'>";

		echo "Welcome " . $userRow[1] . ", ";include 'getcustomers.php';
		echo '<br>';
		echo '<br>';
		include 'gettables.php';

	echo "<br><br><input type='submit' value='Insert data'> ";
	echo "<button type='submit' formaction='/preparedelete.php' method='post'>Select data to delete</button>";
	
	echo "<br><br><br><a href='http://localhost/preparenewcustomer.php'>Start up new customer</a>";

	echo "<br><br><br><a href='http://localhost/prepareimportcsv.php'>Import data from csv</a>";
	
	echo "<br><br><br><a href='http://localhost:3000/dashboard/1?company_unique_id=EURBV' target='_blank'>Dashboard</a>";
	
echo "</body>";

echo "</html>";

?>
