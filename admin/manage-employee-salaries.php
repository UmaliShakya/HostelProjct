<?php include("partials/menu.php") ?>

<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
      <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
      <h1 class="h2"><i class="bi bi-gear-fill"></i>Monthly Employee Salary Reports</h1>
      <div class="btn-toolbar mb-2 mb-md-0">
          <div class="btn-group me-2">
            <a href="add-employee-salaries.php" type="button" class="btn btn-md btn-outline-secondary">Pay Salaries</a>  
          </div>
          <div class="btn-group me-2">
            <a href="salary-history-search.php" type="button" class="btn btn-md btn-outline-secondary">History</a>  
          </div>
          <div class="btn-group me-2">
            <a href="due-salaries-search.php" type="button" class="btn btn-md btn-outline-secondary">Due payment</a>  
          </div>
        </div>
      </div>

      <div class="table-responsive">
        <table class="table table-striped table-md">
          <thead class="text-center">
            <tr>
              <th>#</th>
              <th>Employee Name</th>
              <th>Year</th>
              <th>Month</th>
              <th>Paid Date</th>
              <th>Action</th>
            </tr>
          </thead>

          <?php
        
            $sql = "SELECT tbl_employee_salary.salary_id,
                        tbl_employee_salary.year,
                        tbl_employee_salary.month,
                        tbl_employee_salary.salary_date,
                        tbl_employee.name
            FROM tbl_employee_salary INNER JOIN tbl_employee ON tbl_employee_salary.emp_id=tbl_employee.id";

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
                         $salary_id = $rows['salary_id'];
                         $emp_name = $rows['name'];
                         $year = $rows['year'];
                         $month = $rows['month'];
                         $salary_date = $rows['salary_date'];

        ?>
        <tbody class="text-center">
            <tr>
              <td><?php echo $salary_id;?></td>
              <td><?php echo $emp_name;?></td>
              <td><?php echo $year;?></td>
              <td><?php echo $month;?></td>
              <td><?php echo $salary_date;?></td>
              <td>
              <a href="#"  class="btn btn-md btn-outline-danger">Due</a>
              <a href="#" class="btn btn-md btn-outline-info">Print</a>
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