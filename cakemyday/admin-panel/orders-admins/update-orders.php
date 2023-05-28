<?php require("../layouts/header.php")?>
<?php require("../../config/config.php")?>

<?php
if(!isset($_SESSION['adminname'])){
  echo "<script> window.location.href='".ADMINURL."/admins/login-admins.php'; </script>";
}

if(isset($_GET['id'])){
  $order_id = $_GET['id'];
  $select = $conn->prepare("SELECT * FROM paypal WHERE order_id=:order_id");
  $select->execute([
    ":order_id" => $order_id
  ]);
  $order = $select->fetch(PDO::FETCH_OBJ);
}

if(isset($_POST['submit'])) {
  if(empty($_POST['status'])) {
    echo "<script>alert('One or more inputs are empty')</script>";
  } else {
    $status = $_POST['status'];

    $update = $conn->prepare("UPDATE paypal SET status=:status WHERE order_id=:order_id");

    $update->execute([
      ":status" => $status,
      ":order_id" => $order_id,
    ]);

    echo "<script> window.location.href='".ADMINURL."/orders-admins/show-orders.php'; </script>";
  } 
}
?>

<div class="row">
    <div class="col">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title mb-5 d-inline">Update Order Status</h5>
                <form method="POST" action="update-orders.php?id=<?php echo $order_id;?>">
                    <div class="form-group mt-3">
                        <select name="status" class="form-control" id="exampleFormControlSelect1">
                            <option>--Select order status--</option>
                            <option value="in progress" <?php if($order->status == "in progress") echo "selected"; ?>>In Progress</option>
                            <option value="delivered" <?php if($order->status == "delivered") echo "selected"; ?>>Delivered</option>
                        </select>
                    </div>
                    <button type="submit" name="submit" class="btn btn-primary mt-4 text-center">Update</button>
                </form>
            </div>
        </div>
    </div>
</div>
<?php require("../layouts/footer.php")?>
