<!-- this is the paypal file -->
<!-- part of html is of official paypal page -->


<!-- create paypal account -->
<!-- create sandbox accounts  -->
<!-- create APP -->

<!-- log in from sandbox.paypal.com  with the email created in the paypal account-->

<?php 

// if(!isset($_SERVER['HTTP_REFERER'])){
//     // redirect them to your desired location
//     header('location: http://localhost/cakemyday/index.php');
//     exit;
// }

?>

<?php require "../includes/header.php"; ?>

<?php 

if(!isset($_SESSION['username'])) {
            
    echo "<script> window.location.href='".APPURL."'; </script>";

}

?>

<div class="banner">
    <div class="jumbotron jumbotron-bg text-center rounded-0" style="background-image: url('<?php echo APPURL; ?>/assets/img/details.jpg');">
        <div class="container">
            <h1 class="pt-5">
                Pay with Paypal 
            </h1>
            <p class="lead">
                
            </p>
            <!-- sandbox Business account app client ID -->
            <script src="https://www.paypal.com/sdk/js?client-id=AYlz4r_PV3z15ky3AmEeuQRq14d4Dn73euYutlCrITo18PmtjP53VT-w5sTnVY48KEJKWpIKyp-wEc9x&currency=USD"></script>
            <!-- Set up a container element for the button -->
            <div id="paypal-button-container"></div>
            <script>
                 paypal.Buttons({
                // Sets up the transaction when a payment button is clicked
                createOrder: (data, actions) => {
                    return actions.order.create({
                        purchase_units: [{
                            amount: {
                                value: '<?php echo $_SESSION['total_price']; ?>'
                            }
                        }]
                    });
                },
                // Finalize the transaction after payer approval
                onApprove: (data, actions) => {
                    
                        return actions.order.capture().then(function (orderData) {
                            // Extract relevant information
                            const orderId = orderData.id;
                            const payerName = orderData.payer.name.given_name;
                            const payerEmail = orderData.payer.email_address;
                            const transactionAmount = orderData.purchase_units[0].amount.value;

                            // Save data to database
                            const xhr = new XMLHttpRequest();
                            const url = 'save_order.php'; // Create a PHP file to handle saving data to the database
                            const params = `order_id=${orderId}&payer_name=${payerName}&payer_email=${payerEmail}&transaction_amount=${transactionAmount}&user_id=<?php echo $_SESSION['user_id']; ?>`;
                            xhr.open('POST', url, true);
                            xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
                            xhr.onreadystatechange = function () {
                                if (xhr.readyState === 4 && xhr.status === 200) {
                                    console.log(xhr.responseText); // Optional: Log the response from the server
                                }
                            };
                            xhr.send(params);

                            // Redirect to success page or show a success message
                            window.location.href = 'success.php';
                        });
                    }
                }).render('#paypal-button-container');
            </script>
          
        </div>
    </div>
</div>


<?php require "../includes/footer_sp.php"; ?>
