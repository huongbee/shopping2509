<?php
include_once 'BaseController.php';

class TypeProductController extends BaseController{
    function getTypeProductPage(){
        $url = $_GET['url'];
        return $this->loadView('type-product');
    }
}


?>