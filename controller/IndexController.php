<?php
require_once 'BaseController.php';
require_once 'model/IndexModel.php';

class IndexController extends BaseController{

    function getHomePage(){
        $model = new IndexModel();
        $slide = $model->selectSlide();
        $specialProduct = $model->selectSpecialProduct();
        $data = [
            'slide'=>$slide,
            'specialProduct'=>$specialProduct
        ];
        return $this->loadView('index',$data);
    }
}



?>