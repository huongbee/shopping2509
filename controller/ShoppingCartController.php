<?php
include_once 'BaseController.php';

class ShoppingCartController extends BaseController{
    function getShoppingCartPage(){
        return $this->loadView('shopping-cart');
    }
}

?>