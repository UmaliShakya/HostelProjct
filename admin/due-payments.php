<?php include("partials/menu.php") ?>

<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
<?php
        if(isset($_POST['search_student']))
        {
            $yr = $_POST['year'];
            $mn = $_POST['month'];
            
            $sql1 = "SELECT * FROM tbl_monthly_payment";
            $res1 = mysqli_query($conn, $sql1);

            if($res1 == TRUE)
            {
                $row1 = mysqli_fetch_assoc($res1);
                //$yr = $row1['year'];
                $mnt = $row1['month'];

                ?>
                <h3 class="text_center">Payments in <?php echo $mn . " " . $yr;?></h3>
                <br><?php
            }
            else
            {

            }
        }
        ?>
      </div>

      <div class="table-responsive">
        <table class="table table-striped table-md">
          <thead class="text-center">
            <tr>
              
              <th>Room No</th>
              <th>Student Name</th>
              <th>Status</th>
            </tr>
          </thead>

          <?php

            if(isset($_POST['search_student']))
            {
                $year = $_POST['year'];
                $month = $_POST['month'];
               
                $sql = "SELECT tbl_room.room_no, tbl_student.full_name FROM tbl_student INNER JOIN tbl_room ON tbl_room.Student_id = tbl_student.id";

                $res = mysqli_query($conn, $sql);

                if($res == TRUE)
                {
                    while($row = mysqli_fetch_assoc($res))
                    {
                        $room_no = $row['room_no'];
                        $student_name = $row['full_name'];
                        

                        ?>
                        <tbody>
                        <tr>
                            <td class="text-center"><?php echo $room_no; ?></td>
                            <td class="text-center"><?php echo $student_name; ?></td>
                            <td class="text-center">
                                <?php 
                                              
                                $sql2 = "SELECT * FROM tbl_monthly_payment WHERE  room_no = $room_no AND year =$year AND month='january'
                                /*WHERE room_no = $room_no AND year =$year AND month=$month*/";

                                $res2 = mysqli_query($conn, $sql2);
                                
                                if($res2 == TRUE)
                                {
                                    $count = mysqli_num_rows($res2);

                                    if($count == 0)
                                    {
                                         ?><button class="btn btn-warning">DUE</button><?php  
                                    }
                                    else
                                    {
                                        ?><button class="btn btn-success">DONE</button><?php  
                                      
                                    }
                                }else {
                                    echo "error";

                                }
                                

                                ?>

        
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