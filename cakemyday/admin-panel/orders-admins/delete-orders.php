<?php require("../layouts/header.php")?>
<?php require("../../config/config.php")?>

<?php
if(!isset($_SESSION['adminname'])){
  echo "<script> window.location.href='".ADMINURL."/admins/login-admins.php'; </script>";
}

if(isset($_GET['id'])){
  $order_id = $_GET['id'];

  $delete = $conn->prepare("DELETE FROM paypal WHERE order_id=:order_id");
  $delete->execute([
    ":order_id" => $order_id
  ]);

  echo "<script> window.location.href='".ADMINURL."/orders-admins/show-orders.php'; </script>";
}
?>

<?php require("../layouts/footer.php")?>
