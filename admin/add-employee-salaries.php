<?php include("partials/menu.php") ?>

<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
      <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
      <h1 class="h2"><i class="bi bi-gear-fill"></i>Add Employee Salaries</h1>
      </div>

      <?php
        if(isset($_SESSION['add-salaries']))//checking whether the session is set or not
        {
            echo $_SESSION['add-salaries'];//Display the session message if set
            unset($_SESSION['add-salaries']);//Remove session message
        }

        if(isset($_SESSION['add-ledger']))//checking whether the session is set or not
        {
            echo $_SESSION['add-ledger'];//Display the session message if set
            unset($_SESSION['add-ledger']);//Remove session message
        }
        
        ?>

      <div class="container">
        <form class="row g-3" method="POST">
        <div class="row">
            <label for="inputEmail4" class="form-label">Employee Name</label>
            <div class="col-md-11">
                <select class="form-select" aria-label="Default select example" name="emp_name">
                <option selected>--Select Employee Name--</option>
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
        </form>
        </div>

        <?php

            $employee_id = "";
            $emp_name = "";
            $emp_category = "";
            $emp_salary = "";


        if(isset($_POST['search_employee']))
        {
            $stu_id = $_POST['emp_name'];

            $sql = "SELECT tbl_employee.id, tbl_employee.name, tbl_employee.emp_category_id, tbl_employee_category.salary FROM tbl_employee INNER JOIN tbl_employee_category ON tbl_employee.emp_category_id = tbl_employee_category.id";

            $res = mysqli_query($conn, $sql);

            //$count = mysqli_num_rows($res);

            if($res)
            {
               $row = mysqli_fetch_assoc($res);
                
                    $employee_id = $row['id'];
                    $emp_name = $row['name'];
                    $emp_category = $row['emp_category_id'];
                    $emp_salary = $row['salary'];
                    
            }
            else
            {

            }
           
        }

        ?>
        <form class="row g-3" method="POST">
        <div class="col-md-12">
            <label for="inputPassword4" class="form-label">Employee ID</label>
            <input type="text" class="form-control" name="emp_id" value="<?php echo $employee_id;?>">
        </div>
        <div class="col-12">
            <label for="inputAddress" class="form-label">Employee Name</label>
            <input type="text" class="form-control" name="emp_name" value="<?php echo $emp_name;?>">
        </div>
        <div class="col-12">
            <label for="inputAddress" class="form-label">Employee Category ID</label>
            <input type="text" class="form-control" name="emp_category" value="<?php echo $emp_category;?>" >
        </div>
        <div class="col-12">
            <label for="inputAddress" class="form-label">Employee Salary</label>
            <input type="text" class="form-control" name="emp_salary" value="<?php echo $emp_salary;?>" >
        </div>
        <div class="col-12">
            <label for="inputAddress" class="form-label">Year</label>
            <input type="text" class="form-control" name="year" >
        </div>
        <div class="col-12">
            <label for="inputAddress" class="form-label">Month</label>
            <input type="text" class="form-control" name="month" >
        </div>
        
        
        <div class="col-2">
            <input type="submit" class="btn btn-color form-control p-2" name="submit" value="Done">
        </div>
        </form>
        <br>
        </div>
    </main>
  </div>
</div>

<?php include("partials/footer.php") ?>

        <?php 
            if(isset($_POST['submit']))
            {
                //$payment_id = $_POST['payment_id'];
                 $employee_id = $_POST['emp_id'];
                //  $emp_name = $_POST['room_no'];
                 $emp_category = $_POST['emp_category'];
                 $emp_salary = $_POST['emp_salary'];
                 //$date = $_POST['date'];
                 $year = $_POST['year'];
                 $month = $_POST['month'];

                 $sql = "INSERT INTO tbl_employee_salary SET
                        emp_id = '$employee_id',
                        emp_category_id = '$emp_category',
                        account_id = 3,
                        salary = '$emp_salary',
                        year = '$year',
                        month = '$month',
                        salary_date = current_timestamp()";

                //Execute the query
                $res = mysqli_query($conn, $sql);

                //Check whether query is executed or not
                if($res)
                {
                    //Display the message to successfully added room 
                    // $_SESSION['add_salary'] = "<div class='alert alert-success'><strong>Successfully Paid Employee Salaries.!</strong> </div>";

                    //Sql query to select room Category
                    $sql2 = " SELECT * FROM tbl_ledger ORDER BY balance DESC LIMIT 1";

                    //Execute the query
                    $res2 = mysqli_query($conn, $sql2);

                    //count rows to check whether we have categories or not
                    $count2 = mysqli_num_rows($res2);

                    //count the rows
                    if($count2>0)
                    {
                        //we have a data in database
                        while($row2=mysqli_fetch_assoc($res2))
                        {
                            //get all the details
                            $balance = $row2['balance'];
                            echo $balance;

                            $balance_n = $balance - $emp_salary;
                            echo $balance_n;
                            $sql = "INSERT INTO tbl_ledger SET
                           account_id = 3,
                             debit = 0,
                             credit = '$emp_salary',
                             balance = '$balance_n',
                            payment_date = current_timestamp()";
         
                             $res = mysqli_query($conn, $sql);
                            
         
                            //Check whether query is executed or not
                              if($res)
                             {
                              //Display the message to successfully added room 
                              $_SESSION['add_ledger'] = "<div class='alert alert-success'><strong>Successfully Addded to the Ledger.!</strong> </div>";
         
                              //Redirect to manage room  pge
                             //header('location:'.SITEURL.'admin/success-salary.php');
                                         
                          }
                             else
                             {
                             $_SESSION['add_payment'] = "<div class='alert alert-danger'><strong>Failed to Added to the Ledger!</strong> </div>";
         
                             //Redirect to manage room  pge
                              header('location:'.SITEURL.'admin/manage-ledger.php');
                             }
                         }
                   }
                     else
                     {
                     }
                     //Redirect to manage room  pge
                     header('location:'.SITEURL.'admin/success-salary.php');
                    
                }
                else
                {
                    //Failed to added room 
                    $_SESSION['add_salary'] = "<div class='alert alert-danger'><strong>Failed to Paid Employee Salaries!</strong> </div>";

                    //Redirect to manage room  pge
                    header('location:'.SITEURL.'admin/Add-payment.php');
                }
            }
            
        

                   
                            
                 
                 

                
                //Execute the query
                
                
        ?>



        

        

        