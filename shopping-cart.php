<?php

include_once 'controller/ShoppingCartController.php';
$c = new ShoppingCartController;

if($_SERVER['REQUEST_METHOD'] == "POST"){
    //ajax
    if(isset($_POST['action']) && $_POST['action']=='delete' ){
        return $c->deleteItemCart();
    }
    if(isset($_POST['action']) && $_POST['action']=='update' ){
        return $c->updateItemCart();
    }
    else return $c->addToCart();
}
return $c->getShoppingCartPage();


?>