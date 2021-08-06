<?php include("partials/menu.php") ?>

<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
      <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
      <h1 class="h2"><i class="bi bi-gear-fill"></i>Monthly Payment Reports</h1>
      <div class="btn-toolbar mb-2 mb-md-0">
          <div class="btn-group me-2">
            <a href="add-payments.php" type="button" class="btn btn-md btn-outline-secondary">Add payment</a>  
          </div>
          <div class="btn-group me-2">
            <a href="payment-history-search.php" type="button" class="btn btn-md btn-outline-secondary">History</a>  
          </div>
          <div class="btn-group me-2">
            <a href="due-payments-search.php" type="button" class="btn btn-md btn-outline-secondary">Due payment</a>  
          </div>
        </div>
      </div>

      <div class="table-responsive">
        <table class="table table-striped table-md">
          <thead class="text-center">
            <tr>
              <th>#</th>
              <th>Student Name</th>
              <th>Room No</th>
              <th>Year</th>
              <th>Month</th>
              <th>Paid Date</th>
              <th>Action</th>
            </tr>
          </thead>

          <?php
        
            $sql = "SELECT tbl_monthly_payment.payment_id, tbl_monthly_payment.room_no,tbl_monthly_payment.year,tbl_monthly_payment.month,tbl_monthly_payment.pay_date,tbl_student.id,tbl_student.full_name 
            FROM tbl_monthly_payment INNER JOIN tbl_student ON tbl_monthly_payment.student_id = tbl_student.id 
            ";

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
                         $payment_id = $rows['payment_id'];
                         $student_id = $rows['id'];
                         $student_name = $rows['full_name'];
                         $room_no = $rows['room_no'];
                         $year = $rows['year'];
                         $month = $rows['month'];
                         $pay_date = $rows['pay_date'];

        ?>
        <tbody class="text-center">
            <tr>
              <td><?php echo $payment_id;?></td>
              <td><?php echo $student_id;?></td>
              <td><?php echo $room_no;?></td>
              <td><?php echo $year;?></td>
              <td><?php echo $month;?></td>
              <td><?php echo $pay_date;?></td>
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