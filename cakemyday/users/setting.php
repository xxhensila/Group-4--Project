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

        $select= $conn->query("SELECT * FROM users WHERE id='$id'");
        $select -> execute();

        $users = $select->fetch(PDO::FETCH_OBJ);
        
        if(isset($_POST['submit'])) {
            $username= $_POST['username'];
            $address= $_POST['address'];
            $city= $_POST['city'];
            $country= $_POST['country'];
            $zip_code= $_POST['zip_code'];
            $phone_number= $_POST['phone_number'];
            $mypassword= $_POST['mypassword'];

            $update = $conn->prepare("UPDATE users SET username= '$username', address= '$address',
            city = '$city', country= '$country', zip_code = '$zip_code', phone_number='$phone_number', mypassword='$mypassword' WHERE id='$id'");

            $update->execute();
            echo "<script> window.location.href='".APPURL."'; </script>";


        }
    } else {
        echo "<script> window.location.href='".APPURL."/404.php'; </script>";
    }
?>

    <div id="page-content" class="page-content">
        <div class="banner">
            <div class="jumbotron jumbotron-bg text-center rounded-0" style="background-image: url('<?php echo APPURL; ?>/assets/img/shop_back.jpg');">
                <div class="container">
                    <h1 class="pt-5" style="color:#E91E63">
                        SETTINGS
                    </h1>
                    <p class="lead" style="color:#E91E63">
                        Update your account details
                    </p>
                </div>
            </div>
        </div>

        <section id="checkout">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-xs-12 col-sm-6">
                        <h5 class="mb-3">ACCOUNT DETAILS</h5>
                        <!-- Bill Detail of the Page -->
                        <form action="setting.php?id=<?php echo $id; ?>" method="POST" class="bill-detail">
                            <fieldset>
                                <div class="form-group row">
                                    <div class="col">
                                        <input class="form-control" placeholder="username" name="username" value="<?php echo $users->username; ?>" type="text">
                                    </div>
                                   
                                </div>
                               
                                <div class="form-group">
                                    <textarea class="form-control" placeholder="Address" name="address" ><?php echo $users->address; ?></textarea>
                                </div>
                                <div class="form-group">
                                    <input class="form-control" placeholder="Town / City" name="city" value="<?php echo $users->city; ?>" type="text">
                                </div>
                                <div class="form-group">
                                    <input class="form-control" placeholder="State / Country" name="country" value="<?php echo $users->country; ?>" type="text">
                                </div>
                                <div class="form-group">
                                    <input class="form-control" placeholder="Postcode / Zip" name="zip_code" value="<?php echo $users->zip_code; ?>" type="text">
                                </div>
                                <div class="form-group row">
                                    
                                    <div class="col">
                                        <input class="form-control" placeholder="Phone Number" name="phone_number" value="<?php echo $users->phone_number; ?>"  type="tel">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <input class="form-control" placeholder="Password" name="mypassword" value="xxxxx" type="password">
                                </div>
                                <div class="form-group text-right">
                                    <button type="submit" name= "submit" class="btn btn-primary">UPDATE</button>
                                    <div class="clearfix">
                                </div>
                            </fieldset>
                        </form>
                        <!-- Bill Detail of the Page end -->
                    </div>
                </div>
            </div>
        </section>
    </div>
<?php require "../includes/footer_sp.php"; ?>