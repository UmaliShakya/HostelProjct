<?php include("partials/menu.php") ?>

<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
      <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
      <h1 class="h2"><i class="bi bi-gear-fill"></i>Add Deposit</h1>
      </div>

      <div class="container">
        <form class="row g-3">
        <div class="col-md-12">
            <label for="inputName" class="form-label">Student ID</label>
            <input type="text" class="form-control" id="inputEmail4" >
        </div>
        <div class="col-md-12">
            <label for="inputAge" class="form-label">Room No</label>
            <input type="text" class="form-control" id="inputPassword4" >
        </div>
        <div class="col-12">
            <label for="inputAddress" class="form-label">Room Category ID</label>
            <input type="text" class="form-control" id="inputAddress" >
        </div>
        <div class="col-12">
            <label for="inputAddress" class="form-label">Deposit</label>
            <input type="text" class="form-control" id="inputAddress" >
        </div>
        
        <div class="col-2">
            <button type="submit" class="btn btn-color form-control p-2">Submit</button>
        </div>
        </form>
        <br>
        </div>
    </main>
  </div>
</div>

<?php include("partials/footer.php") ?>