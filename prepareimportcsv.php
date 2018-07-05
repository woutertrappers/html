<?php

echo "<h2>Select a file that corresponds to a setup table</h2>";


echo "<form action='importcsv.php' method='post' name='upload_excel' enctype='multipart/form-data'>";

	echo "<fieldset>";

		echo "<label for='singlebutton'>Select table to import csv to</label><br><br>";
		include 'gettables.php';
		echo "<br><br>";
 
		echo "<label for='filebutton'>Select File</label><br><br>";
		echo "<input type='file' name='file' id='file' class='input-large'><br><br><br>";

                echo "<label for='singlebutton'>Import data</label><br><br>";
		echo "<button type='submit' id='submit' name='Import' class='btn btn-primary button-loading' data-loading-text='Loading...'>Import</button><br><br>";

		echo "Please note that the values have to be in the order of the columns in the table in the database and that the csv may not contain columnnames";
	
	echo "</fieldset>";

echo "</form>";

echo "<br><br><a href='http://localhost/managedata.php'>Back home</a>";
 
?>
