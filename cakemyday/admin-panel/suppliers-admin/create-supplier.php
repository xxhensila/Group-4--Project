<?php require("../layouts/header.php")?>
<?php require("../../config/config.php")?>

<?php
if(!isset($_SESSION['adminname'])){
  echo "<script> window.location.href='".ADMINURL."/admins/login-admins.php'; </script>";
}

if(isset($_POST['submit'])) {

  if(empty($_POST['suppliername']) OR empty($_POST['email'])
     OR empty($_POST['password'])) {
      echo "<script>alert('one or more inputs are empty')</script>";

  } else {

          $suppliername = $_POST['suppliername'];
          $email = $_POST['email'];
          $password = $_POST['password'];

          // $dir="img_category/".basename($image);
        
          $insert = $conn->prepare("INSERT INTO suppliers(suppliername, email, password)
          VALUES(:suppliername, :email, :password)");

          $insert->execute([
              
              ":suppliername" => $suppliername,
              ":email" => $email,
              ":password" => password_hash($password, PASSWORD_DEFAULT),

          ]);

          
            echo "<script> window.location.href='".ADMINURL."/suppliers-admin/show-suppliers.php'; </script>";

          

      } 
  }
?>

       <div class="row">
        <div class="col">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title mb-5 d-inline">Create Supplier account</h5>
              <form method="POST" action="create-supplier.php" enctype="multipart/form-data">
                <!-- Email input -->
                <div class="form-outline mb-4 mt-4">
                  <input type="text" name="suppliername" id="form2Example1" class="form-control" placeholder="name" />
                </div>
                <div class="form-outline mb-4 mt-4">
                  <input type="email" name="email" id="form2Example1" class="form-control" placeholder="email" />      
                </div>
                <div class="form-outline mb-4 mt-4">
                  <input type="password" name="password" id="form2Example1" class="form-control" placeholder="password" />      
                </div>

                <!-- Submit button -->
                <button type="submit" name="submit" class="btn btn-primary  mb-4 text-center">Create</button>
              </form>

            </div>
          </div>
        </div>
      </div>
      <?php require("../layouts/footer.php")?>