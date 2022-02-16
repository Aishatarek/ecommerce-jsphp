<?php
ob_start();

include('dashboard/functions.php');
//display all
$products = $product->getLimitedData();
if ($_SERVER['REQUEST_METHOD'] == "POST") {
    if (isset($_POST['addToCart_submit'])) {
        $Cart->addToCart($_POST['user_id'], $_POST['item_id']);
    }
    if (isset($_POST['wishlist-submit'])) {
        $Cart->addToWishList($_POST['user_id'], $_POST['item_id']);
    }
}
//brand
$product_shuffle = $product->getLimitedData();
$brand = array_map(function ($producttt) {
    return $producttt['brand'];
}, $product_shuffle);
$unique = array_unique($brand);
sort($unique);
shuffle($product_shuffle);
//  Most Recent
$mostRecent = $product->getRecentedData();

//is in the cart
if (count($Cart->getData('cart')) > 0) {
    $in_cart = $Cart->getCartId($Cart->getData('cart'));
} else {
    $in_cart = [];
}
//is in the wishlist
if (count($Cart->getData('wishlist')) > 0) {
    $in_wishList = $Cart->getCartId($Cart->getData('wishlist'));
} else {
    $in_wishList = [];
}
?>


    <!--header-->
<?php
include('header.php');

