<?php
include('dashboard/functions.php');

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    if (isset($_POST['deleteItem_wishlist'])) {
        $deleteCart = $Cart->deleteCart($_POST['item_id'], 'wishlist');
    }
}


include('header.php');
?>
<section class="blogSec1">
    <h3>WishList</h3>
    <div>
        <a href="index.php">Home</a>
        <p> /Your WishList</p>
    </div>
</section>
<section class="container">
    <table class="table ">
        <tr>
            <th>Product</th>
            <th>Price</th>
            <th>Quantity</th>
            <th>-</th>

        </tr>
        <?php
        foreach ($product->getData('wishlist') as $item) :
            if (isset($_SESSION['user_id'])) {
                if ($item['user_id'] == $_SESSION['user_id']) {

                    $cart = $product->getProduct($item['item_id']);
                    $subTotal[] = array_map(function ($item) {
        ?>
                        <tr>
                            <td class="d-flex">
                                <img src="uploads/products/<?php echo $item["image"] ?>" width="50px" alt="">
                                <h3 class="thePrice"><?php echo $item["name"] ?></h3>
                            </td>
                            <td>
                                <p>$<?php echo $item["price"] ?></p>
                            </td>
                            <td>
                                <form method="post">
                                    <input type="hidden" value="<?php echo $item["id"] ?>" name="item_id">
                                    <button name="deleteItem_wishlist" class="cartBtn" type="submit"><i class="fas fa-trash"></i></button>
                                </form>
                            </td>
                        </tr>

        <?php
                        return $item['price'];
                    }, $cart);
                }
            }
        endforeach;
        ?>
    </table>
    <div class="d-flex justify-content-end">
        <div class="counttt">

            <p>
                <span>Cart Items:</span>
                <?php
                echo count($Cart->getData('wishlist'))   ?>
            </p>
            <br>
            <p>
                <span> SubTotal:</span>
                $
                <?php
                echo  isset($subTotal) ? $Cart->getSum($subTotal) : 0;
                ?>
            </p>
        </div>
    </div>
</section>


<?php
include('footer.php');
?>