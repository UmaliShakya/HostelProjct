<?php include("partials/menu.php") ?>

<?php

            //Get the ID of selected Admin
            $id = $_GET['id'];

            //Create SQL Query to get the details
            $sql="SELECT * FROM tbl_admin WHERE id=$id";

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
                    $full_name = $row['full_name'];
                    $username = $row['username'];
                }
                else
                {
                    //Redirect to manage admin page
                    header('location:'.SITEURL.'admin/manage-admin.php');
                }
            }
        ?>


<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
      <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
      <h1 class="h2"><i class="bi bi-gear-fill"></i>Update Admin</h1>
      </div>

      <div class="container">
        <form class="row g-3" method="POST">
        <div class="col-md-12">
            <label for="inputEmail4" class="form-label">Full Name</label>
            <input type="text" class="form-control" name="full_name" value="<?php echo $full_name;?>">
        </div>
        <div class="col-md-12">
            <label for="inputPassword4" class="form-label">Username</label>
            <input type="text" class="form-control" name="username" value="<?php echo $username;?>">
        </div>
        
        <div class="col-2">
            <input type="hidden" name="id" value="<?php echo $id;?>">
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
        $id = $_POST['id'];
        $full_name = $_POST['full_name'];
        $username = $_POST['username'];

        //Create a SQL query to update Admin
        $sql = "UPDATE tbl_admin SET
                full_name = '$full_name',
                username = '$username'
                WHERE id='$id'";

        //Execute the Query
        $res = mysqli_query($conn, $sql);

        //Check whether the query executed successfully or not
        if($res==TRUE)
        {
            //Query Executed and Admin Updated
            $_SESSION['update-admin'] = "<div class='alert alert-success'><strong>Admin Updated Successfully</strong></div>";

            //Redirect the Manage Admin Page
            header('location:'.SITEURL.'admin/manage-admin.php');
        }
        else
        {
            //Failed to Update
            $_SESSION['update-admin'] = "<div class='alert alert-danger'><strong>Failed to Update Admin!</strong></div>";

            //Redirect to Manage Admin Page
            header('location:'.SITEURL.'admin/manage-admin.php');
        }
    }
?>