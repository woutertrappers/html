<?php

include 'config.php';

include 'database_connect.php';

$table_name = $_POST[table_name];
$customer_name = $_POST[customer_name];

if ($table_name=='company') {

$sql1="SELECT include, company, database_name, company_unique_id, company_id_found, reporting_currency, company_map1, company_map2, ar_account, ap_account, bank_balance_account, bank_balance_account_except, petty_cash_balance_account, petty_cash_balance_account_except, tolerance_days, cash_flow_group_1, cash_flow_group_2, chart_of_accounts_key, company_unique_id2, company_sub_group, company_group, company_top_group, company_holding
FROM public.company where customer_name='$customer_name';";

}

else {

$sql1="select * from 
public.$table_name b 
inner join public.company c 
on b.company_unique_id = c.company_unique_id where c.customer_name='$customer_name';";

}

$sql2 = "select column_name from 
information_schema.constraint_column_usage 
where table_name = '$table_name' 
and constraint_name like '%_pk';";


$ret1 = pg_query($db, $sql1);

$ret2 = pg_query($db, $sql2);

$val = pg_fetch_result($ret2, 0, 0);

/*Info*/

echo "<h2>Delete data from the $table_name table:</h2>";

echo "<a href='http://localhost/index.php'>Back home</a><br><br>";

echo "Select the primary key of the row you want to delete:";

//Form checkbox

echo "<form action='delete.php' method='post'>";
echo "<br><br><input type='submit' value='Delete'><br><br>";

echo "<input type='hidden' name='delete_table_name' value='$table_name'>";
echo "<input type='hidden' name='delete_pk' value='$val'>";

/*Build the input screen*/
	
  if(!$ret1) {
      	echo pg_last_error($db);
   } else {
      	$arr1 = pg_fetch_all($ret1);

/*Values*/
	
	foreach ($arr1 as $item1) {

	echo "<tr>";

		
			echo "<td><input type='radio' name='delete_value' value='$item1[$val]'></td>";
	
			echo "<td>";echo $item1[$val];echo "</td><br>";

	echo "</tr>";	

	}	

}

echo "</form>";

include 'database_disconnect.php';

?>
