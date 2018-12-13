<?php
include_once 'controller/TypeProductController.php';
$c = new TypeProductController;
if(isset($_POST['idType'])){
    return $c->getProductByType();
}
return $c->getTypeProductPage();


?>