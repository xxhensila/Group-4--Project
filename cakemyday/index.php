<?php require "includes/header.php"; ?>
<?php require "config/config.php"; ?>
<?php 

$categories = $conn -> query("SELECT * FROM categories");
$categories->execute();

$allCategories = $categories->fetchAll(PDO::FETCH_OBJ);

?>

    <div id="page-content" class="page-content">
        <div class="banner">
            <div class="jumbotron jumbotron-video text-center bg-dark mb-0 rounded-0">
                <video width="100%" preload="auto" loop autoplay muted>
                    <source src='assets/media/indexvideo.mp4' type='video/mp4' />
                    
                </video>
                <div class="container">
                    <h1 class="pt-5">
                        
                        Life is uncertain, but dessert doesn't have to be! 
                    <p class="lead">
                        Indulge in our decadent pastries and savor every sweet moment."
                    </h1>
                    </p>

                    <div class="row">
                        <div class="col-md-4">
                            <div class="card border-0 text-center">
                                <div class="card-icon">
                                    <div class="card-icon-i">
                                        <i class="fa fa-shopping-basket"></i>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <h4 class="card-title">
                                        Buy
                                    </h4>
                                    <p class="card-text">
                                        Simply click-to-buy on the product you want and submit your order when you're done.
                                    </p>

                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="card border-0 text-center">
                                <div class="card-icon">
                                    <div class="card-icon-i">
                                        <i class="fas fa-circle"></i>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <h4 class="card-title">
                                        Welcome
                                    </h4>
                                    <p class="card-text">
                                        Here to cake your day!
                                    </p>

                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="card border-0 text-center">
                                <div class="card-icon">
                                    <div class="card-icon-i">
                                        <i class="fa fa-truck"></i>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <h4 class="card-title">
                                        Delivery
                                    </h4>
                                    <p class="card-text">
                                        We ensure that you get your order in the fastest way possible, in. your. hands!
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <section id="why">
            <h2 class="title">Why Cake My Day</h2>
            <div class="container">
                <div class="row">
                    <div class="col-md-4">
                        <div class="card border-0 text-center gray-bg">
                            <div class="card-icon">
                                <div class="card-icon-i text-success">
                                    <i class="fas fa-magic"></i>
                                </div>
                            </div>
                            <div class="card-body">
                                <h4 class="card-title">
                                    Convenience
                                </h4>
                                <p class="card-text">
                                    You can browse through a wide variety of cake options, compare prices, and place an order from the comfort of your own home. 
                                    <!-- Our farm-to-table concept emphasizes on getting the fresh produce directly from local farms to your tables within one day, hence you know you get the freshest produce straight from harvest. -->
                                </p>

                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card border-0 text-center gray-bg">
                            <div class="card-icon">
                                <div class="card-icon-i text-success">
                                    <i class="fa fa-magic"></i>
                                </div>
                            </div>
                            <div class="card-body">
                                <h4 class="card-title">
                                    Extensive Selection
                                </h4>
                                <p class="card-text">
                                     You can explore various flavors, sizes, designs, and themes, allowing you to find the perfect cake for any occasion.
                                    <!-- We want you to know exactly who is growing your food by having the farmers profile on each item and farmers page. You’re welcome to visit the farms and see the love they put into growing your food. -->
                                </p>

                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card border-0 text-center gray-bg">
                            <div class="card-icon">
                                <div class="card-icon-i text-success">
                                    <i class="fas fa-magic"></i>
                                </div>
                            </div>
                            <div class="card-body">
                                <h4 class="card-title">
                                    Surprise Gifts
                                </h4>
                                <p class="card-text">
                                    ou can include personalized messages and even select delivery dates to coincide with special occasions.
                                    <!-- Slowly but sure, by cutting the complex supply chain and food system, we hope to improve the welfare of farmers by giving them the returns they deserve for their hard work. -->
                                </p>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-12 mt-5 text-center">
                        <a href="shop.php" class="btn btn-primary btn-lg">SHOP NOW</a>
                    </div>
                </div>
            </div>
        </section>

        <section id="categories" class="pb-0 gray-bg">
            <h2 class="title">Categories</h2>
            <div class="landing-categories owl-carousel">
                <?php  foreach($allCategories as $category) :  ?>
                <div class="item">
                    <div class="card rounded-0 border-0 text-center">
                        <img src="assets/img/<?php echo $category->image; ?>">
                        <div class="card-img-overlay d-flex align-items-center justify-content-center">
                            <!-- <h4 class="card-title">Vegetables</h4> -->
                            <a href="shop.php" class="btn btn-primary btn-lg"><?php echo $category->name; ?></a>
                        </div>
                    </div>
                </div>
                <?php endforeach; ?>       
            </div>
        </section>
    </div>
<?php require "includes/footer.php" ?>
