<?php 
include('../config/constants.php');
include('login-check.php');

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

      
    </style>

    
    <!-- Custom styles for this template -->
    <link href="dashboard.css" rel="stylesheet">
  </head>
  <body>
    
<header class="navbar navbar-dark sticky-top bg-dark flex-md-nowrap p-1 shadow">
  <a class="navbar-brand col-md-3 col-lg-2 me-0 px-3" href="#">Serene Hostel</a>
  <button class="navbar-toggler position-absolute d-md-none collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <!-- <input class="form-control form-control-dark w-100" type="text" placeholder="Search" aria-label="Search"> -->
  <ul class="navbar-nav px-3">
    <li class="nav-item text-nowrap">
      <a class="nav-link" href="logout.php">Sign out</a>
    </li>
  </ul>
</header>

<div class="body-part container-fluid">
  <div class="row">
    <nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block text-white sidebar collapse ">
      <div class="position-sticky pt-3 ">
        <ul class="nav flex-column  pb-4 ">
          <li class="nav-item border-bottom pt-2 pb-3 ">
            <a class="nav-link active text-white font-weight-bold" aria-current="page" href="index.php">
            <i class="fas fa-cog" >  Dashboard</i> 
            </a>
          </li>
          <li class="nav-item border-bottom pt-3 font-weight-bold">
            <a class="nav-link text-white" href="<?php echo SITEURL;?>admin/manage-admin.php">
            <?php
            //SQL Query
            $sql="SELECT * FROM tbl_admin";
            //Execute Query
            $res=mysqli_query($conn, $sql);
            //Count the rows
            $count=mysqli_num_rows($res);
            ?>
            <i class="fas fa-user-friends" >  Users<span class="badge"><h6><dt><?php echo $count;?></dt></h6></span></i>     
            </a>
          </li>
          <li class="nav-item border-bottom pt-3 font-weight-bold">
            <a class="nav-link text-white" href="manage-student.php#">
            <?php
            //SQL Query
            $sql="SELECT * FROM tbl_student";
            //Execute Query
            $res=mysqli_query($conn, $sql);
            //Count the rows
            $count=mysqli_num_rows($res);
            ?>
            <i class="fas fa-user-graduate" > Students <span class="badge"><h6><dt><?php echo $count;?></dt></h6></span></i>
            </a>
          </li>
          <li class="nav-item border-bottom pt-3 font-weight-bold">
            <a class="nav-link text-white" href="manage-employee.php">
            <?php
            //SQL Query
            $sql="SELECT * FROM tbl_employee";
            //Execute Query
            $res=mysqli_query($conn, $sql);
            //Count the rows
            $count=mysqli_num_rows($res);
            ?>
            <i class="fas fa-users" >   Employees <span class="badge"><h6><dt><?php echo $count;?></dt></h6></span></i>
            </a>
          </li>
          <li class="nav-item border-bottom pt-3 font-weight-bold">
            <a class="nav-link text-white" href="manage-room.php">
            <?php
            //SQL Query
            $sql="SELECT * FROM tbl_room";
            //Execute Query
            $res=mysqli_query($conn, $sql);
            //Count the rows
            $count=mysqli_num_rows($res);
            ?>
            <i class="fas fa-home" >   Rooms <span class="badge"><h6><dt><?php echo $count;?></dt></h6></span></i>
            </a>
          </li>
          <li class="nav-item border-bottom pt-3 pb-3 font-weight-bold">
            <a class="nav-link text-white" href="categories.php">
            <i class="fas fa-users" >   Categories</i>
            </a>
          </li>
          <li class="nav-item border-bottom pt-3 pb-3 font-weight-bold">
            <a class="nav-link text-white" href="manage-ledger.php">
            <i class="fas fa-file-invoice" >   Ledger</i>
            </a>
          </li>
          <li class="nav-item border-bottom pt-3 pb-3 font-weight-bold">
            <a class="nav-link text-white" href="settings.php">
            <i class="fas fa-tools" >   Settings</i>
            </a>
          </li>

        </ul>

        <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted">
          <span></span>
          
      </div>
    </nav>