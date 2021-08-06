<?php include("partials/menu.php") ?>

    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
      <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
      <h1 class="h2"><i class="bi bi-gear-fill"></i>Manage Accounts</h1>
        <div class="btn-toolbar mb-2 mb-md-0">
          <div class="btn-group me-2">
            <a href="add-account.php" type="button" class="btn btn-md btn-outline-secondary">Add Account</a>  
          </div>
        </div>
      </div>

      <?php
        if(isset($_SESSION['add-account']))//checking whether the session is set or not
        {
            echo $_SESSION['add-account'];//Display the session message if set
            unset($_SESSION['add-account']);//Remove session message
        }

        if(isset($_SESSION['update-account']))//checking whether the session is set or not
        {
            echo $_SESSION['update-account'];//Display the session message if set
            unset($_SESSION['update-account']);//Remove session message
        }
        ?>

      <div class="table-responsive">
        <table class="table table-striped table-md">
          <thead>
            <tr>
              <th>#</th>
              <th>Account Name</th>
              <th>Account No</th>
              <th>Account Type</th>
              <th>Action</th>
            </tr>
          </thead>

          <?php
                //Query to get all admin
                $sql="SELECT * FROM tbl_account";

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
                            $account_id=$row['account_id'];
                            $account_name=$row['account_name'];
                            $account_no=$row['account_no'];
                            $account_type=$row['account_type'];

                            //Display the values in the table
                            ?>

          <tbody>
            <tr>
              <td><?php echo $sn++;?></td>
              <td><?php echo $account_name;?></td>
              <td><?php echo $account_no;?></td>
              <td><?php echo $account_type;?></td>
              <td>
                <a href="<?php echo SITEURL;?>admin/update-accounts.php?account_id=<?php echo $account_id;?>" class="btn btn-md btn-outline-warning"> Update</a>
                
              </td>
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
