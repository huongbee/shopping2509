<?php
include_once 'DBConnect.php';

class IndexModel extends DBConnect{

    function selectSlide(){
        $sql = "SELECT * FROM slide WHERE status=1";
        return $this->loadMoreRow($sql);
    }
    function selectSpecialProduct(){
        $sql = 'SELECT * FROM products WHERE status=1 LIMIT 0,15';
        return $this->loadMoreRow($sql);
    }

}


?>