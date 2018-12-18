<?php
include_once 'BaseController.php';
include_once 'model/TypeProductModel.php';
include_once 'Helper/Pager.php';

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
        
        $numPageShow = 3;
        $pager = new Pager($total,$page,$qty,$numPageShow);
        $pagination = $pager->showPagination();

        $type = $model->selectNameType($url);
        $title = $type->name;
        $data = [
            'products'=>$products,
            'type'=>$title,
            'pagination'=>$pagination
        ];
        return $this->loadView('type-product',$title,$data);
    }

    function getProductByType(){
        $idType = $_POST['idType'];
        $model = new TypeProductModel();
        $products = $model->selectProductByIdType($idType);
        return $this->loadViewNoneLayout('productbytype',$products);
        //print_r($products);
    }
}


?>