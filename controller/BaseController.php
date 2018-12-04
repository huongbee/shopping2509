<?php
class BaseController {

    /**
     * Call view (page) with layout
     * @param string $view
     * @param array $data=[]
     * @return null 
     */
    function loadView(string $view='index', string $title='Shop 2509', array $data=[]){
        include_once 'view/layout.view.php';
    }

    
    function loadErrorPage(){
        return $this->loadView('404');
    }
}



?>