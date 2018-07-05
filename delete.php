<?php

include 'config.php';

include 'database_connect.php';

$delete_table_name = $_POST[delete_table_name];
$delete_pk = $_POST[delete_pk];
$delete_value = $_POST[delete_value];

/* 
echo "delete table name:";echo $delete_table_name;echo "<br>";
echo "delete pk:";echo $delete_pk;echo "<br>";
echo "delete value:";echo $delete_value;echo "<br>";
*/


if ($_POST[delete_table_name]<>'') {

$sql="DELETE FROM public.$_POST[delete_table_name]
WHERE $_POST[delete_pk]='$_POST[delete_value]';";

}

else {

	echo "No table selected\n";

}

   $ret = pg_query($db, $sql);
   if(!$ret) {

      echo pg_last_error($db);

} else {

      	echo "Data deleted from in the $delete_table_name-table.\n";
	echo "<br><br><a href='http://localhost/managedata.php'>Back home</a>";

}

include 'database_disconnect.php';

?>
