<?php

include 'config.php';

include 'database_connect.php';

/*TEST

echo $_POST["table"];
echo "<br>";
echo $_POST["Import"];
echo "<br>";
echo $_FILES["file"]["name"];
echo "<br>";
echo $_FILES["file"]["tmp_name"];
echo "<br>";
echo $_FILES["file"]["size"];
echo "<br>";

*/

if(isset($_POST["Import"])){

	if($_FILES["file"]["size"] > 0) {
		
	$filename=$_FILES["file"]["tmp_name"];	
	$file = fopen($filename, "r");

		while (($getData = fgetcsv($file, 10000, ",")) !== FALSE)
			 
		{

		$sql = "INSERT INTO public." . $_POST["table_name"] . " VALUES ('" . $csv[0] . "'";
                for( $i = 1; $i < count ( $getData ); $i++ ) {
                    $sql .= ",'" . $getData[$i] . "'";
                }
		$sql .= ");";

	/*echo $sql;*/

		$ret = pg_query($db, $sql);

		if (!$ret) {

			echo "csv not imported, please check if the constraints are respected";	

			}
		else {

			echo "csv imported succesfully";

			}

		}
			
	fclose($file);	

	}

}

echo "<br><br><a href='http://localhost/managedata.php'>Back home</a>";

include 'database_disconnect.php';

 ?>
