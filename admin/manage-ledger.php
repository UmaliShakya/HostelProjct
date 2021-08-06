<?php include("partials/menu.php") ?>

    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
      <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
      <h1 class="h2"><i class="bi bi-gear-fill"></i>Manage Ledger</h1>
      </div>

      <?php
        if(isset($_SESSION['add-ledger']))//checking whether the session is set or not
        {
            echo $_SESSION['add-ledger'];//Display the session message if set
            unset($_SESSION['add-ledger']);//Remove session message
        }

        if(isset($_SESSION['update-ledger']))//checking whether the session is set or not
        {
            echo $_SESSION['update-ledger'];//Display the session message if set
            unset($_SESSION['update-ledger']);//Remove session message
        }
        ?>

      <div class="table-responsive">
        <table class="table table-striped table-md">
          <thead>
            <tr>
              <th>Ledger ID</th>
              <th>Account No</th>
              <th>Debit</th>
              <th>Credit</th>
              <th>Balance</th>
              <th>Payment Date</th>
            </tr>
          </thead>

          <?php
                //Query to get all admin
                $sql="SELECT tbl_ledger.Ledger_id, tbl_account.account_no, tbl_ledger.debit, tbl_ledger.credit, tbl_ledger.balance, tbl_ledger.payment_date
                FROM tbl_ledger INNER JOIN tbl_account ON tbl_ledger.account_id = tbl_account.account_id ORDER BY payment_date";
                
                //Execute the Query
                $res=mysqli_query($conn,$sql);

                //Check whether the Query is executed or not
                if($res==TRUE)
                {
                    //count rows to check whether we have data in database or not
                    $count = mysqli_num_rows($res);//function to get all the rows in database
                    
                    //Create a variable and assign the value
                    $sn=1;

                    //check the num of rows
                    if($count>0)
                    {
                        //we have data in database
                        while($row=mysqli_fetch_assoc($res))
                        {
                            //Using while loop to get all the data from database
                            // and while loop will run as long as we have data in database

                            //Get individual data
                            $Ledger_id = $row['Ledger_id'];
                            $account_no=$row['account_no'];
                            $debit=$row['debit'];
                            $credit=$row['credit'];
                            $balance=$row['balance'];
                            $payment_date=$row['payment_date'];
                            
                            //Display the values in the table
                            ?>


          <tbody>
            <tr>
              <td><?php echo $sn++;?></td>
              <td><?php echo $account_no;?></td>
              <td><?php echo $debit;?></td>
              <td><?php echo $credit;?></td>
              <td><?php echo $balance;?></td>
              <td><?php echo $payment_date;?></td>
            </tr>
            <?php
                        }
                    }
                }
            ?>
          </tbody>
        </table>
      </div>

    </main>
  </div>
</div>

<?php include("partials/footer.php") ?>
