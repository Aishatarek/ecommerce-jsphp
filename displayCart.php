<?php
include('dashboard/functions.php');

if ($_SERVER['REQUEST_METHOD'] == "POST") {
   if (isset($_POST['deleteItem_cart'])) {
      $deleteCart = $Cart->deleteCart($_POST['item_id']);
   }
   if (isset($_POST['wishlist-submit'])) {
      $Cart->saveForLater($_POST['item_id2']);
   }
}
//is in the wishlist
if (count($Cart->getData('wishlist')) > 0) {
   $in_wishList = $Cart->getCartId($Cart->getData('wishlist'));
} else {
   $in_wishList = [];
}
include('header.php');
?>
<section class="blogSec1">
   <h3>Cart</h3>
   <div>
      <a href="index.php">Home</a>
      <p> /Your Cart</p>
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
      foreach ($Cart->getData('cart') as $cartt) :
         if ($cartt['user_id'] == $_SESSION['user_id']) {
            $cart = $product->getProduct($cartt['item_id']);


            $subTotal[] = array_map(function ($item) use ($in_wishList) {

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
                     <div>
                        <button id="decreement" class="cartBtn">-</button>
                        <input type="number" readonly value="1" id="quantity" class="inputcart">
                        <button id="increement" class="cartBtn">+</button>
                     </div>
                  </td>
                  <td>
                     <div class="d-flex">
                        <form method="post">
                           <input type="hidden" value="<?php echo $item["id"] ?>" name="item_id">
                           <button name="deleteItem_cart" class="cartBtn" type="submit"><i class="fas fa-trash"></i></button>
                        </form>
                        <form method="post">
                           <input type="hidden" value="<?php echo $item['id']  ?>" name="item_id2">
                           <?php
                           if (in_array($item['id'], $in_wishList)) {
                              echo '<button class="prowishbtn ml-2" disabled ><i class="fas fa-heart"></i></button>';
                           } else {
                              echo '<button type="submit"  class="prowishbtnd ml-2" name="wishlist-submit" ><i class="far fa-heart"></i></button>';
                           }
                           ?>
                        </form>
                     </div>
                  </td>




               </tr>
      <?php
               return $item["price"];
            }, $cart);
         }
      endforeach;
      ?>
   </table>
   <div class="d-flex justify-content-end">
   <div class="counttt">
      
   <p>
      <span>Cart Items:</span>
   <?php
   echo  count($Cart->getData('cart'))
   ?>
</p>
<br>
<p>
  <span> SubTotal:</span>
  $
   <?php
   echo isset($subTotal) ? $Cart->getSum($subTotal) : 0;
   ?>
</p>
</div>
   </div>
</section>

<script src="cart.js"></script>
<?php
include('footer.php');
?>