<?php

class DBConnect{

    /**
     * @var PDO $connect
     */
    private $connect = NULL;

    /**
     * @var PDOStatement $statement
     */
    private $statement = NULL;

    /**
     * Connect to database
     */
    function __construct($dbName='shop_2509',$user = 'root',$pass = ''){
        $this->connect = new PDO("mysql:host=localhost;dbname=$dbName",$user,$pass);
        $this->connect->exec('set names utf8');
    }

    /**
     * Use for Insert/Update/Delete
     * @param string $sql
     * @param array $data = []
     * @return bool
     */

    function executeQuery(string $sql, array $data=[]){
        $this->statement = $this->connect->prepare($sql);
        for($i=1; $i<=count($data); $i++){
            $this->statement->bindParam($i,$data[$i-1]);
        }
        return $this->statement->execute();
    }
    /**
     * Get recent insert Id
     * @return int
     */
    function getInsertedId(){
        return $this->connect->lastInsertId();
    }
    
    /**
     * Use for SELECT query, return only 1 row in table
     * @param string $sql
     * @param array $data
     * @return object|false
     */
    function loadOneRow(string $sql, array $data=[]){
        $check = $this->executeQuery($sql, $data);
        return $check ? $this->statement->fetch(PDO::FETCH_OBJ) : false;
    }

    /**
     * Use for SELECT query, return more than 1 row in table
     * @param string $sql
     * @param array $data
     * @return array|false
     */
    function loadMoreRow(string $sql, array $data=[]){
        $check = $this->executeQuery($sql, $data);
        return $check ? $this->statement->fetchAll(PDO::FETCH_OBJ) : false;
    }

}



?>