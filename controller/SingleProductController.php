<?php
include_once 'BaseController.php';

class SingleProductController extends BaseController{
    function getProductPage(){
        $url = $_GET['url'];
        $id = $_GET['id'];
        print_r($id);die;
        return $this->loadView('single-product');
    }
}


?>