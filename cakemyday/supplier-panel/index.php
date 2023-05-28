<?php require("layouts/header.php")?>
<?php require("../config/config.php")?>

<?php
if(!isset($_SESSION['suppliername'])){
  echo "<script> window.location.href='".SUPPLIERURL."/suppliers/login-suppliers.php'; </script>";
}

//products
$products=$conn->query("SELECT COUNT(*) as products_num FROM products");
$products->execute();
$num_products=$products->fetch(PDO::FETCH_OBJ);





?>
      
      <div class="row">
        <div class="col-md-3">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Products</h5>
              <!-- <h6 class="card-subtitle mb-2 text-muted">Bootstrap 4.0.0 Snippet by pradeep330</h6> -->
              <p class="card-text">Number of products:<?php echo $num_products->products_num;?>  </p>
             
            </div>
          </div>
        </div>

 
    
 
 
      </div>      
    </div>
<?php require("layouts/footer.php");?>