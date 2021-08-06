<?php include("partials/menu.php") ?>

<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
<?php

        if(isset($_POST['search_employee']))
            {
                $emp_id = $_POST['emp_name'];
                
                $sql2 = "SELECT tbl_employee.name 
                FROM tbl_employee_salary INNER JOIN tbl_employee ON tbl_employee_salary.emp_id = tbl_employee.id WHERE tbl_employee.id = $emp_id";
                
                $res2 = mysqli_query($conn, $sql2);
                
               if($res2 == TRUE)
               {
                $row2 = mysqli_fetch_assoc($res2);
                $emp_name = $row2['name'];
                ?>
                <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                <h1 class="h2"><i class="bi bi-gear-fill"></i>Salary History of <?php echo $emp_name; ?></h1>
                <?php
               }
               else
               {

               }

            }
        ?>

      
      </div>

      <div class="table-responsive">
        <table class="table table-striped table-md">
          <thead>
            <tr>
              <th>#</th>
              <th>Year</th>
              <th>Month</th>
              <th>Paid Date</th>
            </tr>
          </thead>

          <?php
            echo $salary_id = " ";
            echo $year = " ";
            echo $month = " ";
            echo $salary_date = " ";
            echo $emp_name  = " ";

          

            if(isset($_POST['search_employee']))
            {
                $emp_id = $_POST['emp_name'];
                
                $sql = "SELECT tbl_employee_salary.salary_id, tbl_employee_salary.year,tbl_employee_salary.month,tbl_employee_salary.salary_date,tbl_employee.name 
                FROM tbl_employee_salary INNER JOIN tbl_employee ON tbl_employee_salary.emp_id = tbl_employee.id WHERE tbl_employee.id = $emp_id";
                
                $res = mysqli_query($conn, $sql);
                
                $count = mysqli_num_rows($res);

                if($count>0)
                {
                    while($row = mysqli_fetch_assoc($res))
                    {
                            
                            $emp_name = $row['name'];
                            $salary_id = $row['salary_id'];
                            $year = $row['year'];
                            $month = $row['month'];
                            $salary_date = $row['salary_date'];
                            ?>
                             

          <tbody>
            <tr>
              <td><?php echo $salary_id;?></td>
              <td><?php echo $year;?></td>
              <td><?php echo $month;?></td>
              <td><?php echo $salary_date;?></td>
            </tr>
            <?php
                    }

                }
                else
                {

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