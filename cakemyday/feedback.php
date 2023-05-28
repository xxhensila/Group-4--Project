<?php require "includes/header.php"; ?>
<?php require "config/config.php"; ?>
<?php 

if(!isset($_SESSION['username'])) {
                
    echo "<script> window.location.href='".APPURL."'; </script>";

}

if(isset($_POST['submit'])) {

            $username = $_POST['username'];
            $email = $_POST['email'];
            $visit = $_POST['visit'];
            $service = $_POST['service'];
            $ordering = $_POST['ordering'];
            $order_again = $_POST['order_again'];
            $rate = $_POST['rate'];


            $insert = $conn->prepare("INSERT INTO feedbacks(username, email, visit, service,
           ordering, order_again, rate)
            VALUES(:username, :email, :visit, :service,
           :ordering, :order_again, :rate)");

            $insert->execute([
                ":username" => $username,
                ":email" => $email,
                ":visit" => $visit,
                ":service" => $service,
                ":ordering" => $ordering,
                ":order_again" => $order_again,
                ":rate" => $rate,
            ]);
            // var_dump();
            // go to paypal page
            echo "<script>alert('Feedback submitted!')</script>";

        }

        //validating cart products
       if(isset($_SESSION['username'])) {

        $validate = $conn->query("SELECT * FROM feedbacks WHERE email='$_SESSION[email]'");
        $validate->execute();
   }
    

?>

<style>
    /* CSS styles for the form elements */
    input[type="text"],
    input[type="email"],
    button[type="submit"] {
        border-color: #E91E63;
    }
    

            input[type="radio"] {
        /* Hide the default radio button */
        appearance: none;
        -webkit-appearance: none;
        -moz-appearance: none;
        /* Create a custom radio button */
        width: 20px;
        height: 20px;
        border: 2px solid red;
        border-radius: 50%;
        outline: none;
        /* Add a checkmark */
        position: relative;
        }

        input[type="radio"]::before {
        content: "";
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        width: 10px;
        height: 10px;
        background-color: red; /* Customize the checkmark color */
        border-radius: 50%;
        opacity: 0; /* Hide the checkmark by default */
        }

        input[type="radio"]:checked::before {
        opacity: 1; /* Show the checkmark when the radio button is checked */
        }

        
</style>

    <div id="page-content" class="page-content">
        <div class="banner">
            <div class="jumbotron jumbotron-bg text-center rounded-0" style="background-image: url('<?php echo APPURL; ?>/assets/img/shop_back.jpg');">
                <div class="container">
                    <h1 class="pt-5" style="color:#E91E63">
                        Feel free to share your thoughts with us
                    </h1>
                    <p class="lead" style="color:#E91E63">
                        Complete the form below to provide a feedback !
                    </p>
                </div>
            </div>
        </div>

        <section id="feedback">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-xs-12 col-sm-6">
                        <h5 class="mb-3">YOUR FEEDBACK</h5>
                        <!-- Bill Detail of the Page -->
                <form action="feedback.php" method="POST">
                    <!-- <label for="username">Username:</label><br> -->
                    <input type="text" name="username" id="username" required readonly value="<?php echo $_SESSION['username']?>"><br><br>

                    <!-- <label for="email">Email:</label><br> -->
                    <input type="email" name="email" id="email" required readonly value="<?php echo $_SESSION['email']?>"><br><br>

                    <label for="visit">Is this your first visit to the website?</label><br>
                    <input type="radio" name="visit" value="Yes"> Yes
                    <input type="radio" name="visit" value="No"> No<br><br>

                    <label for="service">How would you rate the service of the website?</label><br>
                    <input type="radio" name="service" value="Bad">Bad
                    <input type="radio" name="service" value="Not so bad"> Not so bad
                    <input type="radio" name="service" value="Average"> Average
                    <input type="radio" name="service" value="Good"> Good
                    <input type="radio" name="service" value="Very good"> Very good
                    <input type="radio" name="service" value="Excellent"> Excellent<br><br>

                    <label for="ordering">Was the ordering process easy or difficult to do?</label><br>
                    <input type="radio" name="ordering" value="Easy"> Easy
                    <input type="radio" name="ordering" value="Difficult"> Difficult<br><br>

                    <label for="order_again">Would you order again from the website?</label><br>
                    <input type="radio" name="order_again" value="Yes"> Yes
                    <input type="radio" name="order_again" value="No"> No<br><br>

                    <label for="rate">How many stars would you give the website?</label><br>
                    <input type="radio" name="rate" value="1"> 1
                    <input type="radio" name="rate" value="2"> 2
                    <input type="radio" name="rate" value="3"> 3
                    <input type="radio" name="rate" value="4"> 4
                    <input type="radio" name="rate" value="5"> 5<br><br>

                    <?php if(isset($_SESSION['username'])) : ?>
                                <?php if($validate->rowCount() > 0) : ?>
                                    <button  name="submit" type="submit" class="btn-insert mt-3 btn btn-primary btn-lg" disabled>
                                         Feedback submitted
                                    </button>
                                <?php else : ?>
                                    <button  name="submit" type="submit" class="btn-insert mt-3 btn btn-primary btn-lg">
                                         Submit Feedback
                                    </button>
                                <?php endif; ?>
                    <?php endif; ?>
                </form>

                    </div>
                </div>
            </div>
        </section>
    </div>
<?php require "includes/footer.php"; ?>