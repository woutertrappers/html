<?php

echo "<h2>Enter the name of a new customer:</h2><br>";

echo "<form action='insertnewcustomer.php' method='post'>";

	echo "Customer name: ";
	echo "<input type='text' name='customer_name'>";

echo "<br><br><input type='submit'>";

echo "<br><br><a href='http://localhost/managedata.php'>Back home</a>";

?>


