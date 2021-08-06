<?php include("partials/menu.php") ?>

<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
<?php

        if(isset($_POST['search_student']))
            {
                $stu_id = $_POST['student_name'];
                
                $sql2 = "SELECT tbl_student.full_name 
                FROM tbl_monthly_payment INNER JOIN tbl_student ON tbl_monthly_payment.student_id = tbl_student.id WHERE tbl_student.id = $stu_id";
                
                $res2 = mysqli_query($conn, $sql2);
                
               if($res2 == TRUE)
               {
                $row2 = mysqli_fetch_assoc($res2);
                $student_name = $row2['full_name'];
                ?>
                <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                <h1 class="h2"><i class="bi bi-gear-fill"></i>Payments History of <?php echo $student_name; ?></h1>
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
            echo $payment_id = " ";
            echo $year = " ";
            echo $month = " ";
            echo $pay_date = " ";
            echo $student_name  = " ";

          

            if(isset($_POST['search_student']))
            {
                $stu_id = $_POST['student_name'];
                
                $sql = "SELECT tbl_monthly_payment.payment_id, tbl_monthly_payment.year,tbl_monthly_payment.month,tbl_monthly_payment.pay_date,tbl_student.full_name 
                FROM tbl_monthly_payment INNER JOIN tbl_student ON tbl_monthly_payment.student_id = tbl_student.id WHERE tbl_student.id = $stu_id";
                
                $res = mysqli_query($conn, $sql);
                
                $count = mysqli_num_rows($res);

                if($count>0)
                {
                    while($row = mysqli_fetch_assoc($res))
                    {
                            
                            $student_name = $row['full_name'];
                            $payment_id = $row['payment_id'];
                            $year = $row['year'];
                            $month = $row['month'];
                            $pay_date = $row['pay_date'];
                            ?>
                             

          <tbody>
            <tr>
              <td><?php echo $payment_id;?></td>
              <td><?php echo $year;?></td>
              <td><?php echo $month;?></td>
              <td><?php echo $pay_date;?></td>
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