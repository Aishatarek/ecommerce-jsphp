<?php
include('dashboard/functions.php');
$products = $product->getLimitedData();
if ($_SERVER['REQUEST_METHOD'] == "POST") {
    if (isset($_POST['addToCart_submit'])) {
        $Cart->addToCart($_POST['user_id'], $_POST['item_id']);
    }
    if (isset($_POST['wishlist-submit'])) {
        $Cart->addToWishList($_POST['user_id'], $_POST['item_id']);
    }
}
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
include('header.php');
?>
<section class="shopSec1">
    <h3>Shop</h3>
    <div>
        <a href="index.php">Home</a>
        <p> /Shop</p>
    </div>
</section>

<section class="container">
    <div class="row">
        <div class="col-md-8 col-sm-8">
            <div class="imgggshop">
            <img src="images/home-repair-3_1080x.png"  alt="">
            </div>
            <div class="row">
                <?php
                foreach ($products as $productt) { ?>
                    <div class="col-md-6 col-sm-12 ">
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
        </div>
        <div class="col-md-4 col-sm-4">
            <div class="serachhh">
                <h3>Search</h3>
                <form>
                    <input type="text" placeholder="Search">
                    <div><i class="fas fa-search"></i></div>
                </form>
            </div>

        </div>
    </div>
</section>


<?php
include('footer.php');
?>