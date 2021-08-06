<?php include("partials/menu.php") ?>

<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
      <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
      <h1 class="h2"><i class="bi bi-gear-fill"></i>Manage Employee Category</h1>
        <div class="btn-toolbar mb-2 mb-md-0">
          <div class="btn-group me-2">
            <a href="add-employee-category.php" type="button" class="btn btn-md btn-outline-secondary">Add Employee Category</a>  
          </div>
        </div>
      </div>

      <?php
        if(isset($_SESSION['add-employee-category']))//checking whether the session is set or not
        {
            echo $_SESSION['add-employee-category'];//Display the session message if set
            unset($_SESSION['add-employee-category']);//Remove session message
        }

        if(isset($_SESSION['update-employee-category']))//checking whether the session is set or not
        {
            echo $_SESSION['update-employee-category'];//Display the session message if set
            unset($_SESSION['update-employee-category']);//Remove session message
        }
        ?>

      <div class="table-responsive">
        <table class="table table-striped table-md">
          <thead>
            <tr>
              <th>#</th>
              <th>Title</th>
              <th>Salary</th>
              <th>Action</th>
              
            </tr>
          </thead>

          <?php

                //Query  to get all room category
                $sql = "SELECT * FROM tbl_employee_category";

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
                            $title = $row['title'];
                            $salary = $row['salary'];

                            //Display the data
                            ?>


          <tbody>
            <tr>
              <td><?php echo  $sn++;?></td>
              <td><?php echo $title;?></td>
              <td><?php echo $salary;?></td>
              <td>
              <a href="<?php echo SITEURL;?>admin/update-employee-category.php?id=<?php echo $id;?>" class="btn btn-md btn-outline-warning">Update</a>
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