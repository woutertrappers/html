<?php

include 'config.php';

include 'database_connect.php';

$sql="select distinct table_name
FROM information_schema.tables where table_schema = 'public' and table_name <> 'customers';";

echo "Select the table:<br><br>";

   $ret = pg_query($db, $sql);
   if(!$ret) {
      	echo pg_last_error($db);
   } else {
      	$arr = pg_fetch_all($ret);

	echo "<select name='table_name'>'";

	foreach ($arr as $item) {
		
		echo "<option value='";
		echo $item['table_name'];
		echo "'>";
		echo $item['table_name'];
		echo "</option>";	
	
	}

	echo "</select>";
   }

include 'database_disconnect.php';

?>
