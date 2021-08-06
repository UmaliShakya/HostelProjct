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

  #cat{
    border-radius:5px;
  }


 
</style>

    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
      <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2"><i class="fas fa-cog" > Dashboard</i></h1>
      </div>

         
      <?php
        if(isset($_SESSION['login']))
        {
            echo $_SESSION['login'];
            unset($_SESSION['login']);
        }
        ?>

      <div class="row" id="part1">
        <div class="col-sm-3">
        <div class="card  shadow p-2 mb-4 bg-light" id="dash">
          <div class="card-body bg-light" id="dash-body">
            <?php
            //SQL Query
            $sql="SELECT * FROM tbl_admin";
            //Execute Query
            $res=mysqli_query($conn, $sql);
            //Count the rows
            $count=mysqli_num_rows($res);
            ?>
            <h1><i class="fas fa-user-friends"> <?php echo $count;?></i></h1>
            <h4>Admins</h4>
          </div>
        </div>
        </div>
        <div class="col-sm-3">
        <div class="card  shadow p-2 mb-4 bg-light" id="dash">
          <div class="card-body bg-light" id="dash-body">
            <?php
            //SQL Query
            $sql="SELECT * FROM tbl_student";
            //Execute Query
            $res=mysqli_query($conn, $sql);
            //Count the rows
            $count=mysqli_num_rows($res);
            ?>
            <h1><i class="fas fa-user-graduate"> <?php echo $count;?></i></h1>
            <h4>Students</h4>
          </div>
        </div>
        </div>
        <div class="col-sm-3">
        <div class="card  shadow p-2 mb-4 bg-light" id="dash">
        <div class="card-body" id="dash-body">
            <?php
            //SQL Query
            $sql="SELECT * FROM tbl_room";
            //Execute Query
            $res=mysqli_query($conn, $sql);
            //Count the rows
            $count=mysqli_num_rows($res);
            ?>
            <h1><i class="fas fa-home">  <?php echo $count;?></i></h1>
            <h4>Rooms</h4>
          </div>
        </div>
        </div>
        <div class="col-sm-3">
        <div class="card  shadow p-2 mb-4 bg-light" id="dash">
        <div class="card-body" id="dash-body">
            <?php
            //SQL Query
            $sql="SELECT * FROM tbl_employee";
            //Execute Query
            $res=mysqli_query($conn, $sql);
            //Count the rows
            $count=mysqli_num_rows($res);
            ?>
            <h1><i class="fas fa-users">  <?php echo $count;?></i></h1>
            <h4>Employees</h4>
          </div>
        </div>
        </div>
      </div>

        <div class="row-sm " id="part2">
        <h5 class="heading text-center pb-0">Available Rooms</h5>
        <div class="row pt-2">
          <div class="col-6 pt-1">
            <div class="shadow-sm  p-4 mb-4 bg-white mb-4 bg-light border"  id="cat">
              <div class="row">
                    <?php
                    //SQL Query
                    $sql="SELECT * FROM tbl_room WHERE room_category_id='1' AND status='Available'";
                    //Execute Query
                    $res=mysqli_query($conn, $sql);
                    //Count the rows
                    $count=mysqli_num_rows($res);
                    ?>
                <div class="col-sm-6">
                  <h5><a href="single-rooms.php" class="text-dark" >Single Rooms</a></h5>
                </div>
                <div class="col-sm-6">
                  <h5><a href="single-rooms.php" class="text-dark" ><?php echo $count;?> </a></h5>
                </div>
              </div>
            </div>
            <div class="shadow-sm  p-4 mb-4 bg-white mb-4 bg-light border"  id="cat">
              <div class="row">
                    <?php
                    //SQL Query
                    $sql="SELECT * FROM tbl_room WHERE room_category_id='2' AND status='Available'";
                    //Execute Query
                    $res=mysqli_query($conn, $sql);
                    //Count the rows
                    $count=mysqli_num_rows($res);
                    ?>
                <div class="col-sm-6">
                  <h5><a href="shared-rooms.php" class="text-dark" >Shared Rooms</a></h5>
                </div>
                <div class="col-sm-6">
                  <h5><a href="shared-rooms.php" class="text-dark" ><?php echo $count;?> </a></h5>
                </div>
              </div>
            </div>
          </div>
          <div class="col-6 pt-1  ">
          <div class="shadow-sm  p-4 mb-4 bg-white mb-4 bg-light border "  id="cat">
              <div class="row">
                    <?php
                    //SQL Query
                    $sql="SELECT * FROM tbl_room WHERE room_category_id='3' AND status='Available'";
                    //Execute Query
                    $res=mysqli_query($conn, $sql);
                    //Count the rows
                    $count=mysqli_num_rows($res);
                    ?>
                <div class="col-sm-8">
                  <h5><a href="single-attached.php" class="text-dark" >Single Rooms with Attached Bathrooms</a></h5>
                </div>
                <div class="col-sm-4">
                  <h5><a href="single-attached.php" class="text-dark" ><?php echo $count;?> </a></h5>
                </div>
              </div>
            </div>
            <div class="shadow-sm  p-4 mb-4 bg-white mb-4 bg-light border ">
              <div class="row">
                    <?php
                    //SQL Query
                    $sql="SELECT * FROM tbl_room WHERE room_category_id='4' AND status='Available'";
                    //Execute Query
                    $res=mysqli_query($conn, $sql);
                    //Count the rows
                    $count=mysqli_num_rows($res);
                    ?>
                <div class="col-sm-8">
                  <h5><a href="shared-attached.php" class="text-dark" >Shared Rooms with Attached Bathrooms</a></h5>
                </div>
                <div class="col-sm-4">
                  <h5><a href="shared-attached.php" class="text-dark" ><?php echo $count;?> </a></h5>
                </div>
              </div>
            </div>
            </div>

          </div>
        </div>
        
      </div>
    </main>
  </div>
</div>


    <script src="/docs/5.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>

      <script src="https://cdn.jsdelivr.net/npm/feather-icons@4.28.0/dist/feather.min.js" integrity="sha384-uO3SXW5IuS1ZpFPKugNNWqTZRRglnUJK6UAZ/gxOX80nxEkN9NcGZTftn6RzhGWE" crossorigin="anonymous"></script><script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.4/dist/Chart.min.js" integrity="sha384-zNy6FEbO50N+Cg5wap8IKA4M/ZnLJgzc6w2NqACZaK0u0FXfOWRRJOnQtpZun8ha" crossorigin="anonymous"></script><script src="dashboard.js"></script>
  </body>
</html>
