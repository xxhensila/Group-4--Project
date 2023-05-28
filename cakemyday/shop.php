<?php require "includes/header.php"; ?>
<?php require "config/config.php"; ?>
<?php 


    #categories
    $categories = $conn -> query("SELECT * FROM categories");
    $categories->execute();

    $allCategories = $categories->fetchAll(PDO::FETCH_OBJ);

    #most wanted
    $mostProducts = $conn -> query("SELECT * FROM products WHERE status = 1 AND (category_id = 2 OR category_id = 4 OR category_id = 5)");
    $mostProducts->execute();

    $allmostProducts = $mostProducts->fetchAll(PDO::FETCH_OBJ);

    #cakes
    $vigies = $conn -> query("SELECT * FROM products WHERE status = 1 AND category_id = 1");
    $vigies->execute();

    $allvigies = $vigies->fetchAll(PDO::FETCH_OBJ);

    #baked goods
    $baked = $conn -> query("SELECT * FROM products WHERE status = 1 AND category_id = 2");
    $baked->execute();

    $allbaked = $baked->fetchAll(PDO::FETCH_OBJ);

    #cupcakes
    $cups = $conn -> query("SELECT * FROM products WHERE status = 1 AND category_id = 4");
    $cups->execute();

    $allcups = $cups->fetchAll(PDO::FETCH_OBJ);

    #macarons
    $macarons = $conn -> query("SELECT * FROM products WHERE status = 1 AND category_id = 5");
    $macarons->execute();

    $allmacarons = $macarons->fetchAll(PDO::FETCH_OBJ);

    #cake jars
    $jars = $conn -> query("SELECT * FROM products WHERE status = 1 AND category_id = 3");
    $jars->execute();

    $alljars = $jars->fetchAll(PDO::FETCH_OBJ);



