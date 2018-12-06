<?php
require_once 'DBConnect.php';

class SingleProductModel extends DBConnect{

    function selectProductByIdUrl($id, $url){
        $data = [$id,$url];
        $sql = "SELECT p.* 
                FROM products p
                INNER JOIN page_url u
                ON p.id_url = u.id
                WHERE p.id=?
                AND u.url=?";
        return $this->loadOneRow($sql,$data);
    }
    
    function selectProductByIdUrl02($id, $url){
        $sql = "SELECT p.* 
                FROM products p
                INNER JOIN page_url u
                ON p.id_url = u.id
                WHERE p.id=$id
                AND u.url='$url'";
        return $this->loadOneRow($sql);
    }
}



?>