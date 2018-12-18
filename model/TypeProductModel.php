<?php
include_once 'DBConnect.php';

class TypeProductModel extends DBConnect{

    function selectCategories(){
        $sql = "SELECT c.*, u.url AS url, count(p.id) AS qty
                FROM page_url u
                INNER JOIN categories c
                ON u.id = c.id_url
                INNER JOIN products p
                ON c.id = p.id_type
                GROUP BY c.id";
        return $this->loadMoreRow($sql);
    }
    function selectProductByType($urlType,$position=-1,$quantity=-1){
        $sql = "SELECT p.*, u2.url as url
                FROM page_url u
                INNER JOIN categories c
                ON u.id = c.id_url
                INNER JOIN products p
                ON p.id_type = c.id
                INNER JOIN page_url u2
                ON u2.id=p.id_url
                WHERE u.url='$urlType'";
        if($position>-1 && $quantity>-1){
            $sql .= " LIMIT $position,$quantity";
        }     
        return $this->loadMoreRow($sql);
    }

    function selectNameType($url){
        $sql = "SELECT name
                FROM categories c
                INNER JOIN page_url u
                ON c.id_url = u.id
                WHERE url = '$url'";
        return $this->loadOneRow($sql);
    }
    function selectProductByIdType($idType){
        $sql = "SELECT p.*, u.url AS url
                FROM products p
                INNER JOIN page_url u
                ON p.id_url = u.id
                WHERE id_type = $idType";
        return $this->loadMoreRow($sql);
    }
}

// SELECT p.*, u2.url as url
// FROM products p
// INNER JOIN page_url u2
// ON u2.id=p.id_url
// WHERE id_type = (
// 	   SELECT c.id 
//     FROM categories c
//     INNER page_url u
//     ON c.id_url = u.id
//     WHERE  url='iphone-x'
// )


?>