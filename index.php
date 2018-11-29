<?php

require_once 'controller/IndexController.php';
$c = new IndexController;
return $c->getHomePage();


?>