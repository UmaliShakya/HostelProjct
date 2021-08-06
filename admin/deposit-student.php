<?php include("partials/menu.php") ?>

<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
      <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
      <h1 class="h2"><i class="bi bi-gear-fill"></i>Add Deposit</h1>
      </div>

      <?php
        if(isset($_SESSION['add-deposit']))//checking whether the session is set or not
        {
            echo $_SESSION['add-deposit'];//Display the session message if set
            unset($_SESSION['add-deposit']);//Remove session message
        }

        ?>

      <?php
            
                //get all the details
                $student_id = $_GET['id'];

                //SQL query to get the selected student
                $sql = "SELECT tbl_room.Student_id, tbl_room.room_no, tbl_room.Student_id,tbl_room_category.id, tbl_room_category.category_name, tbl_room_category.rental 
                FROM tbl_room INNER JOIN tbl_room_category ON tbl_room.room_category_id = tbl_room_category.id 
                WHERE tbl_room.Student_id=$student_id";

                //Execute the query
                $res = mysqli_query($conn, $sql);

                //Get the value based on query executed
                $row = mysqli_fetch_assoc($res);

                //Get the individual value of selected student
                $room_no = $row['room_no'];
                $room_category_id = $row['id'];
                $room_category_name = $row['category_name'];
                $rental = $row['rental'];
                //$contact_no = $row['contact_no'];
                //$account_no = $row['account_no'];
                //$current_category = $row['emp_category_id'];
  
        ?>


      <div class="container">
        <form class="row g-3" method="POST">
        <div class="col-md-12">
            <label for="full_name" class="form-label">Student ID</label>
            <input type="text" class="form-control" name="student_id" value="<?php echo $student_id; ?>">
        </div>
        <div class="col-md-12">
            <label for="username" class="form-label">Room No</label>
            <input type="text" class="form-control" name="room_no" value="<?php echo $room_no; ?>">

        </div>
        <div class="col-12">
            <label for="password" class="form-label">Room Category ID</label>
            <input type="text" name="room_category_id" value="" class="form-control" value="<?php echo $room_category_name;?>">
        </div>

        <div class="col-12">
            <label for="password" class="form-label">Deposit</label>
            <input type="text" name="rental"  class="form-control" value="<?php echo $rental; ?>">
        </div>
        
        <div class="col-2">
            <input type="submit" class="btn btn-color form-control p-2" name="submit" value="Add">
        </div>
        </form>
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
        $id = $_POST['deposit_id'];
        $student_id = $_POST['student_id'];
        $room_no = $_POST['room_no'];
        $room_category_id = $_POST['room_category_id'];
        $rental = $_POST['rental'];
        //$date = $_POST['date'];

        //Create sql query to save the data into database
        $sql = "INSERT INTO tbl_deposit SET
                student_id = '$student_id',
                room_no = '$room_no',
                room_category_id = '$room_category_id',
                deposit = $rental,
                effective_date = current_timestamp()";
        
        //Execute the query
        $res = mysqli_query($conn, $sql);

        //Check whether query is executed or not
        if($res==TRUE)
        {
            //Display the message to successfully added room 
            $_SESSION['add'] = "<div class='success'>Successfully Added Student Deposit! </div>";

            //Redirect to manage room  pge
            header('location:'.SITEURL.'admin/manage-student.php');
        }
        else
        {
            //Failed to added room 
            $_SESSION['add'] = "<div class='success'>Failed to Added Student Deposit! </div>";

            //Redirect to manage room  pge
            header('location:'.SITEURL.'admin/manage-student.php');
        }

    }

?>
