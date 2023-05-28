<?php 

    if(!isset($_SERVER['HTTP_REFERER'])){
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
    
    // this is to delete the items from cart after the order is made
    if(isset($_SESSION['user_id'])) {
        $delete = $conn->prepare("DELETE FROM card WHERE user_id='$_SESSION[user_id]'");
        $delete->execute();
    
    }
   


?>
<div class="banner">
            <div class="jumbotron jumbotron-bg text-center rounded-0" style="background-image: url('<?php echo APPURL; ?>/assets/img/details.jpg');">
                <div class="container">
                    <h1 class="pt-5">
                        Payment has been a success 
                    </h1>
                    <p class="lead">
                        You can check your orders now.
                    </p>
                    <a href="../users/transaction.php?id=<?php echo $_SESSION['user_id']; ?>" class="btn btn-primary text-uppercase" style="background-color:black;">My orders</a>

                  
                </div>
            </div>
</div>

<?php require "../includes/footer_sp.php"; ?>
