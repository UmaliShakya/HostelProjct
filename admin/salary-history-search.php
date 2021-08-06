<?php include("partials/menu.php") ?>

<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
      <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
      <h1 class="h2"><i class="bi bi-gear-fill"></i>Employee Salary History</h1>
      </div>
        <br><br>
      <div class="container">
        <form class="row g-3" action="salary-History.php" method="POST">
        <div class="row">
            <label for="inputEmail4" class="form-label">Employee Name</label>
            <div class="col-md-11">
                <select class="form-select" aria-label="Default select example" name="emp_name">
                <option value="">--Select Employee Name--</option>
                <?php
            
                 //Sql query to select room Category
                 $sql  = "SELECT * FROM tbl_employee ";

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
                          $emp_id = $row['id'];
                          $emp_name = $row['name'];
                          ?>
                          <option value="<?php echo $emp_id;?>"><?php echo $emp_name;?></option>
                          <?php
                             
                      }
                      
                  }
                  else
                  {
                     
                  }
                  
            ?>
                </select>
            </div>
            <div class="col-md-1">
                <input class="btn btn-color" type="submit" name="search_employee"  value="Search">
            </div>
        </div>
        
        </form>
        <br>
        </div>
    </main>
  </div>
</div>

<?php include("partials/footer.php") ?>