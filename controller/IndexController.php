<?php
require_once 'BaseController.php';
require_once 'model/IndexModel.php';

class IndexController extends BaseController{

    function getHomePage(){
        $model = new IndexModel();
        $slide = $model->selectSlide();
        $specialProduct = $model->selectSpecialProduct();
        $bestSeller = $model->selectBestSeller();
        // print_r($bestSeller); die;
        //B2 
        $data = [
            'slide'=>$slide,
            'specialProduct'=>$specialProduct,
            'bestSeller'=>$bestSeller,
            //B3
        ];
        return $this->loadView('index','Trang chủ',$data);
    }
}



?>