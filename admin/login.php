<?php include('../config/constants.php');

?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.83.1">
    <title>Hostel Management</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/5.0/examples/dashboard/">
    <link rel="stylesheet" href="../CSS/admin.css">

    

    <!-- Bootstrap core CSS -->
<link href="/docs/5.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.min.js" integrity="sha384-Atwg2Pkwv9vp0ygtn1JAojH0nYbwNJLPhwyoVbhoPwBhjQPR5VtM2+xf0Uwh9KtT" crossorigin="anonymous"></script>

    <!-- Favicons -->
<link rel="apple-touch-icon" href="/docs/5.0/assets/img/favicons/apple-touch-icon.png" sizes="180x180">
<link rel="icon" href="/docs/5.0/assets/img/favicons/favicon-32x32.png" sizes="32x32" type="image/png">
<link rel="icon" href="/docs/5.0/assets/img/favicons/favicon-16x16.png" sizes="16x16" type="image/png">
<link rel="manifest" href="/docs/5.0/assets/img/favicons/manifest.json">
<link rel="mask-icon" href="/docs/5.0/assets/img/favicons/safari-pinned-tab.svg" color="#7952b3">
<link rel="icon" href="/docs/5.0/assets/img/favicons/favicon.ico">
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">

<meta name="theme-color" content="#7952b3">


    <style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }

      .btn-color{
        background-color: rgb(98, 150, 150);
      }

      #sidebarMenu {
            background-color: rgb(98, 150, 150);
        }

        .body-login{
            background-color: rgb(120, 187, 196);
            height: 100vh;
            font-family: 'Noto Serif', serif;
        }

        .shadow-sm{
            background-color: rgb(120, 187, 196);
            
        }

        .border-clr {
            border: 5px solid rgb(1, 83, 104);
            border-radius: 5px;
        }

        .color{
            background-color: darkcyan;
        }

      
    </style>

    
    <!-- Custom styles for this template -->
    <!-- <link href="dashboard.css" rel="stylesheet"> -->
  </head>
  <body>
    
<header class="navbar navbar-dark sticky-top bg-dark flex-md-nowrap p-1 shadow">
  <a class="navbar-brand col-md-3 col-lg-2 me-0 px-3" href="#">Serene Hostel</a>
  <button class="navbar-toggler position-absolute d-md-none collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <!-- <input class="form-control form-control-dark w-100" type="text" placeholder="Search" aria-label="Search"> -->
  
</header>

<div class="body-login container-fluid pt-5">
            <div class="shadow-sm  p-4 mb-4 mb-4 border  w-50 mx-auto h-75 border border-radius border-clr "  id="cat">
              <div class="container-fluid">
                <div class="col-sm ">
                  <h1 class="text-center pt-2">LOGIN</h1>

                  <?php

                    if(isset($_SESSION['login']))
                    {
                        echo $_SESSION['login'];
                        unset($_SESSION['login']);
                    }

                    if(isset($_SESSION['no-login-message']))
                    {
                        echo $_SESSION['no-login-message'];
                        unset($_SESSION['no-login-message']);
                    }
                    ?>

                  <form action="" class="pt-4" method="POST">
                    <div class="form-group">
                        <label for="username"><h5>Username :</h5></label>
                        <input type="text" class="form-control" name="username" placeholder="Enter username" >
                    </div>
                    <br>
                    <div class="form-group">
                        <label class="" for="pwd"><h5>Password :</h5></label>
                        <input type="password" class="form-control" name="password" placeholder="Enter password">
                    </div>
                    <br><br>
                    <input type="submit" name="submit" class="btn btn-lg btn-color w-100 border border-secondary text-white" value="LOGIN">
                  </form><br><br>
                  <p class="text-center">Created By - <a href="www.umalishakya.com">Umali Shakya</a></p>
                </div>
              </div>
            </div>
</div>


<?php include("partials/footer.php") ?>

<?php

    //Check whether the submit button is clicked or Not
    if(isset($_POST['submit']))
    {
        //Process for login
        //Get the Data from Login form
        $username = $_POST['username'];
        $password = md5($_POST['password']);

        //Sql to check whether the user with username and password exists or not
        $sql = "SELECT * FROM tbl_admin WHERE username='$username' AND password='$password'";
    
        //Execute the Query
        $res = mysqli_query($conn, $sql);

        //Count rows to check whether the user exists  or not
        $count = mysqli_num_rows($res);
        if($count==1)
        {
            //User Available and login access
            $_SESSION['login'] = "<div class='alert alert-success'><strong>Login Successful.!</strong></div>";
            $_SESSION['user'] = $username; //to check whether the user  is logged is or not and logout will unset it

            //Redirect to home page/dashboard
            header('location:'.SITEURL.'admin/');

        }
        else
        {
            //User not Available and login fail
            $_SESSION['login'] = "<div class='alert alert-danger'><strong>Username or Password did not match.!</strong></div>";

            //Redirect to home page/dashboard
            header('location:'.SITEURL.'admin/login.php');

        }
    }
?>