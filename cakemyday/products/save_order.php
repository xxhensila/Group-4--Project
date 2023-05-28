<?php
// Add database connection code here
require "../config/config.php";

// Retrieve data from the POST request
$orderID = $_POST['order_id'];
$payerName = $_POST['payer_name'];
$payerEmail = $_POST['payer_email'];
$transactionAmount = $_POST['transaction_amount'];
$user_id = $_POST['user_id'];




// Save data to the database
$insert = $conn->prepare("INSERT INTO paypal (order_id, payer_name, payer_email, transaction_amount, user_id) 
                         VALUES (:order_id, :payer_name, :payer_email, :transaction_amount, :user_id)");
$insert->execute([

    ':order_id' => $orderID,
    ':payer_name' => $payerName,
    ':payer_email' => $payerEmail,
    ':transaction_amount' => $transactionAmount,
    ':user_id' => $user_id,


]);

// Send a response back to the client (optional)
echo "Data saved successfully";
?>
