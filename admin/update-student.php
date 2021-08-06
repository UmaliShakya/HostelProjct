<?php include("partials/menu.php") ?>

<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
      <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
      <h1 class="h2"><i class="bi bi-gear-fill"></i>Update Student</h1>
      </div>

      <?php

            //Get the ID of selected Student
            $id = $_GET['id'];

            //Create sql query to get the details
            $sql = "SELECT * FROM tbl_student WHERE id=$id";

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
                    $full_name = $row['full_name'];
                    $age = $row['age'];
                    $address = $row['address'];
                    $contact_no = $row['contact_no'];
                    $email = $row['email'];
                    $account_no = $row['account_no'];
                    $university = $row['university'];
                    $faculty = $row['faculty'];
                    $degree = $row['degree'];
                    $mothers_name = $row['mothers_name'];
                    $mothers_contact_no = $row['mothers_contact_no'];
                    $fathers_name = $row['fathers_name'];
                    $fathers_contact_no = $row['fathers_contact_no'];
                    
                
                }
                else
                {
                    //redirect to manage student page
                    header('location:'.SITEURL.'admin/manage-student.php');
                }
            }
        ?>

      <div class="container">
      <div class="container">
        <form class="row g-3" method="POST">
        <div class="col-md-12">
            <label for="inputName" class="form-label">Full Name</label>
            <input type="text" class="form-control" name="full_name" value="<?php echo $full_name;?>">
        </div>
        <div class="col-md-12">
            <label for="inputAge" class="form-label">Age</label>
            <input type="text" class="form-control" name="age"  value="<?php echo $age;?>">
        </div>
        <div class="col-12">
            <label for="inputAddress" class="form-label">Address</label>
            <input type="text" class="form-control" name="address"  value="<?php echo $address;?>">
        </div>
        <div class="col-12">
            <label for="inputAddress" class="form-label">Contact No</label>
            <input type="text" class="form-control" name="contact_no"  value="<?php echo $contact_no;?>">
        </div>
        <div class="col-md-12">
            <label for="inputEmail" class="form-label">Email</label>
            <input type="text" class="form-control" name="email"  value="<?php echo $email;?>">
        </div>
        <div class="col-md-12">
            <label for="inputAccount" class="form-label">Account No</label>
            <input type="text" class="form-control" name="account_no"  value="<?php echo $account_no;?>">
        </div>
        <div class="col-12">
            <label for="inputAddress" class="form-label">University</label>
            <input type="text" class="form-control" name="university"  value="<?php echo $university;?>">
        </div>
        <div class="col-12">
            <label for="inputFaculty" class="form-label">Faculty</label>
            <input type="text" class="form-control" name="faculty"  value="<?php echo $faculty;?>">
        </div>
        <div class="col-md-12">
            <label for="inputPassword4" class="form-label">Degree</label>
            <input type="text" class="form-control" name="degree"  value="<?php echo $degree;?>">
        </div>
        <div class="col-12">
            <label for="inputAddress" class="form-label">Mother's Name</label>
            <input type="text" class="form-control" name="mothers_name" value="<?php echo $mothers_name;?>">
        </div>
        <div class="col-12">
            <label for="inputAddress" class="form-label">Mother's Contact No</label>
            <input type="text" class="form-control" name="mothers_contact_no" value="<?php echo $mothers_contact_no;?>">
        </div>
        <div class="col-12">
            <label for="inputAddress" class="form-label">Father's Name</label>
            <input type="text" class="form-control" name="fathers_name" value="<?php echo $fathers_name;?>">
        </div>
        <div class="col-12">
            <label for="inputAddress" class="form-label">Father's Contact No</label>
            <input type="text" class="form-control" name="fathers_contact_no" value="<?php echo $fathers_contact_no;?>">
        </div>
        
        <div class="col-2">
            <input type="hidden" name="id" value="<?php echo $id;?>">
            <input type="submit" class="btn btn-color form-control p-2" name="submit" value="Update">
        </div>
        </form>
        <br>
        </div>
    </main>
  </div>
</div>

<?php include("partials/footer.php") ?>

<?php

        //check whether the submit button is clicked or not
        if(isset($_POST['submit']))
        {
            //get all the values from form to update
            $id = $_POST['id'];
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
            

            //Create a sql query to update admin
            $sql = "UPDATE tbl_student SET
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
                    fathers_contact_no = '$fathers_contact_no'
                    WHERE id = '$id'";

            //Execute the query
            $res = mysqli_query($conn, $sql);

            //Check whether the query executed successfully or not
            if($res==TRUE)
            {
                //Query Executed and Student Updated
                $_SESSION['update-student'] = "<div class='alert alert-success'><strong>Student Updated Successfully!</strong></div>";

                //Redirect the Manage Student Page
                header('location:'.SITEURL.'admin/manage-student.php');
            }
            else
            {
                //Failed to Update
                $_SESSION['update-student'] = "<div class='alert alert-danger'><strong>Failed to Update Student!</strong></div>";

                //Redirect to Manage Student Page
                header('location:'.SITEURL.'admin/manage-student.php');
            }
        }
        ?>
<?php include('partials/footer.php');?>


