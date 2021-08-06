<?php include("partials/menu.php") ?>

<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
      <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
      <h1 class="h2"><i class="bi bi-gear-fill"></i>Add Room Category</h1>
      </div>

      <?php
        if(isset($_SESSION['add-room-category']))//checking whether the session is set or not
        {
            echo $_SESSION['add-room-category'];//Display the session message if set
            unset($_SESSION['add-room-category']);//Remove session message
        }
        ?>

      <div class="container">
        <form class="row g-3" method="POST">
        <div class="col-md-12">
            <label for="inputName" class="form-label">Category Name</label>
            <input type="text" class="form-control" name="category_name" placeholder="Enter Category Name">
        </div>
        <div class="col-md-12">
            <label for="inputAge" class="form-label">Features of Room</label>
            <textarea class="form-control" name="features" rows="3"></textarea>
        </div>
        <div class="col-12">
            <label for="inputAddress" class="form-label">Rental of Room</label>
            <input type="text" class="form-control" name="rental" placeholder="Enter Rental of Room">
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
        $category_name = $_POST['category_name'];
        $features = $_POST['features'];
        $rental = $_POST['rental'];

        //SQL query to insert data into database
        $sql = "INSERT INTO tbl_room_category SET
                category_name = '$category_name',
                features = '$features',
                rental = $rental";

        //Execute the query
        $res = mysqli_query($conn, $sql);

        //Check whether the query is executed or not
        if($res==TRUE)
        {
            //Display the message to successfully added room category
            $_SESSION['add-room-category'] = "<div class='alert alert-success'><strong>Successfully Added Room Category!</strong></div>";

            //Redirect to manage room category pge
            header('location:'.SITEURL.'admin/manage-room-category.php');
        
        }
        else
        {
            //Failed to added room category
            $_SESSION['add-room-category'] = "<div class='alert alert-danger'><strong>Failed to Added Room Category!</strong></div>";

            //Redirect to manage room category pge
            header('location:'.SITEURL.'admin/add-room-category.php');
        }
    }
?>