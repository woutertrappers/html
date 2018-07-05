<?php

include 'config.php';

include 'database_connect.php';

$table_name = $_POST[table_name];
$customer_name = $_POST[customer_name];

$sql0="SELECT
	column_name, 
	CASE WHEN is_nullable ='NO' THEN '*' END 
		AS mandatory
	FROM information_schema.columns
	WHERE table_name = '$table_name' and column_name <> 'customer_name'
	ORDER BY ordinal_position;";

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

$ret0 = pg_query($db, $sql0);

$ret1 = pg_query($db, $sql1);

/*Info*/

echo "<h2>Enter data in the $table_name table:</h2>";

echo '* mandatory';

echo "<br><br><a href='http://localhost/index.php'>Back home</a>";

//Form data

echo "<form action='insert.php' method='post'>";
echo "<br><br><input type='submit'><br><br>";

echo "<input type='hidden' name='insert_table_name' value=$table_name>";
echo "<input type='hidden' name='insert_customer_name' value=$customer_name>";

echo "<table style='width:95%'>";

 if(!$ret1) {
      	echo pg_last_error($db);
   } else {
	$arr0 = pg_fetch_all($ret0);
      	$arr1 = pg_fetch_all($ret1);

/*Columnheads*/	

	echo "<tr>";

	foreach ($arr0 as $item0) {
		echo "<th>";echo $item0['column_name'].$item0['mandatory'];echo "</th>";
		}

	echo "</tr>";

/*Inputboxes*/

	echo "<tr>";

	foreach ($arr0 as $item0) {
		echo "<td>";echo "<input type='text'name='";echo $item0['column_name'];echo "'/>";echo "</td>";	
		}

	echo "</tr>";

/*Values*/
	
	foreach ($arr1 as $item1) {

	echo "<tr>";

		foreach ($arr0 as $item0) {
			echo "<td>";echo $item1[$item0['column_name']];echo "</td>";
		}

	echo "</tr>";	

	}

echo "</table>";	

}

echo "</form>";

include 'database_disconnect.php';

?>
