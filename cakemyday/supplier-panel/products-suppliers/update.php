<?php
require("../layouts/header.php");
require("../../config/config.php");

if (!isset($_SESSION['id'])) {
  echo "<script>window.location.href='".SUPPLIERURL."/suppliers/supplier.php';</script>";
}

if (isset($_GET['id'])) {
  $id = $_GET['id'];
  $select = $conn->prepare("SELECT * FROM products WHERE id=:id");
  $select->execute([':id' => $id]);
  $product = $select->fetch(PDO::FETCH_OBJ);
}

if (isset($_POST['submit'])) {
  $id = $_POST['id'];
  $price = $_POST['price'];
  $quantity = $_POST['quantity'];

  $update = $conn->prepare("UPDATE products SET price=:price, quantity=:quantity WHERE id=:id");
  $update->execute([
    ':price' => $price,
    ':quantity' => $quantity,
    ':id' => $id,
  ]);

  echo "<script>window.location.href='".SUPPLIERURL."/products-suppliers/show-products.php';</script>";
  exit(); // Add this line to stop executing the rest of the script after the redirect
}
?>

<!DOCTYPE html>
<html>
<head>
  <title>Update Product</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      background-color: #f2f2f2;
      margin: 0;
      padding: 0;
    }
    
    
    h1 {
      text-align: center;
      color: #333;
      margin-bottom: 30px;
    }
    
    form {
      display: flex;
      flex-direction: column;
    }
    
    label {
      font-weight: bold;
      margin-bottom: 10px;
      color: #333;
    }
    
    input[type="number"],
    input[type="submit"] {
      padding: 10px;
      font-size: 16px;
      border-radius: 5px;
      border: none;
      margin-bottom: 15px;
    }
    
    input[type="number"] {
      background-color: #f2f2f2;
      padding: 12px;
      color: #333;
    }
    
    input[type="submit"] {
      background-color: #ff4d4d;
      color: #fff;
      cursor: pointer;
      width: 120px;
      margin: 0 auto;
      transition: background-color 0.3s ease;
    }
    
    input[type="submit"]:hover {
      background-color: #e60000;
    }
  </style>
</head>
<body>
<div class="container">
  <h1>Update Product</h1>
  <form method="POST" action="">
    <input type="hidden" name="id" value="<?php echo $product->id; ?>">

    <label for="quantity">Quantity:</label>
    <input type="number" name="quantity" id="quantity" value="<?php echo $product->quantity; ?>" required><br><br>

    <label for="price">Price:</label>
    <input type="number" name="price" id="price" step="1" value="<?php echo $product->price; ?>" required><br><br>

    <input type="submit" name="submit" value="Update">
  </form>
</body>
</html>