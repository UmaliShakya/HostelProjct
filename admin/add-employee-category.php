<?php include("partials/menu.php") ?>

<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
      <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
      <h1 class="h2"><i class="bi bi-gear-fill"></i>Add Employee Category</h1>
      </div>

      <?php
        if(isset($_SESSION['add-employee-category']))//checking whether the session is set or not
        {
            echo $_SESSION['add-employee-category'];//Display the session message if set
            unset($_SESSION['add-employee-category']);//Remove session message
        }
        ?>

      <div class="container">
        <form class="row g-3" method="POST">
        <div class="col-md-12">
            <label for="inputName" class="form-label">Title</label>
            <input type="text" class="form-control" name="title" placeholder="Enter Category Name">
        </div>
        <div class="col-md-12">
            <label for="inputAge" class="form-label">Salary</label>
            <input type="text" class="form-control" name="salary" placeholder="Enter Employee Category salary">
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

    //Check whether submit button is clicked or not
    if(isset($_POST['submit']))
    {
        //get the all the data from form
        $title = $_POST['title'];
        $salary = $_POST['salary'];

        //SQL query to insert data into database
        $sql = "INSERT INTO tbl_employee_category SET
                title = '$title',
                salary = $salary";

        //Execute the query
        $res = mysqli_query($conn, $sql);

        //Check whether the query is executed or not
        if($res==TRUE)
        {
            //Display the message to successfully added employee category
            $_SESSION['add-employee-category'] = "<div class='alert alert-success'><strong>Successfully Added Employee Category!</strong></div>";

            //Redirect to manage employee category pge
            header('location:'.SITEURL.'admin/manage-employee-category.php');
        
        }
        else
        {
            //Failed to added employee category
            $_SESSION['add-employee-category'] = "<div class='alert alert-danger'><strong>Failed to Added Employee Category!</strong></div>";

            //Redirect to manage employee category pge
            header('location:'.SITEURL.'admin/manage-employee-category.php');
        }
    }
?>
