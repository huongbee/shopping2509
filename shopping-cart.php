<?php

include_once 'controller/ShoppingCartController.php';
$c = new ShoppingCartController;

if($_SERVER['REQUEST_METHOD'] == "POST"){
    //ajax
    return $c->addToCart();
}
return $c->getShoppingCartPage();


?>