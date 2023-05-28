<?php require("../layouts/header.php")?>
<?php require("../../config/config.php")?>
<?php

if(!isset($_SESSION['suppliername'])){
  echo "<script> window.location.href='".SUPPLIERURL."/suppliers/login-suppliers.php'; </script>";
}

$suppliers=$conn-> query("SELECT* FROM suppliers");
$suppliers->execute();
$allSuppliers=$suppliers->fetchAll(PDO::FETCH_OBJ);

?>

        <div class="row">
        <div class="col">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title mb-4 d-inline">Suppliers</h5>
             
              <table class="table">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Supplier Name</th>
                    <th scope="col">Email</th>
                  </tr>
                </thead>
                <tbody>
                  <?php 
                  $counter=1;
                  foreach($allSuppliers as $supplier):?>
                  <tr>
                    <th scope="row"><?php echo $counter++;?></th>
                    <td><?php echo $supplier->suppliername;?></td>
                    <td><?php echo $supplier->email;?></td>
                  </tr>
                 <?php endforeach; ?>
                </tbody>
              </table> 
            </div>
          </div>
        </div>
      </div>

      <?php require("../layouts/footer.php")?>