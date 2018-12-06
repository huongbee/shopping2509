<?php
include_once 'BaseController.php';
include_once 'model/SingleProductModel.php';

class SingleProductController extends BaseController{
    function getProductPage(){
        $url = $_GET['url'];
        $id = $_GET['id'];
        $model = new SingleProductModel;
        $product = $model->selectProductByIdUrl02($id,$url);
        if(!$product){
            header('Location:404.php');
            return;
        }
        $title = $product->name;
        $idType = $product->id_type;
        $relatedProduct = $model->selectRelatedProduct($idType,$product->id);
        // print_r($relatedProduct);die;
        $data = [
            'product'=>$product,
            'relatedProduct'=>$relatedProduct
        ];
        return $this->loadView('single-product',$title,$data);
    }
}


?>