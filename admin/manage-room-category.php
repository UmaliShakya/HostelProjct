<?php include("partials/menu.php") ?>

<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
      <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
      <h1 class="h2"><i class="bi bi-gear-fill"></i>Manage Room Category</h1>
        <div class="btn-toolbar mb-2 mb-md-0">
          <div class="btn-group me-2">
            <a href="add-room-category.php" type="button" class="btn btn-md btn-outline-secondary">Add Room Category</a>  
          </div>
        </div>
      </div>

      <?php
        if(isset($_SESSION['add-room-category']))//checking whether the session is set or not
        {
            echo $_SESSION['add-room-category'];//Display the session message if set
            unset($_SESSION['add-room-category']);//Remove session message
        }
        if(isset($_SESSION['update-room-category']))//checking whether the session is set or not
        {
            echo $_SESSION['update-room-category'];//Display the session message if set
            unset($_SESSION['update-room-category']);//Remove session message
        }
        ?>

      <div class="table-responsive">
        <table class="table table-striped table-md">
          <thead>
            <tr>
              <th>#</th>
              <th>Category Name</th>
              <th>Features of Room</th>
              <th>Rental</th>
              <th>Action</th>
              
            </tr>
          </thead>

          <?php

            //Query  to get all room category
            $sql = "SELECT * FROM tbl_room_category";

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
                        $category_name = $row['category_name'];
                        $features = $row['features'];
                        $rental = $row['rental'];

                        //Display the data
                        ?>

          <tbody>
            <tr>
              <td><?php echo $sn++?></td>
              <td><?php echo $category_name?></td>
              <td><?php echo $features?></td>
              <td><?php echo $rental?></td>
              <td>
              <a href="<?php echo SITEURL;?>admin/update-room-category.php?id=<?php echo $id;?>"  class="btn btn-md btn-outline-warning">Update</a>
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