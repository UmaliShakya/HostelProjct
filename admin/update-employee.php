<?php include("partials/menu.php") ?>

<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
      <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
      <h1 class="h2"><i class="bi bi-gear-fill"></i>Update Employee</h1>
      </div>

      <?php

        //check whether id is set or not
        if(isset($_GET['id']))
        {
            //get all the details
            $id = $_GET['id'];

            //SQL query to get the selected food
            $sql = "SELECT * FROM tbl_employee WHERE id=$id";

            //Execute the query
            $res = mysqli_query($conn, $sql);

            //Get the value based on query executed
            $row = mysqli_fetch_assoc($res);

            //Get the individual value of selected employee
            $name = $row['name'];
            $age = $row['age'];
            $address = $row['address'];
            $contact_no = $row['contact_no'];
            $account_no = $row['account_no'];
            $current_category = $row['emp_category_id'];
        }
        else
        {
            //Redirect to manage room
            header('location:'.SITEURL.'admin/add-room.php');

        }
    ?>

      <div class="container">
        <form class="row g-3" method="POST">
        <div class="col-md-12">
            <label for="inputName" class="form-label">Full Name</label>
            <input type="text" class="form-control" name="name" value="<?php echo $name;?>">
        </div>
        <div class="col-md-12">
            <label for="inputAge" class="form-label">Age</label>
            <input type="text" class="form-control" name="age" value="<?php echo $age;?>">
        </div>
        <div class="col-12">
            <label for="inputAddress" class="form-label">Address</label>
            <input type="text" class="form-control" name="address" value="<?php echo $address;?>">
        </div>
        <div class="col-12">
            <label for="inputAddress" class="form-label">Contact No</label>
            <input type="text" class="form-control" name="contact_no" value="<?php echo $contact_no;?>">
        </div>
        <div class="col-md-12">
            <label for="inputAccount" class="form-label">Account No</label>
            <input type="text" class="form-control" name="account_no" value="<?php echo $account_no;?>">
        </div>
        <div class="col-md-12">
            <label for="inputEmail" class="form-label">Category Title</label>
            <select class="form-select" aria-label="Default select example" name="category">
            
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
                    $category_id = $row['id'];
                    $category_name = $row['title'];
                    ?>
                    <option <?php if($current_category==$category_id){echo "Selected";} ?> value="<?php echo $category_id;?>"><?php echo $category_name;?></option>
                    <?php
                    
                }
            }
            else
            {
                
            }
            ?>
            
        </div>
        <div class="col-2">
            <input type="hidden" name="id" value="<?php echo $id;?>">
            <input type="submit" class="btn btn-color form-control p-2" name="submit" value="Update">
        </div>
        </form>
        <br>
        </div>
    </main>
  </div>
</div>

<?php include("partials/footer.php") ?>

<?php

    if(isset($_POST['submit']))
    {
        //Get all details from the form
        $id = $_POST['id'];
        $name = $_POST['name'];
        $age = $_POST['age'];
        $address = $_POST['address'];
        $contact_no = $_POST['contact_no'];
        $account_no = $_POST['account_no'];
        $category = $_POST['category'];
        

        //Update the employee in database
        $sql2 = "UPDATE tbl_employee SET
                name = '$name',
                age = '$age',
                address = '$address',
                contact_no = '$contact_no',
                account_no = '$account_no',
                emp_category_id = '$category'
                WHERE id = $id";

        //Execute the query
        $res2 = mysqli_query($conn,$sql2);

        //check whether the query is executed or not
        if($res2==TRUE)
        {
            //Query executed and employee updated
            $_SESSION['update-employee'] = "<div class='alert alert-success'><strong>Employee Updated Successfully!</strong></div>";
            //Redirect to  Add category page
            header('location:'.SITEURL.'admin/manage-employee.php');
        }
        else
        {
            //Failed to Update room
            $_SESSION['update-employee'] = "<div class='alert alert-danger'><strong>Failed to Update Employee!</strong></div>";
            //Redirect to  Add category page
            header('location:'.SITEURL.'admin/manage-employee.php');
        }

    }
?>