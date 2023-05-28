<?php require "../includes/header.php"; ?>
<?php require "../config/config.php"; ?>


<?php

        if(!isset($_SESSION['username'])) {
                        
            echo "<script> window.location.href='".APPURL."'; </script>";

        }

        if(isset($_GET['id']))  {

                $id= $_GET['id'];
                
                if($id !== $_SESSION['user_id']) {
                            
                    echo "<script> window.location.href='".APPURL."'; </script>";
        
                }

                $select= $conn->query("SELECT * FROM paypal WHERE user_id='$id'");
                $select -> execute();

                $data = $select->fetchALL(PDO::FETCH_OBJ);
                
            } else {
                echo "<script> window.location.href='".APPURL."/404.php'; </script>";
            }

?>
    <style>

    thead {
        background-color: #E91E63;
        color:white;
    }


    </style>

    <div id="page-content" class="page-content">
        <div class="banner">
            <div class="jumbotron jumbotron-bg text-center rounded-0" style="background-image: url('<?php echo APPURL; ?>/assets/img/details.jpg');">
                <div class="container">
                    <h1 class="pt-5" >
                        YOUR TRANSACTIONS
                    </h1>
                    <p class="lead" style="color:#E91E63">
                        <!-- Shop with confidence and ease, knowing that every transaction with us is a sweet and secure experience. -->
                    </p>
                </div>
            </div>
        </div>

        <section id="cart">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th width="5%"></th>
                                        <th>Name</th>
                                        <th>Contact Email</th>
                                        <th>Transaction amout</th>
                                        <th>Date</th>
                                        <th>Status</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php if(count($data) > 0) : ?>
                                        <?php foreach($data as $paypal) : ?>
                                        <tr>
                                            <td></td>
                                            <td><?php echo $paypal->payer_name; ?></td>
                                            <td>
                                                <?php echo $paypal->payer_email; ?>
                                            </td>
                                            <td>
                                            <?php echo $paypal->transaction_amount; ?>
                                            </td> 
                                            <td>
                                            <?php echo $paypal->created_at; ?>
                                            </td> 
                                            <td>
                                            <?php echo $paypal->status; ?>
                                            </td>   
                                        </tr>
                                        <?php endforeach; ?>
                                        <?php else : ?>
                                    <div class="alert alert-success bg-success text-white text-center">
                                        No orders yet
                                    </div>
                                    <?php endif; ?> 

                                </tbody>
                            </table>
                        </div>

                      
                    </div>
                </div>
            </div>
</section>

</div>

<?php require "../includes/footer_sp.php"; ?>