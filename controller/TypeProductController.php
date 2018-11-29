<?php
include_once 'BaseController.php';

class TypeProductController extends BaseController{
    function getTypeProductPage(){
        return $this->loadView('type-product');
    }
}


?>