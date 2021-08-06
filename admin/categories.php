<?php include("partials/menu.php") ?>

<style>
  #dash{
    height:30vh;
    margin-top:10px;
    margin-bottom:8px;
    padding: 5px;
    border-radius:5px;
    border: 1px solid grey;
    
  }

  #dash-body{
    text-align:center;
    margin-top:40px;
    font-family:'Times New Roman', Times, serif; 
    
  }

  .heading{
    margin-top:3px;
    padding:10px;
    font-weight:bold;
    font-family:'Times New Roman', Times, serif; 
    border-radius:5px;
  }

  #table-body{
    height:30vh;
    border-radius:5px;
  }

  a{
      text-decoration:none;
  }

 
</style>

    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
      <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Manage Categories</h1>
      </div>

      <div class="row" id="part1">
        <div class="col-sm-6">
        <div class="card  shadow p-2 mb-4 bg-light" id="dash">
          <div class="card-body bg-light" id="dash-body">
            <?php
            //SQL Query
            $sql="SELECT * FROM tbl_room_category";
            //Execute Query
            $res=mysqli_query($conn, $sql);
            //Count the rows
            $count=mysqli_num_rows($res);
            ?>
            <h1><i class="fas fa-home"> <?php echo $count;?></i></h1>
            <h4><a href="manage-room-category.php" class="text-dark" >Room category</a></h4>
          </div>
        </div>
        </div>
        
        <div class="col-sm-6">
        <div class="card  shadow p-2 mb-4 bg-light" id="dash">
        <div class="card-body" id="dash-body">
            <?php
            //SQL Query
            $sql="SELECT * FROM tbl_employee_category";
            //Execute Query
            $res=mysqli_query($conn, $sql);
            //Count the rows
            $count=mysqli_num_rows($res);
            ?>
            <h1><i class="fas fa-users">  <?php echo $count;?></i></h1>
            <h4><a href="manage-employee-category.php" class="text-dark" >Employee Category</a></h4>
          </div>
        </div>
        </div>
      </div>

      <div class="row" id="part2">
      <div class="col-6">
        <h5 class="heading">Room Categories</h5>
        <table class="table table-md table-hover table-striped border-bottom" id="table-body">
        <thead class="text-center">
          <tr class="text-center">
            <th>#</th>
            <th>Category Name</th>
            <th>Features</th>
            <th>Rental</th>
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

                <tbody class="text-center">
                <tr>
                <td><?php echo $sn++?></td>
                <td><?php echo $category_name?></td>
                <td><?php echo $features?></td>
                <td><?php echo $rental?></td>
                </tr>
                <?php
                        }
                    }
                }

        ?>

        </tbody>
      </table>
      </div>
      <div class="col-6">
      <h5 class="heading">Employee Categories</h5>
        <table class="table table-md table-hover table-striped border-bottom" id="table-body">
        <thead class="text-center">
          <tr class="text-center">
            <th>#</th>
            <th>Category Name</th>
            <th>Salary</th>
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


                    <tbody class="text-center">
                        <tr>
                        <td><?php echo  $sn++;?></td>
                        <td><?php echo $title;?></td>
                        <td><?php echo $salary;?></td>
                        </tr>
                        <?php
                                    }
                                }
                            }

                        ?>            
        </tbody>
      </table>
        </div>
      </div>
    </main>
  </div>
</div>


    <script src="/docs/5.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>

      <script src="https://cdn.jsdelivr.net/npm/feather-icons@4.28.0/dist/feather.min.js" integrity="sha384-uO3SXW5IuS1ZpFPKugNNWqTZRRglnUJK6UAZ/gxOX80nxEkN9NcGZTftn6RzhGWE" crossorigin="anonymous"></script><script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.4/dist/Chart.min.js" integrity="sha384-zNy6FEbO50N+Cg5wap8IKA4M/ZnLJgzc6w2NqACZaK0u0FXfOWRRJOnQtpZun8ha" crossorigin="anonymous"></script><script src="dashboard.js"></script>
  </body>
</html>
