<?php include("partials/menu.php") ?>

<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
      <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
      <h1 class="h2"><i class="bi bi-gear-fill"></i>Due Payments</h1>
      </div>
        <br>

        <?php
            
                 //Sql query to select room Category
                 $sql  = "SELECT * FROM tbl_monthly_payment ";

                 //Execute the query
                 $res = mysqli_query($conn, $sql);

                 //count rows to check whether we have categories or not
                 $count = mysqli_num_rows($res);

                  //count the rows
                  if($count>0)
                  {
                      //we have a data in database
                      while($row=mysqli_fetch_assoc($res))
                      {
                          //get all the details
                          $year = $row['year'];
                          $month = $row['month'];
                             
                      }
                      
                  }
                  else
                  {
                     
                  }
                  
            ?>

    <div class="container">
        <form class="row g-3" action="due-payments.php" method="POST">
        <div class="col-md-12">
            <label for="inputEmail4" class="form-label">Year</label>
            <div class="col-md-11">
            <input type="text" name="year" class="form-control" placeholder="Enter Year..">
        </div>
        <div class="col-md-12">
            <label for="inputPassword4" class="form-label">Month</label>
            <div class="col-md-11">
            <input type="text" name="month" class="form-control" placeholder="Enter Year..">
        </div>
        <br>
        <div class="col-2">
            <input type="submit" class="btn btn-color form-control p-2" name="search_student"  value="Search">
        </div>
        </form>
        </div>
    </main>



<?php include("partials/footer.php") ?>