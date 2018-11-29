<?php
class BaseController {

    /**
     * Call view (page) with layout
     * @param string $view
     * @param array $data=[]
     * @return null 
     */
    function loadView(string $view='index', array $data=[]){
        include_once 'view/layout.view.php';
    }

    
    function loadErrorPage(){
        return $this->loadView('404');
    }
}



?>