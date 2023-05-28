<!-- user is redirected to index page when trying
to access the checkout page -->
<?php 


    if(!isset($_SERVER['HTTP_REFERER'])){
        // redirect them to your desired location
        header('location: http://localhost/cakemyday/index.php');
        exit;
    }

?>
<?php require "../includes/header.php"; ?>
<?php require "../config/config.php"; ?>
    
    <?php 
    
    if(!isset($_SESSION['username'])) {
                
        echo "<script> window.location.href='".APPURL."'; </script>";

    }


    $products = $conn->query("SELECT * FROM card WHERE user_id='$_SESSION[user_id]'");
    $products->execute();

    $allProducts = $products->fetchAll(PDO::FETCH_OBJ);

    if(isset($_SESSION['price'])) {

        $_SESSION['total_price'] = $_SESSION['price'] + 100;
    }

    if(isset($_POST['submit'])) {

        echo "<script> window.location.href='".APPURL."/products/charge.php'; </script>";
            

        }

?>
<style>

    .btn-primary {
        background: black;
        border-color: black;
    }

    .btn-primary:hover {
        background: #E91E63;
        border-color: #E91E63;
    }
    form.bill-detail {
        justify-content: center;
        text-align: -webkit-center;
    }

</style>

    <div id="page-content" class="page-content">
        <div class="banner">
            <!-- <div class="jumbotron jumbotron-bg text-center rounded-0" style="background-image: url('assets/img/bg-header.jpg');"> -->
                <div class="jumbotron jumbotron-bg text-center rounded-0" style="background-image: url('<?php echo APPURL; ?>/assets/img/details.jpg');"> 
                <div class="container">
                    <h1 class="pt-5" >
                        BILLING DETAILS
                    </h1>
                    <p class="lead">
                        
                    </p>
                </div>
            </div>
        </div>

        <section id="checkout">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-xs-12 col-sm-5 justify-content-center align-items-center">
                        <div class="holder ">
                            <h5 class="mb-3">YOUR ORDER</h5>
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>Products</th>
                                            <th class="text-right">Subtotal</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach($allProducts as $product) : ?>
                                        <tr>
                                            <td>
                                                <?php echo $product->pro_title; ?> x  <?php echo $product->pro_qty; ?>
                                            </td>
                                            <td class="text-right">
                                            <?php echo $product->pro_subtotal; ?> ALL
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                    </tbody>
                                    <tfooter>
                                        <tr>
                                            <td>
                                                <strong>Cart Subtotal</strong>
                                            </td>
                                            <td class="text-right">
                                            <?php if(isset($_SESSION['price'])) : ?>
                                                <?php echo $_SESSION['price']  ?>
                                            <?php endif; ?>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <strong>Shipping</strong>
                                            </td>
                                            <td class="text-right">
                                                100 ALL
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <strong>ORDER TOTAL</strong>
                                            </td>
                                            <td class="text-right">
                                                <strong>
                                                <?php echo $_SESSION['price'] + 100 ; ?>
                                                </strong>
                                            </td>
                                        </tr>
                                    </tfooter>
                                </table>
                            </div>
                        </div>
                        <form action="checkout.php" method="POST" class="bill-detail">
                            <button name="submit" type="submit" class="btn btn-primary">PROCEED TO CHECKOUT <i class="fa fa-check"></i></button>  
                        </form>
                    </div>
                        <!-- <a href="#" class="btn btn-primary float-right">PROCEED TO CHECKOUT <i class="fa fa-check"></i></a> -->
                        <!-- <div class="clearfix">
                    </div> -->
                </div>
            </div>
        </section>
    </div>
<?php require "../includes/footer_sp.php"; ?>