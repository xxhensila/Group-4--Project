<?php require("../layouts/header.php")?>
<?php require("../../config/config.php")?>

<?php
if(!isset($_SESSION['suppliername'])){
  echo "<script> window.location.href='".SUPPLIERURL."/suppliers/login-suppliers.php'; </script>";
}

$products=$conn-> query("SELECT* FROM products");
$products->execute();
$allProducts=$products->fetchAll(PDO::FETCH_OBJ);
?>

          <div class="row">
        <div class="col">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title mb-4 d-inline">Products</h5>
            
            
              <table class="table">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Product</th>
                    <th scope="col">Price</th>
                    <th scope="col">Quantity</th>
                    <th scope="col">Expiration Date</th>
                    <th scope="col">Update</th>
                
                  </tr>
                </thead>
                <tbody>
                  <!-- <?php 
                  $counter=1;
                  foreach ($allProducts as $product):?> 
                   
                  <tr>
                    <th scope="row"><?php echo $counter++;?> </th>
                    <td><?php echo $product->title;?> </td>
                    <td><?php echo $product->price;?> </td>
                    <td><?php echo $quantity->quantity;?> </td>
                    <td><?php echo $product->exp_date;?> </td>
                    <?php if($product->status==0):?>
                     <td><a href="<?php echo SUPPLIERURL ;?> /products-suppliers/update-product.php?id=<?php echo $product->id;?> &update_product=<?php echo $product->update_product;?>" class="btn btn-danger  text-center ">Update</a></td>
                     <?php else:?>
                      <td><a href="<?php echo SUPPLIERURL ;?> /products-suppliers/update-product.php?id=<?php echo $product->id;?> &status=<?php echo $product->status;?>" class="btn btn-success  text-center ">Available</a></td>
                      <?php endif;?> 
                     <td><a href="<?php echo SUPPLIERURL ;?> /products-suppliers/delete-products.php?id=<?php echo $product->id;?>" class="btn btn-danger  text-center ">Delete</a></td>
                  </tr>
                  <?php endforeach; ?>
                </tbody>
              </table> 
            </div> -->
            <?php 
                 $counter = 1;
                 foreach ($allProducts as $product):?> 
  <tr>
    <th scope="row"><?php echo $counter++;?> </th>
    <td><?php echo $product->title;?> </td>
    <td><?php echo $product->price;?> </td>
    <td><?php echo $product->quantity;?> </td>
    <td><?php echo $product->exp_date;?> </td>
    <td>
      <a href="<?php echo SUPPLIERURL ;?>/products-suppliers/update.php?id=<?php echo $product->id;?>" class="btn btn-danger text-center">Update</a>
    </td>
 
  </tr>
<?php endforeach; ?>
          </div>
        </div>
      </div>

      <?php require("../layouts/footer.php")?>
