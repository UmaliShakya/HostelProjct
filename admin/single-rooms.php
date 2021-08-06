<?php include("partials/menu.php") ?>

<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
      <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
      <h1 class="h2"><i class="bi bi-gear-fill"></i>Single Rooms</h1>
      </div>

      <?php
        if(isset($_SESSION['room-allocate']))//checking whether the session is set or not
        {
            echo $_SESSION['room-allocate'];//Display the session message if set
            unset($_SESSION['room-allocate']);//Remove session message
        }
        if(isset($_SESSION['remove-allocate']))//checking whether the session is set or not
        {
            echo $_SESSION['remove-allocate'];//Display the session message if set
            unset($_SESSION['remove-allocate']);//Remove session message
        }

        ?>

      <div class="table-responsive">
        <table class="table table-striped table-md">
          <thead>
            <tr>
                <th>Room ID</th>
                <th>Room No</th>
                <th>Student ID</th>
                <th>Room Status</th>
                <th>Action</th>
            </tr>
          </thead>

          <?php 
             //Query to get all Single Rooms
             $sql = "SELECT tbl_room.id, tbl_room.room_no,tbl_room.status,tbl_room.Student_id, tbl_student.full_name  from tbl_room
             LEFT JOIN tbl_student ON tbl_student.id=tbl_room.Student_id where tbl_room.room_category_id=1";

             $res=mysqli_query($conn, $sql);

             if($res){
                $count = mysqli_num_rows($res);

                if($count>0)
                    {
                        //we have data in database
                        while($row=mysqli_fetch_assoc($res))
                        {
                            //get the all data
                           
                            $room_id = $row['id'];
                            $room_no = $row['room_no'];
                            $status = $row['status'];

                            $student_id = $row['Student_id'];
                            $full_name = $row['full_name'];

                            //Display the data
                            ?>

          <tbody>
            <tr>
              <td><?php echo $room_id;?></td>
              <td><?php echo $room_no;?></td>
              <td><?php echo $full_name;?></td>
              <td>
              <?php
                    if($student_id == NULL && $status == "Available")
                    {
                        ?><button  class="btn btn-info">Available</button>
                        <?php
                    }
                    else if($student_id !== NULL && $status == "Not Available")
                    {
                        ?><button  class="btn btn-danger disabled">Not Available</button>
                        <?php
                    }
                    else if($student_id == NULL && $status == "Maintenance")
                    {
                        ?><button  class="btn btn-dark">Maintenance</button>
                        <?php
                    }
                ?>
                                                  
            </td>
            <td>
            
            <?php
                
                //$stu_id = $_GET['id'];

                if($student_id == NULL && $status == "Available")
                {
                  
                  
                    ?><a href="<?php echo SITEURL;?>admin/vacant-student.php?id=<?php echo $student_id;?>&room_id=<?php echo $room_id;?>" class="btn btn-md btn-outline-success">Vacant</a></td>
                    <?php
                }
                else if($student_id == NULL && $status == "Maintenance")
                {
                    ?><button  class="btn btn-md btn-outline-dark disabled">Maintenance</button>
                    <a href="<?php echo SITEURL;?>admin/remove-student.php?id=<?php echo $room_id;?>" class="btn btn-md btn-outline-warning">Remove</a>
                    <?php
                }
                else if($student_id != NULL && $status == "Not Available")
                {
                    ?><button  class="btn btn-md btn-outline-danger disabled">Allocated</button>
                    <a href="<?php echo SITEURL;?>admin/remove-student.php?id=<?php echo $room_id;?>" class="btn btn-btn-md btn-outline-warning">Remove</a>
                    <?php
                }
                else
                {
                    ?><button  class="btn btn-md btn-outline-danger disabled">Allocated</button>
                    <a href="<?php echo SITEURL;?>admin/remove-student.php?id=<?php echo $room_id;?>" class="btn btn-md btn-outline-warning">Remove</a>
                    <?php
                }
                ?>                
            </td>
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