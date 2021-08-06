<?php
for($i=0; $i<=5; $i++){
    for($j=$i; $j>=5; $i++){
        echo "*";
    }

}
?>


$sql="SELECT tbl_ledger.Ledger_id,tbl_account.account_no, tbl_ledger.debit, tbl_ledger.credit, tbl_ledger.balance, tbl_ledger.payment_date 
                FROM tbl_ledger INNER JOIN tbl_account ON tbl_ledger.account_id=tbl_account.id";