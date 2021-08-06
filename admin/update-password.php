<?php include('partials/menu.php');?>

<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
      <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
      <h1 class="h2"><i class="bi bi-gear-fill"></i>Change Password</h1>
      </div>

      <?php
            if(isset($_GET['id']))
            {
                $id=$_GET['id'];
            }
        ?>


      <div class="container">
        <form class="row g-3" method="POST">
        <div class="col-md-12">
            <label for="inputEmail4" class="form-label">Current Password</label>
            <input type="password" class="form-control" name="current_password" >
        </div>
        <div class="col-md-12">
            <label for="inputPassword4" class="form-label">New Password</label>
            <input type="password" class="form-control" name="new_password" >
        </div>

        <div class="col-md-12">
            <label for="inputPassword4" class="form-label">Confirm Password</label>
            <input type="password" class="form-control" name="confirm_password" >
        </div>
        
        <div class="col-2">
            <input type="hidden" name="id" value="<?php echo $id;?>">
            <input type="submit" value="Change Password" name="submit" class="btn btn-color form-control pt-2">
        </div>
        </form>
        </div>
    </main>
  </div>
</div>

<?php include('partials/footer.php');?>

<?php
    //Check whether the submit Button is clicked or not
    if(isset($_POST['submit']))
    {
        //Get the Data from Form
        $id=$_POST['id'];
        $current_password= md5($_POST['current_password']);
        $new_password  = md5($_POST['new_password']);
        $confirm_password = md5($_POST['confirm_password']);

        //Check whether the user with current ID and Current Password Exists or not
        $sql  = "SELECT * FROM tbl_admin WHERE id=$id AND password = '$current_password'";

        //Execute the query
        $res = mysqli_query($conn, $sql);

        if($res==true)
        {
            //Check whether data is available or not
            $count=mysqli_num_rows($res);

            if($count==1)
            {
                //User Exists and password can be Changed
                //echo "User Found";
                //Check whether the new password and confirm match or not
                if($new_password==$confirm_password)
                {
                    //Update the password
                    $sql2 ="UPDATE tbl_admin SET
                    password = '$new_password'
                    WHERE id=$id";

                    //Execute the query
                    $res2 = mysqli_query($conn, $sql2);

                    //Check whether the query  executed or not
                    if($res2==true)
                    {
                        //Display Success Message
                        //Redirect to manage admin page with Success message
                        $_SESSION['change-pwd'] = "<div class='alert alert-success'><strong>Password Changed Successfully.!</strong></div>";

                        //Redirect to Manage Admin Page
                        header('location:'.SITEURL.'admin/manage-admin.php');
                    }
                    else
                    {
                        //Display Error Message
                        //Redirect to manage admin page with error message
                        $_SESSION['change-pwd'] = "<div class='alert alert-danger'><strong>Failed to Change Password.!</strong></div>";

                        //Redirect to Manage Admin Page
                        header('location:'.SITEURL.'admin/manage-admin.php');
                    }
                    
                }
                else{

                    //Redirect to manage admin page with error message
                    $_SESSION['pwd-not-match'] = "<div class='alert alert-danger'><strong>Password Did Not Match.!</strong></div>";

                    //Redirect to Manage Admin Page
                    header('location:'.SITEURL.'admin/manage-admin.php');
                }
            }
            else
            {
                //User does not Exists set message and redirect
                $_SESSION['user-not-found'] = "<div class='alert alert-danger'><strong>User Not Found.<!strong></div>";

                //Redirect to Manage Admin Page
                header('location:'.SITEURL.'admin/manage-admin.php');
            }
        }
    }
?>
