<?php

include 'config.php';

include 'database_connect.php';

$insert_table_name = $_POST[insert_table_name];
$insert_customer_name = $_POST[insert_customer_name];
$selected_bank_account = $_POST[selected_bank_account];

echo $selected_bank_account;

if ($_POST[insert_table_name]=='bank_accounts') {

$sql="INSERT INTO public.bank_accounts
(company_unique_id, 
bank_short_name, 
bank_name, 
bank_account_number, 
main_currency, 
bank_account,
account_group,
account_sub_group)
VALUES
('$_POST[company_unique_id]',
'$_POST[bank_short_name]',
'$_POST[bank_name]',
'$_POST[bank_account_number]',
'$_POST[main_currency]',
'$_POST[bank_account_number]$_POST[main_currency]',
'$_POST[account_group]',
'$_POST[account_sub_group]'
);";

}

elseif ($_POST[insert_table_name]=='company') {

$sql="INSERT INTO public.company
(company_unique_id, 
company,
reporting_currency,
company_sub_group,
company_group,
company_top_group,
company_holding,
customer_name
)
VALUES
('$_POST[company_unique_id]',
'$_POST[company]',
'$_POST[reporting_currency]',
'$_POST[company_sub_group]',
'$_POST[company_group]',
'$_POST[company_top_group]',
'$_POST[company_holding]',
'$_POST[insert_customer_name]'
);";

}

else {

	echo "No table selected\n";

}

   $ret = pg_query($db, $sql);
   if(!$ret) {

      echo pg_last_error($db);

} else {

      	echo "Data inserted successfully in the $insert_table_name-table.\n";
	echo "<br><br><a href='http://localhost/managedata.php'>Back home</a>";

}

include 'database_disconnect.php';

?>
