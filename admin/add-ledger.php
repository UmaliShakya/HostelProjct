<?php include("partials/menu.php") ?>

<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
      <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
      <h1 class="h2"><i class="bi bi-gear-fill"></i>Add Ledger</h1>
      </div>

      <?php
        if(isset($_SESSION['add-ledger']))//checking whether the session is set or not
        {
            echo $_SESSION['add-ledger'];//Display the session message if set
            unset($_SESSION['add-ledger']);//Remove session message
        }
        ?>

      <div class="container">
        <form class="row g-3" method="POST">
        <div class="col-md-12">

            <label for="inputName" class="form-label">Account name</label>
            <select class="form-control" aria-label="Default select example" name="account_no">
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
                          <option value="<?php echo $account_id;?>"><?php echo $account_no;?></option>
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
            <input type="text" class="form-control" name="debit" >
        </div>
        <div class="col-md-12">
            <label for="inputAge" class="form-label">Credit</label>
            <input type="text" class="form-control" name="credit" >
        </div>
        <div class="col-md-12">
            <label for="inputAge" class="form-label">Balance</label>
            <input type="text" class="form-control" name="balance" >
        </div>
        <div class="col-2">
            <input type="submit" class="btn btn-color form-control p-2" name="submit" value="Add">
        </div>
        </form>
        <br>
        </div>
    </main>
  </div>
</div>


<?php include("partials/footer.php") ?>

<?php

    //Check whether submit button is clicked or not
    if(isset($_POST['submit']))
    {
        //get all the details from form
        $account_no = $_POST['account_no'];
        $debit = $_POST['debit'];
        $credit = $_POST['credit'];
        $balance = $_POST['balance'];
        
  
        //Create sql query to save the data into database
        $sql = "INSERT INTO tbl_ledger SET
                account_id = '$account_no',
                debit = '$debit',
                credit = '$credit',
                balance = '$balance',
                payment_date = current_timestamp()";
        
        //Execute the query
        $res = mysqli_query($conn, $sql);

        //Check whether query is executed or not
        if($res==TRUE)
        {
            //Display the message to successfully added employee 
            $_SESSION['add-ledger'] = "<div class='alert alert-success'><strong>Successfully Added Payment into the Ledger!</strong> </div>";

            //Redirect to manage employee  pge
            header('location:'.SITEURL.'admin/manage-ledger.php');
        }
        else
        {
            //Failed to added room 
            $_SESSION['add-ledger'] = "<div class='alert alert-danger'><strong>Failed to Added Payment into the Ledger!</strong></div>";

            //Redirect to manage room  pge
            header('location:'.SITEURL.'admin/add-ledger.php');
        }

    }

?>