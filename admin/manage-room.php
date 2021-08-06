<?php include("partials/menu.php") ?>

<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
      <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
      <h1 class="h2"><i class="bi bi-gear-fill"></i>Manage Rooms</h1>
        <div class="btn-toolbar mb-2 mb-md-0">
          <div class="btn-group me-2">
            <a href="add-room.php" type="button" class="btn btn-md btn-outline-secondary">Add Room</a>  
          </div>
        </div>
      </div>

      <?php
        if(isset($_SESSION['add-room']))//checking whether the session is set or not
        {
            echo $_SESSION['add-room'];//Display the session message if set
            unset($_SESSION['add-room']);//Remove session message
        }
        if(isset($_SESSION['update-room']))//checking whether the session is set or not
        {
            echo $_SESSION['update-room'];//Display the session message if set
            unset($_SESSION['update-room']);//Remove session message
        }
        ?>

      <div class="table-responsive">
        <table class="table table-striped table-md">
          <thead>
            <tr>
              <th>#</th>
              <th>Room No</th>
              <th>Room Category</th>
              <th>Status</th>
              <th>Action</th>
            </tr>
          </thead>

          <?php

                //Query  to get all rooms
                $sql = "SELECT tbl_room.id, tbl_room.room_no, tbl_room.status,tbl_room.Student_id, tbl_room_category.category_name FROM tbl_room INNER JOIN tbl_room_category ON 
                        tbl_room.room_category_id=tbl_room_category.id";

                //Execute the query
                $res = mysqli_query($conn, $sql);

                //check whether query is executed or not
                if($res==TRUE)
                {
                    //Count the rows to check whether we have data
                    $count = mysqli_num_rows($res);

                    //Create variable and assign the value
                    $sn=1;

                    //check the num of rows
                    if($count>0)
                    {
                        //we have data in database
                        while($row=mysqli_fetch_assoc($res))
                        {
                            //get the all data
                            $id = $row['id'];
                            $room_no = $row['room_no'];
                            $category_name = $row['category_name'];
                            $status = $row['status'];
                            $student_id = $row['Student_id'];

                            //Display the data
                            ?>

        
          <tbody>
            <tr>
              <td><?php echo $sn++;?></td>
              <td><?php echo $room_no;?></td>
              <td><?php echo $category_name;?></td>
              <td>
              <?php
                    if($student_id == NULL && $status == "Available")
                    {
                        ?><button  class="btn btn-info">Available</button>
                        <?php
                    }
                    else if($student_id != NULL && $status == "Not Available")
                    {
                        ?><button  class="btn btn-danger disabled">Not Available</button>
                        <?php
                    }
                    else if($student_id == NULL && $status == "Maintenance")
                    {
                        ?><button  class="btn btn-dark disabled">Maintenance</button>
                        <?php
                    }
                ?>
              </td>
              <td>
              <a href="<?php echo SITEURL;?>admin/view-room.php?id=<?php echo $id;?>" class="btn btn-md btn-outline-info">View</a>
              <a href="<?php echo SITEURL;?>admin/update-room.php?id=<?php echo $id;?>" class="btn btn-md btn-outline-warning">Update</a>
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