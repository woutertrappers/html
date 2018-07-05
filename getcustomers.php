<?php

include 'config.php';

include 'database_connect.php';

$sql="select distinct customer_name
FROM public.customers";

echo " select the customer for who you want to manage the data:<br><br>";

   $ret = pg_query($db, $sql);
   if(!$ret) {
      	echo pg_last_error($db);
   } else {
      	$arr = pg_fetch_all($ret);

	echo "<select name='customer_name'>'";

	foreach ($arr as $item) {
		
		echo "<option value='";
		echo $item['customer_name'];
		echo "'>";
		echo $item['customer_name'];
		echo "</option>";	
	
	}

	echo "</select>";
   }

include 'database_disconnect.php';

?>