?>
    <!--first secion-->
    <section id="carouselExampleControls" class="carousel slide" data-ride="carousel">
        <div class="carousel-inner">
            <div class="carousel-item active">
                <div>
                    <h2>World's </h2>
                    <img src="images/home-1-img-4_1_425x572.png" class="d-block " alt="...">
                    <h2>Designs</h2>
                </div>
            </div>
            <div class="carousel-item">
                <div>
                    <h2>Newest </h2>
                    <img src="images/home-1-img-7_425x572.png" class="d-block " alt="...">
                    <h2>Models</h2>
                </div>

            </div>
            <div class="carousel-item">
                <div>
                    <h2>Luxury </h2>
                    <img src="images/home-1-img-6_1_425x572.png" class="d-block " alt="...">
                    <h2>Brands</h2>
                </div>

            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-target="#carouselExampleControls" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-target="#carouselExampleControls" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </button>
    </section>
    <!--second secion (bannar)-->
    <section class="container secondsec">
        <h3>The Lawson Collection</h3>
        <p>We are happy to introduce the new Lawson Collection. These are three quartz models designed with simplicity and elegance kept in mind. They come in different sizes and colors, and all feature a stainless steel back — leaving enough space for a personalized engraving. The engraving service is complimentary with any watch from the Lawson series.</p>
        <div class="row">
            <?php
            foreach ($products as $productt) { ?>
                <div class="col-md-4 col-sm-12 ">
                    <div class="cardy">
                        <a href="<?php printf('%s?id=%s', 'productDetail.php',  $productt['id']); ?>">
                            <img src="uploads/products/<?php echo $productt['image'] ?>" alt="">
                            <p><?php echo $productt['name']; ?></p>
                        </a>
                        <p>$<?php echo $productt['price']; ?></p>
                        <form method="post">
                            <input type="hidden" name="item_id" value="<?php echo $productt['id']; ?>">
                            <input type="hidden" name="user_id" value="<?php echo $_SESSION['user_id']; ?>">
                            <?php
                            if (in_array($productt['id'], $in_cart)) {
                                echo '<button  disabled class="cartBtnd">In the Cart</button>';
                            } else {
                                echo '<button type="submit" class="cartBtn" name="addToCart_submit" >Add to Cart</button>';
                            }
                            ?>
                        </form>
                        <form method="post">
                            <input type="hidden" name="item_id" class="wishlistBtn" value="<?php echo $productt['id']; ?>">
                            <input type="hidden" name="user_id" class="wishlistBtn" value="<?php echo $_SESSION['user_id']; ?>">
                            <?php
                            if (in_array($productt['id'], $in_wishList)) {
                                echo '<button class="wishlistBtn" disabled ><i class="fas fa-heart"></i></button>';
                            } else {
                                echo '<button type="submit"  class="wishlistBtn" name="wishlist-submit" ><i class="far fa-heart"></i></button>';
                            }
                            ?>
                        </form>
                    </div>
                </div>
            <?php
            } ?>
        </div>

    </section>
    <!--third secion-->
    <section class="container thirdSec">
        <div class="row">
            <div class="col-md-6 col-sm-12">
                <h3>Swiss Essence</h3>
                <p>The first association that comes to one’s mind with the phrase “a good wristwatch” is naturally one made somewhere in Switzerland. Do you want to know what makes Swiss watches stand out?</p>
                <button>Learn More</button>
            </div>
            <div class="col-md-6 col-sm-12">
                <img src="images/home-1-img-1_900x.jpg" alt="">

            </div>
        </div>

    </section>
    <!--fourth section (brands)-->
    <section class="container fourthSec">
        <h3>Brands</h3>
        <div class="about">
            <?php

            array_map(function ($brand) {
                printf('<button class="tab-btn searchBtn" data-id="%s">%s</button>', $brand, $brand);
            }, $unique); ?>
            <div class="row">
                <?php array_map(function ($item) use ($in_cart, $in_wishList) {  ?>

                    <div class="content col-md-4 col-sm-12" id="<?php echo $item['brand']; ?>">
                        <div class="cardy">
                            <img src="uploads/products/<?php echo $item['image'] ?>" alt="">
                            <p><?php echo $item['name']; ?></p>
                            <p><?php echo $item['brand']; ?></p>
                            <p>$<?php echo $item['price']; ?></p>
                            <form method="post">
                                <input type="hidden" name="item_id" value="<?php echo $item['id']; ?>">
                                <input type="hidden" name="user_id" value="<?php echo  $_SESSION['user_id']; ?>">
                                <?php
                                if (in_array($item['id'], $in_cart)) {
                                    echo '<button  disabled class="cartBtnd">In the Cart</button>';
                                } else {
                                    echo '<button type="submit" class="cartBtn" name="addToCart_submit" >Add to Cart</button>';
                                }
                                ?>
                            </form>
                            <form method="post">
                                <input type="hidden" name="item_id" value="<?php echo $item['id']; ?>">
                                <input type="hidden" name="user_id" value="<?php echo  $_SESSION['user_id']; ?>">
                                <?php
                                if (in_array($item['id'], $in_wishList)) {
                                    echo '<button class="wishlistBtn" disabled ><i class="fas fa-heart"></i></button>';
                                } else {
                                    echo '<button type="submit"  class="wishlistBtn" name="wishlist-submit" ><i class="far fa-heart"></i></button>';
                                }
                                ?>
                            </form>
                        </div>
                    </div>
                <?php }, $product_shuffle) ?>
            </div>
        </div>
    </section>
    <!--fifth section (brands)-->
    <section class="container fifthSec">
        <div class="row">
            <div class="col-md-4 col-sm-12">
                <div>
                    <h3>Sapphire Crystal</h3>
                    <p>Known for obtaining a remarkable hardness (nearly as hard as a diamond). Has a high scratch resistance which makes it a perfect material for wristwatches.</p>
                </div>
                <div>
                    <h3>Swiss Ronda Movement</h3>
                    <p>Run by the vibration of a quartz crystal (32,784 times per second) under current to keep accurate time.</p>
                </div>
            </div>
            <div class="col-md-4 col-sm-12">
                <img src="images/home-1-img-3_2_900x.png" alt="">
            </div>
            <div class="col-md-4 col-sm-12">
                <div>
                    <h3>316L Stainless Steel</h3>
                    <p>The watch case is made of extra low carbon steel that is often used in surgical instruments and marine appliances thanks to its high corrosion resistance.</p>
                </div>
                <div>
                    <h3>Italian Leather Straps</h3>
                    <p>The band is made of high-grade Italian eco-leather with a soft nubuck lining for extra comfort. Obtains excellent wearing qualities.</p>
                </div>
            </div>
        </div>
    </section>
    <!--sixth section -->
    <section class="container sixthSec">
        <div class="row">
            <div class="col-md-6 col-sm-12">
                <img src="images/home-1-img-2_900x.jpg" alt="">

            </div>
            <div class="col-md-6 col-sm-12">
                <h3>Designed for Those Who Evade Limits</h3>
                <p>Attention to details is always a good feature. We couldn’t think of any better present for our 5th anniversary than a pair of exclusive watches from the Lawson collection. Every time I look at my watch I think of her and feel she thinks of me.</p>
                <button>Read Our Story</button>
            </div>

        </div>

    </section>
    <!--seventh section (best seller)-->
    <section class="container seventhSec">
        <h3>Most Recent</h3>
        <p>We are happy to introduce the new Lawson Collection. These are three quartz models designed with simplicity and elegance kept in mind. They come in different sizes and colors, and all feature a stainless steel back — leaving enough space for a personalized engraving. The engraving service is complimentary with any watch from the Lawson series.</p>
        <div class="row">
            <?php

            foreach ($mostRecent as $productt) { ?>
                <div class="col-md-4 col-sm-12">
                    <div class="cardy">
                        <img src="uploads/products/<?php echo $productt['image'] ?>" alt="">
                        <a href="<?php printf('%s?id=%s', 'productDetail.php',  $productt['id']); ?>">
                            <p><?php echo $productt['name']; ?></p>
                        </a>

                        <p>$<?php echo $productt['price']; ?></p>
                        <form method="post">
                            <input type="hidden" name="item_id" value="<?php echo $productt['id']; ?>">
                            <input type="hidden" name="user_id" value="<?php echo $_SESSION['user_id']; ?>">
                            <?php
                            if (in_array($productt['id'], $in_cart)) {
                                echo '<button  disabled class="cartBtnd">In the Cart</button>';
                            } else {
                                echo '<button type="submit" class="cartBtn" name="addToCart_submit" >Add to Cart</button>';
                            }
                            ?>
                        </form>
                        <form method="post">
                            <input type="hidden" name="item_id" value="<?php echo $productt['id']; ?>">
                            <input type="hidden" name="user_id" value="<?php echo $_SESSION['user_id']; ?>">
                            <?php
                            if (in_array($productt['id'], $in_wishList)) {
                                echo '<button class="wishlistBtn" disabled ><i class="fas fa-heart"></i></button>';
                            } else {
                                echo '<button type="submit"  class="wishlistBtn" name="wishlist-submit" ><i class="far fa-heart"></i></button>';
                            }
                            ?>
                        </form>
                    </div>
                </div>

            <?php

            } ?>
        </div>

    </section>
    <!--footer-->
    <script src="main.js"></script>
   <?php
   include('footer.php');
   ?>


