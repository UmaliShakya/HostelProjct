<?php include("partials/menu.php") ?>

<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
      <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
      <h1 class="h2"><i class="bi bi-gear-fill"></i>Add New Room</h1>
      </div>

      <?php
        if(isset($_SESSION['add-room']))//checking whether the session is set or not
        {
            echo $_SESSION['add-room'];//Display the session message if set
            unset($_SESSION['add-room']);//Remove session message
        }
        ?>
      
      <div class="container">
        <form class="row g-3" method="POST">
        <div class="col-md-12">
            <label for="inputName" class="form-label">Room No</label>
            <input type="text" class="form-control" name="room_no" placeholder="Enter Room No">
        </div>
        <div class="col-md-12">
            <label for="inputAge" class="form-label">Room Category</label>
            <select class="form-select" aria-label="Default select example" name="category_name">
            <option>--Select Room Category--</option>
            <?php
            
                 //Sql query to select room Category
                 $sql  = "SELECT * FROM tbl_room_category ";

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
                          $category_name = $row['category_name'];
                          ?>
                          <option value="<?php echo $id;?>"><?php echo $category_name;?></option>
                          <?php
                          
                      }
                  }
                  else
                  {
                     
                  }

                 
                
            ?>
            </select>
        </div>
        <div class="col-12">
            <label for="inputAddress" class="form-label">Status</label>
            <select class="form-select" aria-label="Default select example" name="status">
                <option value="Available">Available</option>
                <option value="Not Available">Not Available</option>
                <option value="Maintenance">Maintenance</option>
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
        $room_no = $_POST['room_no'];
        $category_name = $_POST['category_name'];
        $status = $_POST['status'];

        //Create sql query to save the data into database
        $sql = "INSERT INTO tbl_room SET
                room_no = '$room_no',
                status = '$status',
                room_category_id = '$category_name'";
        
        //Execute the query
        $res = mysqli_query($conn, $sql);

        //Check whether query is executed or not
        if($res==TRUE)
        {
            //Display the message to successfully added room 
            $_SESSION['add-room'] = "<div class='alert alert-success'><strong>Successfully Added Room.!</strong> </div>";

            //Redirect to manage room  pge
            header('location:'.SITEURL.'admin/manage-room.php');
        }
        else
        {
            //Failed to added room 
            $_SESSION['add-room'] = "<div class='alert alert-danger'><strong>Failed to Added Room.!</strong></div>";

            //Redirect to manage room  pge
            header('location:'.SITEURL.'admin/manage-room.php');
        }

    }

?>
