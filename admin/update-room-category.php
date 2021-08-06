<?php include("partials/menu.php") ?>

<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
      <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
      <h1 class="h2"><i class="bi bi-gear-fill"></i>Update Room Category</h1>
      </div>

      <?php

            //Get the id in room category to be selected category
            $id = $_GET['id'];

            //Create the query to get all the details
            $sql =  "SELECT * FROM tbl_room_category WHERE id=$id";

            //Execute the query
            $res = mysqli_query($conn, $sql);

            //check whether query is executed or not
            if($res==TRUE)
            {
                //Check whether the data is available or not
                $count = mysqli_num_rows($res);

                //check the num of rows
                if($count==1)
                {
                    //get all the details
                    $row = mysqli_fetch_assoc($res);
                    $category_name = $row['category_name'];
                    $features = $row['features'];
                    $rental = $row['rental'];

                }
                else
                {
                    //Redirect to manage room category page
                    header('location:'.SITEURL.'admin/manage-room-category.php');
                }
            }

        ?>

      <div class="container">
        <form class="row g-3" method="POST">
        <div class="col-md-12">
            <label for="inputName" class="form-label">Category Name</label>
            <input type="text" class="form-control" name="category_name" value="<?php echo $category_name;?>">
        </div>
        <div class="col-md-12">
            <label for="inputAge" class="form-label">Features of Room</label>
            <textarea class="form-control" name="features" rows="3" ><?php echo $features;?></textarea>
        </div>
        <div class="col-12">
            <label for="inputAddress" class="form-label">Rental of Room</label>
            <input type="text" class="form-control" name="rental" value="<?php echo $rental;?>">
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

    //Check whether submit button is clicked or not
    if(isset($_POST['submit']))
    {
        //get all details from form to update
        $id  = $_POST['id'];
        $category_name = $_POST['category_name'];
        $features = $_POST['features'];
        $rental = $_POST['rental'];

        //SQL query to update room categories
        $sql = "UPDATE tbl_room_category SET
                category_name = '$category_name',
                features = '$features',
                rental = $rental
                WHERE id = '$id'";
        
        //Execute the Query
        $res  = mysqli_query($conn, $sql);

        //Check whether query is executed or not
        if($res==TRUE)
        {
            //Updated Successfully
            $_SESSION['update-room-category'] = "<div class='alert alert-success'><strong>Room Category Updated Successfully.!</strong></div>";

            //Redirect page
            header('location:'.SITEURL.'admin/manage-room-category.php');
        }
        else
        {
            echo 'Failed to Updated'; 
            $_SESSION['update-room-category'] = "<div class='alert alert-danger'><strong>Failed to Updated Room Category!</strong></div>";

            //Redirect page
            header('location:'.SITEURL.'admin/manage-room-category.php');
        }
        
    }
?>
