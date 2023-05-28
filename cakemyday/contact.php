<?php require "includes/header.php"; ?>
<?php require "config/config.php"; ?>

<?php 

// if(!isset($_SESSION['username'])) {
                
//     echo "<script> window.location.href='".APPURL."'; </script>";

// }

if(isset($_POST['submit'])) {

    $fullname = $_POST['fullname'];
    $email = $_POST['email'];
    $details = $_POST['details'];


    $insert = $conn->prepare("INSERT INTO contact(fullname, email, details)
    VALUES(:fullname, :email, :details)");

    $insert->execute([
        ":fullname" => $fullname,
        ":email" => $email,
        ":details" => $details,
    ]);
    // var_dump();
    // go to paypal page
    echo "<script>alert('Thanks for the message! The administrator will contact you in the email that you provided for further details!')</script>";

}

//validating cart products
if(isset($_SESSION['username'])) {

$validate = $conn->query("SELECT * FROM contact WHERE email='$_SESSION[email]'");
$validate->execute();
}


?>
    <div id="page-content" class="page-content">
        <div class="banner">
            <div class="jumbotron jumbotron-bg text-center rounded-0" style="background-image: url('<?php echo APPURL; ?>/assets/img/front.jpg');">
                <br><br><br>
                <div class="container">
                    <h1 class="pt-5">
                        Contact
                    </h1>
                    <p class="lead">
                        Don't Hesitate to Contact Us.
                    </p>
                </div>
            </div>
        </div>

        <section class="pb-0">
            <div class="contact1 mb-5">
                <div class="container">
                    <div class="row mt-3">
                        <div class="col-lg-7">
                            <div class="contact-wrapper">
                                <h3 class="title font-weight-normal mt-0 text-left">Send us a message</h3>
                                <form data-aos="fade-left" data-aos-duration="1200" method="POST" action="contact.php">
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <input class="form-control" type="text" placeholder="Full Name" name="fullname" id="fullname">
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <input class="form-control" type="email" placeholder="Email" name="email" id="email">
                                            </div>
                                        </div>
                                        <div class="col-lg-12">
                                            <div class="form-group">
                                                <textarea class="form-control" rows="3" placeholder="Message" name="details" id="details"></textarea>
                                            </div>
                                        </div>
                                        <div class="col-lg-12 text-right">
                                            <button type="submit" class="btn btn-lg btn-primary mb-5" name="submit" id="submit" >Send</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <div class="col-lg-5">
                            <div class="detail-wrapper p-5 bg-primary">
                                <h3 class="font-weight-normal mb-3 text-light">
                                    Cake My Day Headquarter
                                </h3>

                                <p class="text-light">
                                    Schaufenberger Str. 43, <br>41836 Hückelhoven, <br> Germany
                                </p>

                                <p class="text-light">
                                    <i class="fas fa-phone"></i> +492433442977<br>
                                    <i class="fas fa-envelope"></i> hello@cakemyday.com
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d41086304.53200858!2d-71.84369809999995!3d51.05846050000004!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x47c0a93b7eb43485%3A0x114e967076f71f6d!2sCake%20my%20Day!5e0!3m2!1sen!2s!4v1683207535452!5m2!1sen!2s" width="100%" height="600" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
            <!-- <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3960.97915747782!2d107.58270291427688!3d-6.893096195019089!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e68e67b57d420db%3A0x4dd071fcb9157e80!2sBTC+Fashion+Mall!5e0!3m2!1sen!2sid!4v1522964715022" width="100%" height="450" frameborder="0" style="border:0;" allowfullscreen></iframe> -->
        </section>
    </div>

<?php require "includes/footer.php"; ?>
