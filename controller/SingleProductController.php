<?php
include_once 'BaseController.php';

class SingleProductController extends BaseController{
    function getProductPage(){
        return $this->loadView('single-product');
    }
}


?>