<?php include("partials/menu.php") ?>

<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
      <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
      <h1 class="h2"><i class="bi bi-gear-fill"></i>Manage Employees</h1>
        <div class="btn-toolbar mb-2 mb-md-0">
          <div class="btn-group me-2">
            <a href="add-employee.php" type="button" class="btn btn-md btn-outline-secondary">Add Employee</a>  
          </div>
        </div>
      </div>

      <?php
        if(isset($_SESSION['add-employee']))//checking whether the session is set or not
        {
            echo $_SESSION['add-employee'];//Display the session message if set
            unset($_SESSION['add-employee']);//Remove session message
        }

        if(isset($_SESSION['update-employee']))//checking whether the session is set or not
        {
            echo $_SESSION['update-employee'];//Display the session message if set
            unset($_SESSION['update-employee']);//Remove session message
        }
        ?>

      <div class="table-responsive">
        <table class="table table-striped table-md">
          <thead>
            <tr>
              <th>#</th>
              <th>Full Name</th>
              <th>Address</th>
              <th>Contact No</th>
              <th>Category Title</th>
              <th>Action</th>
              
            </tr>
          </thead>

          <?php

                //Query  to get all rooms
                $sql = "SELECT tbl_employee.id, tbl_employee.name, tbl_employee.age, tbl_employee.address, tbl_employee.contact_no, tbl_employee.account_no, tbl_employee_category.title FROM tbl_employee INNER JOIN tbl_employee_category ON 
                        tbl_employee.emp_category_id=tbl_employee_category.id";

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
                            $name = $row['name'];
                            $address = $row['address'];
                            $contact_no = $row['contact_no'];
                            $category_name = $row['title'];

                            //Display the data
                            ?>

          <tbody>
            <tr>
              <td><?php echo $sn++;?></td>
              <td><?php echo $name;?></td>
              <td><?php echo $address;?></td>
              <td><?php echo $contact_no;?></td>
              <td><?php echo $category_name;?></td>
              <td>
              <a href="<?php echo SITEURL;?>admin/view-employee.php?id=<?php echo $id;?>" class="btn btn-md btn-outline-info">View</a>
              <a href="<?php echo SITEURL;?>admin/update-employee.php?id=<?php echo $id;?>"class="btn btn-md btn-outline-warning">Update</a>
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