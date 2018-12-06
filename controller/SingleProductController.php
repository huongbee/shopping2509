<?php
include_once 'BaseController.php';
include_once 'model/SingleProductModel.php';

class SingleProductController extends BaseController{
    function getProductPage(){
        $url = $_GET['url'];
        $id = $_GET['id'];
        // print_r($id);die;
        $model = new SingleProductModel;
        $product = $model->selectProductByIdUrl02($id,$url);
        print_r($product);
        die;
        return $this->loadView('single-product');
    }
}


?>