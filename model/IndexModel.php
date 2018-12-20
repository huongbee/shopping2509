<?php
include_once 'DBConnect.php';

class IndexModel extends DBConnect{

    function selectSlide(){
        $sql = "SELECT * FROM slide WHERE status=1";
        return $this->loadMoreRow($sql);
    }
    function selectSpecialProduct(){
        $sql = 'SELECT p.*, u.url AS url
                FROM products p
                INNER JOIN page_url u
                ON p.id_url = u.id
                WHERE status=1 
                AND deleted=0 
                LIMIT 0,15';
        return $this->loadMoreRow($sql);
    }

    function selectBestSeller(){
        $sql = "SELECT p.*, sum(d.quantity) AS tongsl, u.url AS url
                FROM products p
                INNER JOIN bill_detail d
                ON p.id = d.id_product
                INNER JOIN page_url u
                ON p.id_url = u.id
                AND deleted=0
                GROUP BY p.id
                ORDER BY tongsl DESC
                LIMIT 0,15";
        return $this->loadMoreRow($sql);
    }

    //B1
}


?>