<?php require("layouts/header.php")?>
<?php require("../config/config.php")?>

<?php
if(!isset($_SESSION['adminname'])){
  echo "<script> window.location.href='".ADMINURL."/admins/login-admins.php'; </script>";
}

//products
$products=$conn->query("SELECT COUNT(*) as products_num FROM products");
$products->execute();
$num_products=$products->fetch(PDO::FETCH_OBJ);

//orders
$orders=$conn->query("SELECT COUNT(*) as orders_num FROM paypal");
$orders->execute();
$num_orders=$orders->fetch(PDO::FETCH_OBJ);

//categories
$categories=$conn->query("SELECT COUNT(*) as categories_num FROM categories");
$categories->execute();
$num_categories=$categories->fetch(PDO::FETCH_OBJ);

//admins
$admins=$conn->query("SELECT COUNT(*) as admins_num FROM admins");
$admins->execute();
$num_admins=$admins->fetch(PDO::FETCH_OBJ);

//suppliers
$suppliers=$conn->query("SELECT COUNT(*) as supp_num FROM suppliers");
$suppliers->execute();
$num_supp=$suppliers->fetch(PDO::FETCH_OBJ);

//messages from customers
$contacts=$conn->query("SELECT COUNT(*) as contacts_num FROM contact");
$contacts->execute();
$num_contacts=$contacts->fetch(PDO::FETCH_OBJ);


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
        <div class="col-md-3">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Orders</h5>
              <!-- <h6 class="card-subtitle mb-2 text-muted">Bootstrap 4.0.0 Snippet by pradeep330</h6> -->
              <p class="card-text">Number of orders: <?php echo $num_orders->orders_num;?></p>
             
            </div>
          </div>
        </div>
        <div class="col-md-3">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Categories</h5>             
              <p class="card-text">Number of categories: <?php echo $num_categories->categories_num;?></p>             
            </div>
          </div>
        </div>
        <div class="col-md-3">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Admins</h5>
              
              <p class="card-text">Number of admins: <?php echo $num_admins->admins_num;?></p>
              
            </div>
          </div>
        </div>
        <div class="col-md-3">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Suppliers</h5>
              
              <p class="card-text">Number of suppliers: <?php echo $num_supp->supp_num;?></p>
              
            </div>
          </div>
        </div>
        <div class="col-md-3">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title">My inbox</h5>
              
              <p class="card-text">Number of messages: <?php echo $num_contacts->contacts_num;?></p>
              
            </div>
          </div>
        </div>
      </div>      
    </div>
<?php require("layouts/footer.php");?>