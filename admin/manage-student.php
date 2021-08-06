<?php include("partials/menu.php") ?>

<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
      <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
      <h1 class="h2"><i class="bi bi-gear-fill"></i>Manage Students</h1>
        <div class="btn-toolbar mb-2 mb-md-0">
          <div class="btn-group me-2">
            <a href="add-student.php" type="button" class="btn btn-md btn-outline-secondary">Add Student</a>  
          </div>
        </div>
      </div>

      <?php
        if(isset($_SESSION['add-student']))//checking whether the session is set or not
        {
            echo $_SESSION['add-student'];//Display the session message if set
            unset($_SESSION['add-student']);//Remove session message
        }

        if(isset($_SESSION['update-student']))//checking whether the session is set or not
        {
            echo $_SESSION['update-student'];//Display the session message if set
            unset($_SESSION['update-student']);//Remove session message
        }
        ?>

      <div class="table-responsive">
        <table class="table table-striped table-md">
          <thead>
            <tr>
              <th>#</th>
              <th>Full Name</th>
              <th>Contact No</th>
              <th>Email</th>
              <th>Action</th>
              
            </tr>
          </thead>

          <?php

                //Create SQL query to get all the student details
                $sql = "SELECT * FROM tbl_student";

                //Execute the query
                $res = mysqli_query($conn, $sql);

                //Check whether the query is executed or not
                if($res==TRUE)
                {
                    //Count rows to check whether we have student or not
                    $count = mysqli_num_rows($res);

                    //Create Serial number variable and set default value as 1
                    $sn=1;

                    //Check the num of rows
                    if($count>0)
                    {
                        //get the students from database and display
                        while($rows=mysqli_fetch_assoc($res))
                        {
                            //get the values from individual columns
                            $id = $rows['id'];
                            $full_name = $rows['full_name'];
                            $age = $rows['age'];
                            $address = $rows['address'];
                            $contact_no = $rows['contact_no'];
                            $email = $rows['email'];
                            $account_no = $rows['account_no'];
                            $university = $rows['university'];
                            $faculty = $rows['faculty'];
                            $degree = $rows['degree'];
                            $mothers_name = $rows['mothers_name'];
                            $mothers_contact_no = $rows['mothers_contact_no'];
                            $fathers_name = $rows['fathers_name'];
                            $fathers_contact_no = $rows['fathers_contact_no'];
                           
                            ?>

          <tbody>
            <tr>
              <td><?php echo $sn++;?></td>
              <td><?php echo $full_name;?></td>
              <td><?php echo $contact_no;?></td>
              <td><?php echo $email;?></td>
              <td>
              <?php 
                $sql2 = "SELECT * FROM tbl_room WHERE Student_id=$id";

                $res2 = mysqli_query($conn, $sql2);

                $count2 = mysqli_num_rows($res2);

                if($res2==TRUE)
                {
                  $count2 = mysqli_num_rows($res2);
                  
                  if($count2==0)
                  {
                    ?>
                  <a href="<?php echo SITEURL;?>admin/view-student.php?id=<?php echo $id;?>" class="btn btn-md btn-outline-info">View</a>
                  <a href="<?php echo SITEURL;?>admin/update-student.php?id=<?php echo $id;?>" class="btn btn-md btn-outline-warning">Update</a>
                  <a href="<?php echo SITEURL;?>admin/deposit-student.php?id=<?php echo $id;?>" class="btn btn-md btn-outline-danger">Deposit</a>
                  <button class="btn btn-outline-success dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">Allocate</button>
                    <ul class="dropdown-menu bg-light dropdown-menu-end">
                        <li><a class="dropdown-item" href="<?php echo SITEURL;?>admin/single-rooms.php?id=<?php echo $id;?>">Single Rooms</a></li>
                        <li><a class="dropdown-item" href="#">Shared Rooms</a></li>
                        <li><a class="dropdown-item" href="#">Single with Attached</a></li>
                        <li><a class="dropdown-item" href="#">Shared with Attached</a></li>
                    </ul>
                  <?php
                  }
                  else
                  {
                    ?>
                  <a href="<?php echo SITEURL;?>admin/view-student.php?id=<?php echo $id;?>" class="btn btn-md btn-outline-info">View</a>
                  <a href="<?php echo SITEURL;?>admin/update-student.php?id=<?php echo $id;?>" class="btn btn-md btn-outline-warning">Update</a>
                  <a href="<?php echo SITEURL;?>admin/deposit-student.php?id=<?php echo $id;?>" class="btn btn-md btn-outline-danger">Deposit</a>
                  <button class="btn btn-outline-success disabled" type="button">Allocated</button>
                  <?php
                  }
                  //$student_id = $row['Student_id'];
                }
                else
                {

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