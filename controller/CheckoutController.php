<?php
include_once 'BaseController.php';

class CheckoutController extends BaseController{
    function getCheckoutPage(){
        return $this->loadView('checkout');
    }
}


?>