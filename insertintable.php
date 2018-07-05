<?php

public function insertintable($POST_[insert_table_name],$_POST[company_unique_id],$_POST[bank_short_name],$_POST[bank_name],$_POST[bank_account_number],$_POST[main_currency],$_POST[bank_account]) {


$sql="INSERT INTO public.$POST_[insert_table_name]
(company_unique_id, 
bank_short_name, 
bank_name, 
bank_account_number, 
main_currency, 
bank_account)
VALUES
(:company_unique_id,
:bank_short_name,
:bank_name,
:bank_account_number,
:main_currency,
:bank_account
);";

$stmt = $this->pdo->prepare($sql);

$stmt->bindValue(':company_unique_id',$POST_[company_unique_id]);
$stmt->bindValue(':bank_short_name',$POST_[bank_short_name]);
$stmt->bindValue(':bank_name',$POST_[bank_name]);
$stmt->bindValue(':bank_account_number',$POST_[bank_account_number]);
$stmt->bindValue(':main_currency',$POST_[main_currency]);
$stmt->bindValue(':bank_account',$POST_[bank_account]);

$stms->execute();

return $this->pdo->lastInsertID('stocks_id_seq');

}

?>
