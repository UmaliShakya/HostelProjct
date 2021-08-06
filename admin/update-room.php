<?php include("partials/menu.php") ?>

<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
      <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
      <h1 class="h2"><i class="bi bi-gear-fill"></i>Update Room</h1>
      </div>

      <?php

        //check whether id is set or not
        if(isset($_GET['id']))
        {
            //get all the details
            $id = $_GET['id'];

            //SQL query to get the selected food
            $sql = "SELECT * FROM tbl_room WHERE id=$id";

            //Execute the query
            $res = mysqli_query($conn, $sql);

            //Get the value based on query executed
            $row = mysqli_fetch_assoc($res);

            //Get the individual value of selected food
            $room_no = $row['room_no'];
            $current_category = $row['room_category_id'];
            $status = $row['status'];
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
            <label for="inputName" class="form-label">Room No</label>
            <input type="text" class="form-control" name="room_no" value="<?php echo $room_no;?>">
        </div>
        <div class="col-md-12">
            <label for="inputAge" class="form-label">Room Category</label>
            <select class="form-select" aria-label="Default select example" name="category">
            <option selected>Select Room Category </option>
            
            <?php

            //Sql query to select  room category
            $sql = "SELECT * FROM tbl_room_category";

            //Execute the Query
            $res = mysqli_query($conn, $sql);

            //Count rows to check whether we have categories
            $count = mysqli_num_rows($res);

            //Count the rows
            if($count>0)
            {
                //We have data in database
                while($row=mysqli_fetch_assoc($res))
                {
                    //get all the details
                    $category_id = $row['id'];
                    $category_name = $row['category_name'];
                    ?>
                    <option <?php if($current_category==$category_id){echo "Selected";} ?> value="<?php echo $category_id;?>"><?php echo $category_name;?></option>
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
            <select class="form-select" aria-label="Default select example" name="status" value="<?php echo $status;?>">
            <option><?php echo $status;?></option>
                <option value="Available">Available</option>
                <option value="Not Available">Not Available</option>
                <option value="Maintenance">Maintenance</option>
            </select>
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
        $room_no = $_POST['room_no'];
        $category = $_POST['category'];
        $status = $_POST['status'];

        //Upload the room in database
        $sql2 = "UPDATE tbl_room SET
               room_no = '$room_no',
               status = '$status',
               room_category_id = '$category'
                WHERE id  = $id";

        //Execute the query
        $res2 = mysqli_query($conn,$sql2);

        //check whether the query is executed or not
        if($res2==TRUE)
        {
            //Query executed and room updated
            $_SESSION['update-room'] = "<div class='alert alert-success'><strong>Room Updated Successfully.!</strong></div>";
            //Redirect to  Add category page
            header('location:'.SITEURL.'admin/manage-room.php');
        }
        else
        {
            //Failed to Update room
            $_SESSION['update-room'] = "<div class='alert alert-danger'><strong> Failed to Update Room</strong></div>";
            //Redirect to  Add category page
            header('location:'.SITEURL.'admin/manage-room.php');
        }

    }
?>