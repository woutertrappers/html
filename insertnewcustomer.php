<?php

include 'config.php';

include 'database_connect.php';

$sql="INSERT INTO public.customers
(customer_name)
VALUES
('$_POST[customer_name]'
);";


   $ret = pg_query($db, $sql);
   if(!$ret) {

      echo pg_last_error($db);

} else {

      	echo "Data inserted successfully in the Customer-table.\n";
	echo "<br><br><a href='http://localhost/managedata.php'>Back home</a>";

}




include 'database_disconnect.php';

?>
