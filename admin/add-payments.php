<?php include("partials/menu.php") ?>

<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
      <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
      <h1 class="h2"><i class="bi bi-gear-fill"></i>Add Fees</h1>
      </div>

      <?php
        if(isset($_SESSION['add-payment']))//checking whether the session is set or not
        {
            echo $_SESSION['add-payment'];//Display the session message if set
            unset($_SESSION['add-payment']);//Remove session message
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
            <label for="inputEmail4" class="form-label">Student Name</label>
            <div class="col-md-11">
                <select class="form-select" aria-label="Default select example" name="student_name">
                <option selected>--Select Student Name--</option>
                <?php
            
                 //Sql query to select room Category
                 $sql  = "SELECT * FROM tbl_student ";

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
                          $stu_id = $row['id'];
                          $student_name = $row['full_name'];
                          ?>
                          <option value="<?php echo $stu_id;?>"><?php echo $student_name;?></option>
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
                <input class="btn btn-color" type="submit" name="search_student"  value="Search">
            </div>
        </form>
        </div>

        <?php

            $student_id = "";
            $room_no = "";
            $room_category_name = "";
            $monthly_payment = "";


        if(isset($_POST['search_student']))
        {
            $stu_id = $_POST['student_name'];

            $sql = "SELECT tbl_room.room_no,tbl_room.Student_id, tbl_room_category.id, tbl_room_category.category_name, tbl_room_category.rental 
            FROM tbl_room INNER JOIN tbl_room_category ON tbl_room.room_category_id = tbl_room_category.id WHERE tbl_room.Student_id = $stu_id";

            $res = mysqli_query($conn, $sql);

            //$count = mysqli_num_rows($res);

            if($res)
            {
               $row = mysqli_fetch_assoc($res);
                
                    $student_id = $row['Student_id'];
                    $room_no = $row['room_no'];
                    $room_category_name = $row['category_name'];
                    $monthly_payment = $row['rental'];
                    
            }
            else
            {

            }
           
        }

        ?>
        <form class="row g-3" method="POST">
        <div class="col-md-12">
            <label for="inputPassword4" class="form-label">Student ID</label>
            <input type="text" class="form-control" name="student_id" value="<?php echo $student_id;?>">
        </div>
        <div class="col-12">
            <label for="inputAddress" class="form-label">Room No</label>
            <input type="text" class="form-control" name="room_no" value="<?php echo $room_no;?>">
        </div>
        <div class="col-12">
            <label for="inputAddress" class="form-label">Room Category</label>
            <input type="text" class="form-control" name="room-category" value="<?php echo $room_category_name;?>" >
        </div>
        <div class="col-12">
            <label for="inputAddress" class="form-label">Monthly Payment</label>
            <input type="text" class="form-control" name="month_payment" value="<?php echo $monthly_payment;?>" >
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
                 $student_id = $_POST['student_id'];
                 $room_no = $_POST['room_no'];
                 $room_category_name = $_POST['room-category'];
                 $monthly_payment = $_POST['month_payment'];
                 //$date = $_POST['date'];
                 $year = $_POST['year'];
                 $month = $_POST['month'];

                 $sql = "INSERT INTO tbl_monthly_payment SET
                        student_id = '$student_id',
                        account_id = 1,
                        room_no = '$room_no',
                        room_category_name = '$room_category_name',
                        rental = '$monthly_payment',
                        year = '$year',
                        month = '$month',
                        pay_date = current_timestamp()";

                //Execute the query
                $res = mysqli_query($conn, $sql);

                //Check whether query is executed or not
                if($res)
                {
                    //Display the message to successfully added room 
                    // $_SESSION['add_payment'] = "<div class='alert alert-success'><strong>Successfully Paid Student Monthly Fee.!</strong> </div>";

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

                                //$payment_id = $_POST['payment_id'];
                                $account_id = $_POST['account'];
                                $monthly_payment = $_POST['month_payment'];

                                $sql = "INSERT INTO tbl_ledger SET
                                account_id = 1,
                                    debit = '$monthly_payment',
                                credit = 0,
                                balance = '$balance' + '$monthly_payment',
                                    payment_date = current_timestamp()";

                                $res = mysqli_query($conn, $sql);

                                    //Check whether query is executed or not
                                    if($res)
                                    {
                                    //Display the message to successfully added room 
                                    $_SESSION['add_ledger'] = "<div class='alert alert-success'><strong>Successfully Addded to the Ledger.!</strong> </div>";

                                    //Redirect to manage room  pge
                                header('location:'.SITEURL.'admin/success-payment.php');
                                                
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
                         
                                

                
                //Execute the query
                
         
                    //Redirect to manage room  pge
                    header('location:'.SITEURL.'admin/success-payment.php');
                    
                }
                else
                {
                    //Failed to added room 
                    $_SESSION['add_ledger'] = "<div class='alert alert-danger'><strong>Failed to Paid Student Monthly Fee!</strong> </div>";

                    //Redirect to manage room  pge
                    header('location:'.SITEURL.'admin/Add-payment.php');
                }
            }
        ?>

<?php 


       
        ?>


        

        