<?php include("partials/menu.php") ?>

<?php
    if(isset($_GET['id']))

    {
        //Get the ID of selected Student
        $id = $_GET['id'];
       
        //Create sql query to get the details
        $sql = "SELECT tbl_employee.id, tbl_employee.name, tbl_employee.age, tbl_employee.address, tbl_employee.contact_no, tbl_employee.account_no, tbl_employee_category.title FROM tbl_employee INNER JOIN tbl_employee_category ON 
        tbl_employee.emp_category_id=tbl_employee_category.id WHERE tbl_employee.id = $id";

        //Execute the Query
        $res = mysqli_query($conn, $sql);

        //check whether the query is executed or not
        if($res==TRUE)
        {
            //check whether the data is available or not
            $count = mysqli_num_rows($res);

            //Check whether we have student data or not
            if($count==1)
            {
                //get the details
                $row = mysqli_fetch_assoc($res);
                $emp_name = $row['name'];
                $age = $row['age'];
                $address = $row['address'];
                $contact_no = $row['contact_no'];
                $account_no = $row['account_no'];
                $category_name = $row['title'];

                
            
            }
            else
            {
                //redirect to manage student page
                header('location:'.SITEURL.'admin/view-employee.php');
            }
        }
    }
    
?>

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
    font-family: 'Noto Serif', serif; 
    border-radius:5px;
  }

  #table-body{
    height:30vh;
    border-radius:5px;
    

  }

  a{
      text-decoration:none;
  }

  #setting{
    font-family: 'Noto Serif', serif;
  }


 
</style>

    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
      <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2 mx-auto"><?php echo $emp_name;?>'s <small>Profile</small></h1>
      </div>

      <div class="row w-50 h-50  pt-4  mx-auto" id="setting">
            <div class="shadow-sm p-4 mb-4 bg-light border  "  id="cat">
                <di class="row mx-auto">
                <div class="col-sm-5">

                  <h5 class="">ID</h5>
                  <h5 class="">Name</h5>
                  <h5 class="">Age</h5>
                  <h5 class="">Address</h5>
                  <h5 class="">Contact No</h5>
                  <h5 class="">Bank Account No</h5>
                  <h5 class="">Category Title</h5>

                </div>
                
                <div class="col-sm-6">
                  <h5 class="">: <?php echo $id;?></h5>
                  <h5 class="">: <?php echo $emp_name;?></h5>
                  <h5 class="">: <?php echo $age;?></h5>
                  <h5 class="">: <?php echo $address;?></h5>
                  <h5 class="">: <?php echo $contact_no;?></h5>
                  <h5 class="">: <?php echo $account_no;?></h5>
                  <h5 class="">: <?php echo $category_name;?></h5>
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
