<?php include("partials/menu.php") ?>

<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
      <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
      <h1 class="h2"><i class="bi bi-gear-fill"></i>Add Account</h1>
      </div>

      <?php
        if(isset($_SESSION['add-account']))//checking whether the session is set or not
        {
            echo $_SESSION['add-account'];//Display the session message if set
            unset($_SESSION['add-account']);//Remove session message
        }
        ?>

      <div class="container">
        <form class="row g-3" method="POST">
        <div class="col-md-12">
            <label for="inputName" class="form-label">Account name</label>
            <input type="text" class="form-control" name="account_name" placeholder="Enter the Account Name" >
        </div>
        <div class="col-md-12">
            <label for="inputAge" class="form-label">Account No</label>
            <input type="text" class="form-control" name="account_no" placeholder="Enter the Account No">
        </div>
        <div class="col-12">
            <label for="inputAddress" class="form-label">Account Type</label>
            <select class="form-select" aria-label="Default select example" name="account_type">
                <option>--Select Account Type--</option>
                <option value="Ex">Ex</option>
                <option value="Income">Income</option>
                
            </select>
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

    //Process the value from form and save it in database
    //Check whether the submit button is clicked or not
    if(isset($_POST['submit']))
    {
        //Get the data from form
        $account_name = $_POST['account_name'];
        $account_no = $_POST['account_no'];
        $account_type = $_POST['account_type'];

        //SQL query to save the data into database
        $sql = "INSERT INTO tbl_account SET
                account_name='$account_name',
                account_no='$account_no',
                account_type='$account_type'";
        
        //Execute the Quey and Saving Data into database
        $res = mysqli_query($conn, $sql);

        //Check whether the data inserted or not and display appropriate message
        if($res==TRUE)
        {
            //Create a Session variable to display message
            $_SESSION['add-admin'] = "<div class='alert alert-info'><strong>Account Added Successfully!</strong></div>";
            echo "success";
            //Redirect page to manage admin page
            header('location:'.SITEURL.'admin/manage-accounts.php');
        }
        else
        {
            //Create a session variable to display message
            $_SESSION['add-admin'] = "<div class='alert alert-danger'><strong>Failed to Add Account!</strong></div>";
            
            //Redirect page to Manage admin page
            header('location:'.SITEURL.'admin/add-account.php');
        }
    }
?>