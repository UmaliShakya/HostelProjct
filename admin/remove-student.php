<?php include("partials/menu.php") ?>

<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
      <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
      <h1 class="h2"><i class="bi bi-gear-fill"></i>Remove Allocated Student</h1>
      </div>

      <?php

        //Get the id in room category to be selected category
        $room_id = $_GET['id'];

        //Create the query to get all the details
        $sql =  "SELECT * FROM tbl_room WHERE tbl_room.id=$room_id";

        //Execute the query
        $res = mysqli_query($conn, $sql);

        //check whether query is executed or not
        if($res)
        {
            
        
            //get all the details
                $row = mysqli_fetch_assoc($res);
                

                $room_id = $row['id'];
                $room_no = $row['room_no']  ;
                $status = $row['status'];
                $student_id = $row['Student_id'];
                //$student_name = $row['full_name'];
                //$student_id = $row['student_id'];

        }   

        ?>


      <div class="container">
        <form class="row g-3" method="POST">
        <div class="col-md-12">
            <label for="full_name" class="form-label">Room ID</label>
            <input type="text" class="form-control" name="room_id" value="<?php echo $room_id;?>">
        </div>
        <div class="col-md-12">
            <label for="username" class="form-label">Status</label>
            <select class="form-select" aria-label="Default select example" name="status" id="status">
                <option><?php echo $status;?></option>
                <option <?php if($status=="Available"){echo "selected";} ?> value="Available">Available</option>
                <option <?php if($status=="Not Available"){echo "selected";} ?>value="Not Available">Not Available</option>
                <option <?php if($status=="Maintenance"){echo "selected";} ?>value="Maintenance">Maintenance</option>
            </select>
        </div>
        <div class="col-12">
            <label for="password" class="form-label">Student ID</label>
            <input type="text" name="student_id" class="form-control" value="<?php echo $student_id==NULL;?>">
        </div>
        
        <div class="col-2">
        <input type="hidden" name="id" value="<?php echo $room_id;?>">
        <input class="btn btn-color" type="submit" value="Allocate" name="submit">
        </div>
        </form>
        </div>
    </main>
  </div>
</div>

        <?php
             if(isset($_POST['submit']))
             {
                 //Get all details from the form
                 $room_id = $_POST['id'];
                 $status = $_POST['status'];
                 $student_id = $_POST['Student_id'];
         
                 //Upload the room in database
                 $sql2 = "UPDATE tbl_room SET
                        status = '$status',
                        Student_id = NULL
                         WHERE id  = $room_id";
         
                 //Execute the query
                 $res2 = mysqli_query($conn,$sql2);
         
                 //check whether the query is executed or not
                 if($res2==TRUE)
                 {
                     //Query executed and room updated
                     $_SESSION['remove-allocate'] = "<div class='alert alert-success'><strong>Removed Allocated Student Successfully.!</strong></div>";
                     
                     //Redirect to  Add category page
                     header('location:'.SITEURL.'admin/single-rooms.php');
                 }
                 else
                 {
                     //Failed to Update room
                     $_SESSION['remove-allocate'] = "<div class='alert alert-danger'><strong>Failed to Remove Allocated Student.!</strong></div>";
                     
                     //Redirect to  Add category page
                     header('location:'.SITEURL.'admin/single-rooms.php');
                 }
         
             }

            
            ?>


<?php include("partials/footer.php") ?>