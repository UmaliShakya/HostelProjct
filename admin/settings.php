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
        <h1 class="h2"><i class="fas fa-tools" > Manage Ledger Settings</i></h1>
        <div class="btn-toolbar mb-2 mb-md-0">
          <div class="btn-group me-2">
            <button type="button" class="btn btn-sm btn-outline-secondary">Share</button>
            <button type="button" class="btn btn-sm btn-outline-secondary">Export</button>
          </div>
          <button type="button" class="btn btn-sm btn-outline-secondary dropdown-toggle">
            <span data-feather="calendar"></span>
            This week
          </button>
        </div>
      </div>

      <div class="row  h-50 mx-auto pt-4" id="setting">
            <div class="shadow-sm  p-4 mb-4 bg-light border text-center"  id="cat">
                <div class="col-sm-6 mx-auto">
                  <h5><a href="manage-accounts.php" class="text-dark" >Manage Account Details</a></h5>
                </div>
            </div>
            <div class="shadow-sm  p-4 mb-4 bg-light border text-center text-justify"  id="cat">
                <div class="col-sm-6 mx-auto ">
                  <h5><a href="monthly-payment-reports.php" class="text-dark  " >Manage Student Payments</a></h5>
                </div>
            </div>

            <div class="shadow-sm  p-4 mb-4 bg-light  border text-center text-justify"  id="cat">
                <div class="col-sm-6 mx-auto">
                  <h5><a href="manage-employee-salaries.php" class="text-dark" >Manage Employee Salaries</a></h5>
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
