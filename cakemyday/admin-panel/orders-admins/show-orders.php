<?php require("../layouts/header.php")?>
<?php require("../../config/config.php")?>

<?php

if(!isset($_SESSION['adminname'])){
  echo "<script> window.location.href='".ADMINURL."/admins/login-admins.php'; </script>";
}

$orders=$conn-> query("SELECT* FROM paypal");
$orders->execute();
$allOrders=$orders->fetchAll(PDO::FETCH_OBJ);

?>

    <div class="row">
        <div class="col">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title mb-4 d-inline">Orders</h5>
              <table class="table mt-3">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">First Name</th>
                    <th scope="col">Email</th>
                    <th scope="col">Price</th>
                    <th scope="col">Status</th>
                    <th scope="col">Date</th>
                    <th scope="col">Update</th>
                    <th scope="col">Delete</th>
                  </tr>
                </thead>
                <tbody>
                  <?php 
                  $counter=1;
                  foreach($allOrders as $paypal):?>
                  <tr>
                    <th scope="row"><?php echo $counter++;?></th>
                    <td><?php echo $paypal->payer_name;?></td>
                    <td><?php echo $paypal->payer_email;?></td>
                    <td><?php echo $paypal->transaction_amount;?></td>
                    <td><?php echo $paypal->status;?></td>
                    <td><?php echo $paypal->created_at;?></td>
                    <td>                
                        <a href="<?php echo ADMINURL;?>/orders-admins/update-orders.php?id=<?php echo $paypal->order_id;?>" class="btn btn-warning text-white mb-4 text-center">Update</a>
                    </td>
                    <td><a href="delete-orders.php?id=<?php echo $paypal->order_id;?>" class="btn btn-danger  text-center ">Delete </a></td>
                   
                  </tr>
                  <?php endforeach ;?>
                </tbody>
              </table> 
            </div>
          </div>
        </div>
      </div>


      <?php require("../layouts/footer.php")?>
