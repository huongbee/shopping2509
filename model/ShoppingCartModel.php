<?php
include_once 'DBConnect.php';
class ShoppingCartModel extends DBConnect{

    function findProductById($id){
        $sql = "SELECT id, name, image, price, promotion_price, promotion
                FROM products 
                WHERE id=$id
                AND deleted=0";
        return $this->loadOneRow($sql);
    }
}


?>