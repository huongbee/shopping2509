<?php
include_once 'BaseController.php';
include_once 'model/TypeProductModel.php';

class TypeProductController extends BaseController{
    function getTypeProductPage(){
        $url = $_GET['url'];
        if(!isset($_GET['page']) || $_GET['page']==0){
            $page = 1;
        }
        else{
            $page = (int)$_GET['page'];
        }
        $qty = 9;
        $position = ($page-1)*$qty;
        $model = new TypeProductModel();
        $products = $model->selectProductByType($url,$position,$qty);
        $total = count($model->selectProductByType($url));
        
        $numPageShow = 5;
        
        /**
         * sotranghienthi = 9;
         * page = 10
         * start = 6 = page - (sotranghienthi-1)/2
         * end   = 14 = page + (sotranghienthi-1)/2
         */

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