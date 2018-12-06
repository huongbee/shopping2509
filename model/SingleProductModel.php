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
    function selectRelatedProduct($idType, $idProduct){
        $sql = "SELECT p.*, u.url AS url
                FROM products p
                INNER JOIN page_url u
                ON p.id_url = u.id
                WHERE id_type=$idType
                AND p.id <> $idProduct";
        return $this->loadMoreRow($sql);
    }
}



?>