<?php
include_once 'BaseController.php';
include_once 'model/TypeProductModel.php';

class TypeProductController extends BaseController{
    function getTypeProductPage(){
        $url = $_GET['url'];
        $model = new TypeProductModel();
        $products = $model->selectProductByType($url);
        $type = $model->selectNameType($url);
        $title = $type->name;
        $data = [
            'products'=>$products,
            'type'=>$title
        ];
        return $this->loadView('type-product',$title,$data);
    }
}


?>