?>
    <div id="page-content" class="page-content">
        <div class="banner">
            <div class="jumbotron jumbotron-bg text-center rounded-0" style="background-image: url('assets/img/shop_back.jpg');">
                <div class="container">
                    <h1 class="pt-5" style="color:#E91E63">
                        Shopping Page
                    </h1>
                    <p class="lead" style="color:#E91E63">
                        Shopping for pastries is like taking a delicious journey, where every bite is a new adventure !
                    </p>
                </div>
            </div>
        </div>

        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="shop-categories owl-carousel mt-5">
                        <?php foreach($allCategories as $category) : ?>
                        <div class="item">
                            <a href="shop.php">
                                <div class="media d-flex align-items-center justify-content-center">
                                    <span class="d-flex mr-2"><i class="sb-<?php echo $category->icon; ?>"></i></span>
                                    <div class="media-body">
                                        <h5>
                                        <?php echo $category->name; ?>
                                        </h5>
                                        <p>
                                        <?php echo $category->description; ?>     
                                        </p>
                                    </div>                                
                                </div>
                            </a>
                        </div>
                            <?php endforeach; ?>
                        
                    </div>
                </div>
            </div>
        </div>

        <section id="most-wanted">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <h2 class="title">Most Wanted</h2>
                        <div class="product-carousel owl-carousel">
                           <?php 
                           $counter = 0;
                           foreach($allmostProducts as $allmostProduct) : 
                           
                            if ($counter >= 5) {
                                break; // Stop iterating after displaying 4 products
                            }

                           ?>
                    
                            <div class="item">
                                <div class="card card-product">
                                    <div class="card-ribbon">
                                        <div class="card-ribbon-container right">
                                            <span class="ribbon ribbon-primary">SPECIAL</span>
                                        </div>
                                    </div>
                                    <div class="card-badge">
                                        <div class="card-badge-container left">
                                            <span class="badge badge-default">
                                                Until <?php echo $allmostProduct->exp_date; ?>
                                            </span>
                                            <span class="badge badge-primary">
                                                20% OFF
                                            </span>
                                        </div>
                                        <img src="assets/img/<?php echo $allmostProduct->image; ?>" alt="Card image 2" class="card-img-top">
                                    </div>
                                    <div class="card-body">
                                        <h4 class="card-title">
                                            <a href="detail-product.html"><?php echo $allmostProduct->title; ?> </a>
                                        </h4>
                                        <div class="card-price">
                                            <!-- <span class="discount">5000 ALL</span> -->
                                            <span class="reguler"><?php echo $allmostProduct->price; ?> ALL </span>
                                        </div>
                                        <a href="<?php echo APPURL; ?>/products/detail-product.php?id=<?php echo $allmostProduct->id; ?>" class="btn btn-block btn-primary">
                                            Add to Cart
                                        </a>

                                    </div>
                                </div>
                            </div>
                            <?php 
                        $counter++;
                        endforeach; ?>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section id="vegetables" class="gray-bg">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <h2 class="title">CAKES</h2>
                        <div class="product-carousel owl-carousel">
                            <?php foreach($allvigies as $vigies) : ?>
                            <div class="item">
                                <div class="card card-product">
                                    <div class="card-ribbon">
                                        <div class="card-ribbon-container right">
                                            <span class="ribbon ribbon-primary">SPECIAL</span>
                                        </div>
                                    </div>
                                    <div class="card-badge">
                                        <div class="card-badge-container left">
                                            <span class="badge badge-default">
                                                Until <?php echo $vigies->exp_date; ?>
                                            </span>
                                            <span class="badge badge-primary">
                                                20% OFF
                                            </span>
                                        </div>
                                        <img src="assets/img/<?php echo $vigies->image; ?>" alt="Card image 2" class="card-img-top">
                                    </div>
                                    <div class="card-body">
                                        <h4 class="card-title">
                                            <a href="detail-product.html"><?php echo $vigies->title; ?></a>
                                        </h4>
                                        <div class="card-price">
                                            <!-- <span class="discount">400 ALL</span> -->
                                            <span class="reguler"><?php echo $vigies->price; ?> ALL</span>
                                        </div>
                                        <a href="<?php echo APPURL; ?>/products/detail-product.php?id=<?php echo $vigies->id; ?>" class="btn btn-block btn-primary">
                                            Add to Cart
                                        </a>

                                    </div>
                                </div>
                            </div>
                                <?php endforeach; ?>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section id="meats">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <h2 class="title">Baked Goods</h2>
                        <div class="product-carousel owl-carousel">
                            
                        <?php foreach($allbaked as $bake) : ?>
                            <div class="item">
                                <div class="card card-product">
                                    <div class="card-ribbon">
                                        <div class="card-ribbon-container right">
                                            <span class="ribbon ribbon-primary">SPECIAL</span>
                                        </div>
                                    </div>
                                    <div class="card-badge">
                                        <div class="card-badge-container left">
                                            <span class="badge badge-default">
                                                Until <?php echo $bake->exp_date; ?>
                                            </span>
                                            <span class="badge badge-primary">
                                                20% OFF
                                            </span>
                                        </div>
                                        <img src="assets/img/<?php echo $bake->image; ?>" alt="Card image 2" class="card-img-top">
                                    </div>
                                    <div class="card-body">
                                        <h4 class="card-title">
                                            <a href="detail-product.html"><?php echo $bake->title; ?></a>
                                        </h4>
                                        <div class="card-price">
                                            <!-- <span class="discount">750 ALL</span> -->
                                            <span class="reguler"><?php echo $bake->price; ?> ALL</span>
                                        </div>
                                        <a href="<?php echo APPURL; ?>/products/detail-product.php?id=<?php echo $bake->id; ?>" class="btn btn-block btn-primary">
                                            Add to Cart
                                        </a>

                                    </div>
                                </div>
                            </div>
                            <?php endforeach; ?>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section id="fishes" class="gray-bg">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <h2 class="title">Cupcakes</h2>
                        <div class="product-carousel owl-carousel">
                            
                        <?php foreach($allcups as $cup) : ?>
                            <div class="item">
                                <div class="card card-product">
                                    <div class="card-ribbon">
                                        <div class="card-ribbon-container right">
                                            <span class="ribbon ribbon-primary">SPECIAL</span>
                                        </div>
                                    </div>
                                    <div class="card-badge">
                                        <div class="card-badge-container left">
                                            <span class="badge badge-default">
                                                Until <?php echo $cup->exp_date; ?>
                                            </span>
                                            <span class="badge badge-primary">
                                                20% OFF
                                            </span>
                                        </div>
                                        <img src="assets/img/<?php echo $cup->image; ?>" alt="Card image 2" class="card-img-top">
                                    </div>
                                    <div class="card-body">
                                        <h4 class="card-title">
                                            <a href="detail-product.html"><?php echo $cup->title; ?>                                           </a>
                                        </h4>
                                        <div class="card-price">
                                            <!-- <span class="discount">500 ALL</span> -->
                                            <span class="reguler"><?php echo $cup->price; ?> ALL</span>
                                        </div>
                                        <a href="<?php echo APPURL; ?>/products/detail-product.php?id=<?php echo $cup->id; ?>" class="btn btn-block btn-primary">
                                            Add to Cart
                                        </a>

                                    </div>
                                </div>
                            </div>
                            <?php endforeach; ?>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section id="fruits">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <h2 class="title">Macarons</h2>
                        <div class="product-carousel owl-carousel">

                        <?php foreach($allmacarons as $macaron) : ?>
                        
                            <div class="item">
                                <div class="card card-product">
                                    <div class="card-ribbon">
                                        <div class="card-ribbon-container right">
                                            <span class="ribbon ribbon-primary">SPECIAL</span>
                                        </div>
                                    </div>
                                    <div class="card-badge">
                                        <div class="card-badge-container left">
                                            <span class="badge badge-default">
                                                Until <?php echo $macaron->exp_date; ?>
                                            </span>
                                            <span class="badge badge-primary">
                                                20% OFF
                                            </span>
                                        </div>
                                        <img src="assets/img/<?php echo $macaron->image; ?>" alt="Card image 2" class="card-img-top">
                                    </div>
                                    <div class="card-body">
                                        <h4 class="card-title">
                                            <a href="detail-product.html"><?php echo $macaron->title; ?></a>
                                        </h4>
                                        <div class="card-price">
                                            <!-- <span class="discount">350 ALL</span> -->
                                            <span class="reguler"><?php echo $macaron->price; ?> ALL</span>
                                        </div>
                                        <a href="<?php echo APPURL; ?>/products/detail-product.php?id=<?php echo $macaron->id; ?>" class="btn btn-block btn-primary">
                                            Add to Cart
                                        </a>

                                    </div>
                                </div>
                            </div>
                            <?php endforeach; ?>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section id="jars">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <h2 class="title">Cake Jars</h2>
                        <div class="product-carousel owl-carousel">

                        <?php foreach($alljars as $jar) : ?>
                        
                            <div class="item">
                                <div class="card card-product">
                                    <div class="card-ribbon">
                                        <div class="card-ribbon-container right">
                                            <span class="ribbon ribbon-primary">SPECIAL</span>
                                        </div>
                                    </div>
                                    <div class="card-badge">
                                        <div class="card-badge-container left">
                                            <span class="badge badge-default">
                                                Until <?php echo $jar->exp_date; ?>
                                            </span>
                                            <span class="badge badge-primary">
                                                20% OFF
                                            </span>
                                        </div>
                                        <img src="assets/img/<?php echo $jar->image; ?>" alt="Card image 2" class="card-img-top">
                                    </div>
                                    <div class="card-body">
                                        <h4 class="card-title">
                                            <a href="detail-product.html"><?php echo $jar->title; ?></a>
                                        </h4>
                                        <div class="card-price">
                                            <!-- <span class="discount">350 ALL</span> -->
                                            <span class="reguler"><?php echo $jar->price; ?> ALL</span>
                                        </div>
                                        <a href="<?php echo APPURL; ?>/products/detail-product.php?id=<?php echo $jar->id; ?>" class="btn btn-block btn-primary">
                                            Add to Cart
                                        </a>

                                    </div>
                                </div>
                            </div>
                            <?php endforeach; ?>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
<?php require "includes/footer.php"; ?>

