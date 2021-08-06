<?php include("partials/menu.php") ?>

<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
      <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
      <h1 class="h2"><i class="bi bi-gear-fill"></i>Add New Student</h1>
      </div>

      <?php
        if(isset($_SESSION['add-student']))//checking whether the session is set or not
        {
            echo $_SESSION['add-student'];//Display the session message if set
            unset($_SESSION['add-student']);//Remove session message
        }
        ?>

      <div class="container">
        <form class="row g-3" method="POST">
        <div class="col-md-12">
            <label for="inputName" class="form-label">Full Name</label>
            <input type="text" class="form-control" name="full_name" placeholder="Enter Full Name">
        </div>
        <div class="col-md-12">
            <label for="inputAge" class="form-label">Age</label>
            <input type="text" class="form-control" name="age" placeholder="Enter Student Age">
        </div>
        <div class="col-12">
            <label for="inputAddress" class="form-label">Address</label>
            <input type="text" class="form-control" name="address" placeholder="1234 Main St">
        </div>
        <div class="col-12">
            <label for="inputAddress" class="form-label">Contact No</label>
            <input type="text" class="form-control" name="contact_no" placeholder="0712351256">
        </div>
        <div class="col-md-12">
            <label for="inputEmail" class="form-label">Email</label>
            <input type="text" class="form-control" name="email" placeholder="user@gmail.com">
        </div>
        <div class="col-md-12">
            <label for="inputAccount" class="form-label">Account No</label>
            <input type="text" class="form-control" name="account_no" placeholder="Enter Account Number">
        </div>
        <div class="col-12">
            <label for="inputAddress" class="form-label">University</label>
            <input type="text" class="form-control" name="university" placeholder="Enter Student University">
        </div>
        <div class="col-12">
            <label for="inputFaculty" class="form-label">Faculty</label>
            <input type="text" class="form-control" name="faculty" placeholder="Enter Faculty ">
        </div>
        <div class="col-md-12">
            <label for="inputPassword4" class="form-label">Degree</label>
            <input type="text" class="form-control" name="degree" placeholder="Enter Degree">
        </div>
        <div class="col-12">
            <label for="inputAddress" class="form-label">Mother's Name</label>
            <input type="text" class="form-control" name="mothers_name" placeholder="Enter Mother's Full Name">
        </div>
        <div class="col-12">
            <label for="inputAddress" class="form-label">Mother's Contact No</label>
            <input type="text" class="form-control" name="mothers_contact_no" placeholder="0712351256">
        </div>
        <div class="col-12">
            <label for="inputAddress" class="form-label">Father's Name</label>
            <input type="text" class="form-control" name="fathers_name" placeholder="Enter Father's Full Name">
        </div>
        <div class="col-12">
            <label for="inputAddress" class="form-label">Father's Contact No</label>
            <input type="text" class="form-control" name="fathers_contact_no" placeholder="0712351956">
        </div>
        
        <div class="col-2">
            <input type="submit" class="btn btn-color form-control p-2" name="submit" value="Add">
        </div>
        </form>
        <br>
        </div>
    </main>
  </div>
</div>

<?php
    //Process the value from form and save it in database
    //check whether the submit button is clicked or not
    if(isset($_POST['submit']))
    {
        //Get the data from form
        $full_name = $_POST['full_name'];
        $age = $_POST['age'];
        $address = $_POST['address'];
        $contact_no = $_POST['contact_no'];
        $email = $_POST['email'];
        $account_no = $_POST['account_no'];
        $university = $_POST['university'];
        $faculty = $_POST['faculty'];
        $degree = $_POST['degree'];
        $mothers_name = $_POST['mothers_name'];
        $mothers_contact_no = $_POST['mothers_contact_no'];
        $fathers_name = $_POST['fathers_name'];
        $fathers_contact_no = $_POST['fathers_contact_no'];
        

        //Insert into database
        //Create a sql query to save or add food
        $sql = "INSERT INTO tbl_student SET
                full_name = '$full_name',
                age = '$age',
                address = '$address',
                contact_no = '$contact_no',
                email = '$email',
                account_no = '$account_no',
                university = '$university',
                faculty = '$faculty',
                degree = '$degree',
                mothers_name = '$mothers_name',
                mothers_contact_no = '$mothers_contact_no',
                fathers_name = '$fathers_name',
                fathers_contact_no ='$fathers_contact_no'";
               

        //Execute the query whether data is inserted or not
        $res = mysqli_query($conn, $sql);

        //Check whether data is inserted or not
        if($res==TRUE)
        {
            //Data Inserted Successfully
            $_SESSION['add-student'] = "<div class='alert alert-success'><strong>Student Added Successfully.</strong></div>";

            //Redirect to Manage student page
            header('location:'.SITEURL.'admin/manage-student.php');
        }
        else
        {
            //Failed to added room 
            $_SESSION['add-student'] = "<div class='alert alert-danger'><strong>Failed to added room !</strong> </div>";

            //Redirect to manage room  pge
            header('location:'.SITEURL.'admin/add-student.php');
        }


    }
?>

<?php include("partials/footer.php") ?>