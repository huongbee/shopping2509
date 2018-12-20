<?php
include_once 'BaseController.php';
include_once 'model/ShoppingCartModel.php';

class ShoppingCartController extends BaseController{
    function getShoppingCartPage(){
        return $this->loadView('shopping-cart');
    }

    function addToCart(){
        $qty = isset($_POST['soluong']) ? (int)$_POST['soluong'] : 1;
        $id = $_POST['idsanpham'];
        $model = new ShoppingCartModel();
        $product = $model->findProductById($id);
        if($product){
            //add to session
            
        }
        else{
            echo json_encode([
                'status'=>0,
                'message'=>'Product not found!'
            ]);
        }
    }
}

?>