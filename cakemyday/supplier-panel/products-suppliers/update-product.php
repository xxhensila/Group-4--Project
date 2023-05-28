<?php require("../layouts/header.php")?>
<?php require("../../config/config.php")?>

<!-- <?php
        if (isset($_GET['id']) && isset($_GET['quantity']) && isset($_GET['price'])) {
            $id = $_GET['id'];
            $quantity = $_GET['quantity'];
            $price = $_GET['price'];

            $update = $conn->prepare("UPDATE products SET quantity=:quantity, price=:price WHERE id=:id");
            $update->bindParam(':quantity', $quantity, PDO::PARAM_INT);
            $update->bindParam(':price', $price, PDO::PARAM_STR);
            $update->bindParam(':id', $id, PDO::PARAM_INT);
            
            if ($update->execute()) {
                echo "Values updated successfully.";
            } else {
                echo "Error updating values.";
            }
        }
?> -->

<?
        if (isset($_POST['Update'])) {
            $id = $_POST['id'];
            $quantity = $_POST['quantity'];
            $price = $_POST['price'];

            $update = $conn->prepare("UPDATE products SET quantity=:quantity, price=:price WHERE id=:id");
            $update->bindParam(':quantity', $quantity, PDO::PARAM_INT);
            $update->bindParam(':price', $price, PDO::PARAM_STR);
        $update->bindParam(':id', $id, PDO::PARAM_INT);
            
            
            if ($update->execute()) {
                echo "Values updated successfully.";
                header("Location: show-products.php");
                // Redirect to the show-products page
                exit();
            } else {
                echo "Error updating values.";
            }
        }
?>


<!-- HTML form -->



<form method="POST" >
    <input type="hidden" name="id" value="<?php echo $product->id; ?>">

    <label for="quantity">New Quantity:</label>
    <input type="number" name="quantity" id="quantity" value="<?php echo $product->quantity; ?>" required>

    <label for="price">New Price:</label>
    <input type="number" name="price" id="price" value="<?php echo $product->price; ?>" required>

    <button type="submit" name="Update">Update</button>
</form>

<?php require("../layouts/footer.php");?>

