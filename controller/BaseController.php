<?php
include_once 'model/TypeProductModel.php';
include_once 'Helper/Cart.php';
session_start();

class BaseController {

    /**
     * Call view (page) with layout
     * @param string $view
     * @param array $data=[]
     * @return null 
     */
    function loadView(string $view='index', string $title='Shop 2509', array $data=[]){
        $model = new TypeProductModel;
        $categories = $model->selectCategories();

        $oldCart = isset($_SESSION['cart']) ? $_SESSION['cart'] : null;
        $cartInit = new Cart($oldCart); 
        include_once 'view/layout.view.php';
    }

    function loadViewNoneLayout($view = '',$data = []){
        include_once "view/ajax/$view.view.php";
    }
    
    function loadErrorPage(){
        return $this->loadView('404');
    }
}


?>