<?php include("partials/menu.php") ?>

<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
      <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
      <h1 class="h2"><i class="bi bi-gear-fill"></i>Add New Admin</h1>
      </div>

      <?php
        if(isset($_SESSION['add-admin']))//checking whether the session is set or not
        {
            echo $_SESSION['add-admin'];//Display the session message if set
            unset($_SESSION['add-admin']);//Remove session message
        }
        ?>

      <div class="container">
        <form class="row g-3" method="POST">
        <div class="col-md-12">
            <label for="full_name" class="form-label">Full Name</label>
            <input type="text" class="form-control" name="full_name" >
        </div>
        <div class="col-md-12">
            <label for="username" class="form-label">Username</label>
            <input type="text" class="form-control" name="username" >
        </div>
        <div class="col-12">
            <label for="password" class="form-label">Password</label>
            <input type="password" class="form-control" name="password" >
        </div>
        
        <div class="col-2">
        <input class="btn btn-color" type="submit" value="Add Admin" name="submit">
        </div>
        </form>
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
        $full_name = $_POST['full_name'];
        $username = $_POST['username'];
        $password = md5($_POST['password']);

        //SQL query to save the data into database
        $sql = "INSERT INTO tbl_admin SET
                full_name='$full_name',
                username='$username',
                password='$password'";
        
        //Execute the Quey and Saving Data into database
        $res = mysqli_query($conn, $sql);

        //Check whether the data inserted or not and display appropriate message
        if($res==TRUE)
        {
            //Create a Session variable to display message
            $_SESSION['add-admin'] = "<div class='alert alert-info'><strong>Admin Added Successfully!</strong></div>";
            echo "success";
            //Redirect page to manage admin page
            header('location:'.SITEURL.'admin/manage-admin.php');
        }
        else
        {
            //Create a session variable to display message
            $_SESSION['add-admin'] = "<div class='alert alert-danger'><strong>Failed to Add Admin!</strong></div>";
            
            //Redirect page to Manage admin page
            header('location:'.SITEURL.'admin/manage-admin.php');
        }
    }
?>