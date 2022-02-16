<?php
require('connection.php');
require('product/product.php');
require('cart.php');
require('user/user.php');
require('comment/comment.php');
require('post/post.php');

$db=new DBController();
$product=new Product($db);
$Cart=new Cart($db);
$User=new User($db);
$Post=new Post($db);
$Comment=new Comment($db);

?>