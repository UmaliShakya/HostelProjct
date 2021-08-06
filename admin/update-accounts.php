<?php include("partials/menu.php") ?>

<?php

            //Get the ID of selected Admin
            $account_id = $_GET['account_id'];

            //Create SQL Query to get the details
            $sql="SELECT * FROM tbl_account WHERE account_id=$account_id";

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
                    $account_name = $row['account_name'];
                    $account_no = $row['account_no'];
                    $account_type = $row['account_type'];
                }
                else
                {
                    //Redirect to manage admin page
                    header('location:'.SITEURL.'admin/manage-accounts.php');
                }
            }
        ?>


<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
      <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
      <h1 class="h2"><i class="bi bi-gear-fill"></i>Update Account</h1>
      </div>

      <div class="container">
        <form class="row g-3" method="POST">
        <div class="col-md-12">
            <label for="inputName" class="form-label">Account name</label>
            <input type="text" class="form-control" name="account_name" value="<?php echo $account_name;?>" >
        </div>
        <div class="col-md-12">
            <label for="inputAge" class="form-label">Account No</label>
            <input type="text" class="form-control" name="account_no" value="<?php echo $account_no;?>">
        </div>
        <div class="col-12">
            <label for="inputAddress" class="form-label">Account Type</label>
            <select class="form-select" aria-label="Default select example" name="account_type" value="<?php echo $account_type;?>">
                <option value="Ex">Ex</option>
                <option value="Income">Income</option>
                
            </select>
        </div>
        <div class="col-2">
            <input type="hidden" name="account_id" value="<?php echo $account_id;?>">
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
        $account_id = $_POST['account_id'];
        $account_name = $_POST['account_name'];
        $account_no = $_POST['account_no'];
        $account_type = $_POST['account_type'];

        //Create a SQL query to update Admin
        $sql = "UPDATE tbl_account SET
                account_name = '$account_name',
                account_no = '$account_no',
                account_type = '$account_type'
                WHERE account_id='$account_id'";

        //Execute the Query
        $res = mysqli_query($conn, $sql);

        //Check whether the query executed successfully or not
        if($res==TRUE)
        {
            //Query Executed and Admin Updated
            $_SESSION['update-account'] = "<div class='alert alert-success'><strong>Account Updated Successfully!</strong></div>";

            //Redirect the Manage Admin Page
            header('location:'.SITEURL.'admin/manage-accounts.php');
        }
        else
        {
            //Failed to Update
            $_SESSION['update-account'] = "<div class='alert alert-danger alert-dismissible'><strong>Failed to Update Account!</strong></div>";

            //Redirect to Manage Admin Page
            header('location:'.SITEURL.'admin/manage-accounts.php');
        }
    }
?>