<?php include("partials/menu.php") ?>

    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
      <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
      <h1 class="h2">Manage Admin</h1>
        <div class="btn-toolbar mb-2 mb-md-0">
          <div class="btn-group me-2">
            <a href="add-admin.php" type="button" class="btn btn-md btn-outline-secondary">Add Admin</a>  
          </div>
        </div>
      </div>

      <?php
        if(isset($_SESSION['add-admin']))//checking whether the session is set or not
        {
            echo $_SESSION['add-admin'];//Display the session message if set
            unset($_SESSION['add-admin']);//Remove session message
        }

        if(isset($_SESSION['update-admin']))//checking whether the session is set or not
        {
            echo $_SESSION['update-admin'];//Display the session message if set
            unset($_SESSION['update-admin']);//Remove session message
        }

        if(isset($_SESSION['change-pwd']))//checking whether the session is set or not
        {
            echo $_SESSION['change-pwd'];//Display the session message if set
            unset($_SESSION['change-pwd']);//Remove session message
        }

        if(isset($_SESSION['pwd-not-match']))
        {
            echo $_SESSION['pwd-not-match'];
            unset($_SESSION['pwd-not-match']);
        }

        if(isset($_SESSION['user-not-found']))
        {
            echo $_SESSION['user-not-found'];
            unset($_SESSION['user-not-found']);
        }
        ?>

      <div class="table-responsive">
        <table class="table table-striped table-md">
          <thead>
            <tr>
              <th>#</th>
              <th>Full Name</th>
              <th>Username</th>
              <th>Action</th>
            </tr>
          </thead>

          <?php
                //Query to get all admin
                $sql="SELECT * FROM tbl_admin";

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
                            $id=$row['id'];
                            $full_name=$row['full_name'];
                            $username=$row['username'];

                            //Display the values in the table
                            ?>

          <tbody>
            <tr>
              <td><?php echo $sn++;?></td>
              <td><?php echo $full_name;?></td>
              <td><?php echo $username;?></td>
              <td>
                <a href="<?php echo SITEURL;?>admin/update-admin.php?id=<?php echo $id;?>" class="btn btn-md btn-outline-warning"> Update</a>
                <a href="<?php echo SITEURL;?>admin/update-password.php?id=<?php echo $id;?>" class="btn btn-md btn-outline-success"> Change Password</a>              </td>
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
