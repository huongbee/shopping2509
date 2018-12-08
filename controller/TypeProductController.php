<?php
include_once 'BaseController.php';
include_once 'model/TypeProductModel.php';

class TypeProductController extends BaseController{
    function getTypeProductPage(){
        $url = $_GET['url'];
        $model = new TypeProductModel();
        $products = $model->selectProductByType($url);
        $title = ''; //write model get name type
        $data = [
            'products'=>$products
        ];
        return $this->loadView('type-product',$title,$data);
    }
}


?>