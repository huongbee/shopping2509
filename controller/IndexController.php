<?php
require_once 'BaseController.php';
require_once 'model/IndexModel.php';

class IndexController extends BaseController{

    function getHomePage(){
        $model = new IndexModel();
        $slide = $model->selectSlide();

        $data = [
            'slide'=>$slide
        ];
        return $this->loadView('index',$data);
    }
}



?>