<?php include("partials/menu.php") ?>

<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
      <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
      <h1 class="h2"><i class="bi bi-gear-fill"></i>Add New Employee</h1>
      </div>

      <?php
        if(isset($_SESSION['add-employee']))//checking whether the session is set or not
        {
            echo $_SESSION['add-employee'];//Display the session message if set
            unset($_SESSION['add-employee']);//Remove session message
        }
        ?>

      <div class="container">
        <form class="row g-3" method="POST">
        <div class="col-md-12">
            <label for="inputName" class="form-label">Full Name</label>
            <input type="text" class="form-control" name="name" placeholder="Enter Full Name">
        </div>
        <div class="col-md-12">
            <label for="inputAge" class="form-label">Age</label>
            <input type="text" class="form-control" name="age" placeholder="Enter Employee Age">
        </div>
        <div class="col-12">
            <label for="inputAddress" class="form-label">Address</label>
            <input type="text" class="form-control" name="address" placeholder="1234 Main St">
        </div>
        <div class="col-12">
            <label for="inputAddress" class="form-label">Contact No</label>
            <input type="text" class="form-control" name="contact_no" placeholder="0712351256">
        </div>
        <div class="col-md-12">
            <label for="inputAccount" class="form-label">Account No</label>
            <input type="text" class="form-control" name="account_no" placeholder="Enter Account Number">
        </div>
        <div class="col-md-12">
            <label for="inputEmail" class="form-label">Category Title</label>
            <select class="form-select" aria-label="Default select example" name="category_name">
            <option selected>--Select Category Title--</option>

            <?php
            
                 //Sql query to select room Category
                 $sql  = "SELECT * FROM tbl_employee_category ";

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
                          $id = $row['id'];
                          $title = $row['title'];
                          ?>
                          <option value="<?php echo $id;?>"><?php echo $title;?></option>
                          <?php
                          
                      }
                  }
                  else
                  {
                     
                  }

                 
                
            ?>
            
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

    //Check whether submit button is clicked or not
    if(isset($_POST['submit']))
    {
        //get all the details from form
        $name = $_POST['name'];
        $age = $_POST['age'];
        $address = $_POST['address'];
        $contact_no = $_POST['contact_no'];
        $account_no = $_POST['account_no'];
        $category_name = $_POST['category_name'];

        //Create sql query to save the data into database
        $sql = "INSERT INTO tbl_employee SET
                name = '$name',
                age = '$age',
                address = '$address',
                contact_no = '$contact_no',
                account_no = '$account_no',
                emp_category_id = '$category_name'
                ";
        
        //Execute the query
        $res = mysqli_query($conn, $sql);

        //Check whether query is executed or not
        if($res==TRUE)
        {
            //Display the message to successfully added employee 
            $_SESSION['add-employee'] = "<div class='alert alert-success'><strong>Successfully Added Employee!</strong> </div>";

            //Redirect to manage employee  pge
            header('location:'.SITEURL.'admin/manage-employee.php');
        }
        else
        {
            //Failed to added room 
            $_SESSION['add-employee'] = "<div class='alert alert-danger'><strong>Failed to Added Room!</strong></div>";

            //Redirect to manage room  pge
            header('location:'.SITEURL.'admin/add-employee.php');
        }

    }

?>