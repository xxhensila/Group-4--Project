<?php require("../layouts/header.php");?>
<?php require("../../config/config.php");?>
<?php

if(!isset($_SESSION['suppliername'])){
  echo "<script> window.location.href='".SUPPLIERURL."/suppliers/login-suppliers.php'; </script>";
}


if(isset($_POST['submit'])) {

  if(empty($_POST['email']) OR empty($_POST['password'])
     OR empty($_POST['suppliername'])) {
      echo "<script>alert('one or more inputs are empty')</script>";

  } else {

          $email = $_POST['email'];
          $password = $_POST['password'];
          $suppliername = $_POST['suppliername'];
        
          $insert = $conn->prepare("INSERT INTO suppliers(email, suppliername, password)
          VALUES(:email, :suppliername, :password)");

          $insert->execute([
              
              ":email" => $email,
              ":mypassword" => password_hash($password, PASSWORD_DEFAULT),
              ":suppliername" => $suppliername,
          ]);

         echo "<script> window.location.href='".SUPPLIERURL."/suppliers/supplier.php'; </script>";

      } 
  }
?>
       <div class="row">
        <div class="col">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title mb-5 d-inline">Create Supplier</h5>
          <form method="POST" action="create-suppliers.php">
                <!-- Email input -->
                <div class="form-outline mb-4 mt-4">
                  <input type="email" name="email" id="form2Example1" class="form-control" placeholder="email" />                
                </div>

                <div class="form-outline mb-4">
                  <input type="text" name="suppliername" id="form2Example1" class="form-control" placeholder="suppliername" />
                </div>
                <div class="form-outline mb-4">
                  <input type="password" name="password" id="form2Example1" class="form-control" placeholder="password" />
                </div>
                <!-- Submit button -->
                <button type="submit" name="submit" class="btn btn-primary  mb-4 text-center">Create</button>

          
              </form>

            </div>
          </div>
        </div>
      </div>
      <?php require("../layouts/footer.php");?>