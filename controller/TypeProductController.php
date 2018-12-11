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

        // print_r($_SERVER);die;

        /**
         * total = 10;
         * sotranghienthi = 9;
         * page = 9
         * start =  page - (sotranghienthi-1)/2 => 5 => 2
         * end   =  page + (sotranghienthi-1)/2 => 13 => 10
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