<?php include("partials/menu.php") ?>

<?php

            //Get the ID of selected Admin
            $Ledger_id = $_GET['ledger_id'];

            //Create SQL Query to get the details
            $sql="SELECT * FROM tbl_ledger WHERE ledger_id=$Ledger_id";

            //Execute the query
            $res=mysqli_query($conn, $sql);

            //Check whether the query is executed or not
            if($res==TRUE)
            {
                //Check whether the data is available or not
                $count = mysqli_num_rows($res);
                //Check whether we have admin data or not
                if($count==1)
                {
                    //Get the details
                    $row = mysqli_fetch_assoc($res);
                    $account_no = $row['account_no'];
                    $credit = $row['credit'];
                    $debit = $row['debit'];
                    $balance = $row['balance'];
                }
                else
                {
                    //Redirect to manage admin page
                    header('location:'.SITEURL.'admin/manage-ledger.php');
                }
            }
        ?>


<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
      <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
      <h1 class="h2"><i class="bi bi-gear-fill"></i>Update Ledger</h1>
      </div>

      <div class="container">
        <form class="row g-3" method="POST">
        <div class="col-md-12">
            <label for="inputName" class="form-label">Account name</label>
            <select class="form-control" aria-label="Default select example" name="account_name">
            <option selected>--Select Account Name--</option>

            <?php

            //Sql query to select room Category
            $sql  = "SELECT * FROM tbl_account ";

            //Execute the query
            $res = mysqli_query($conn, $sql);

            //count rows to check whether we have categories or not
            $count = mysqli_num_rows($res);

            //count the rows
            if($count>0)
            {
                //we have a data in database
                while($row=mysqli_fetch_assoc($res))
                {
                    //get all the details
                    $account_id = $row['account_id'];
                    $account_no = $row['account_no'];
                    ?>
                    <option <?php if($current_no==$account_id){echo "Selected";} ?> value="<?php echo $account_id;?>"><?php echo $account_no;?></option>
                    <?php
                    
                }
            }
            else
            {
                
            }
            ?>
            
            </select>

        </div>
        <div class="col-md-12">
            <label for="inputAge" class="form-label">Debit</label>
            <input type="text" class="form-control" name="debit" value="<?php echo $debit;?>">
        </div>
        <div class="col-md-12">
            <label for="inputAge" class="form-label">Credit</label>
            <input type="text" class="form-control" name="credit" value="<?php echo $credit;?>">
        </div>
        <div class="col-md-12">
            <label for="inputAge" class="form-label">Balance</label>
            <input type="text" class="form-control" name="balance" value="<?php echo $balance;?>">
        </div>
        <div class="col-2">
            <input type="hidden" name="ledger_id" value="<?php echo $Ledger_id;?>">
            <input type="submit" value="Update" name="submit" class="btn btn-color form-control pt-2">
        </div>
        </form>
        </div>
    </main>
  </div>
</div>

<?php include("partials/footer.php") ?>

<?php 
    //Check whether the submit button is clicked or not
    if(isset($_POST['submit']))
    {
        //Get all the value from form to update
        $Ledger_id = $_POST['Ledger_id'];
        $account_no = $_POST['account_no'];
        $debit = $_POST['debit'];
        $credit = $_POST['credit'];
        $balance = $_POST['balance'];

        //Create a SQL query to update Admin
        $sql = "UPDATE tbl_ledger SET
                account_no = '$account_no',
                debit = '$debit',
                credit = '$credit',
                balance = '$balance',
                payment_date = current_timestamp()
                WHERE Ledger_id='$Ledger_id'";

        //Execute the Query
        $res = mysqli_query($conn, $sql);

        //Check whether the query executed successfully or not
        if($res==TRUE)
        {
            //Query Executed and Admin Updated
            $_SESSION['update-ledger'] = "<div class='alert alert-success'><strong>Ledger Updated Successfully!</strong></div>";

            //Redirect the Manage Admin Page
            header('location:'.SITEURL.'admin/manage-accounts.php');
        }
        else
        {
            //Failed to Update
            $_SESSION['update-ledger'] = "<div class='alert alert-danger alert-dismissible'><strong>Failed to Update Ledger!</strong></div>";

            //Redirect to Manage Admin Page
            header('location:'.SITEURL.'admin/manage-accounts.php');
        }
    }
?>