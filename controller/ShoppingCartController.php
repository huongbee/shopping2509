<?php
include_once 'BaseController.php';
include_once 'model/ShoppingCartModel.php';
include_once 'Helper/Cart.php';
!isset($_SESSION) ? session_start() : null;

class ShoppingCartController extends BaseController{
    function getShoppingCartPage(){
        $oldCart = isset($_SESSION['cart']) ? $_SESSION['cart'] : null;
        $cart = new Cart($oldCart);
        $data = [
            'cart'=>$cart
        ];
        return $this->loadView('shopping-cart','Giỏ hàng',$data);
    }

    function addToCart(){
        $qty = isset($_POST['soluong']) ? (int)$_POST['soluong'] : 1;
        $id = $_POST['idsanpham'];
        $model = new ShoppingCartModel();
        $product = $model->findProductById($id);
        if($product){
            //add to session
            $oldCart = isset($_SESSION['cart']) ? $_SESSION['cart'] : null;
            $cart = new Cart($oldCart);
            $cart->add($product, $qty);
            $_SESSION['cart'] = $cart;
            // print_r($_SESSION['cart']);
            echo json_encode([
                'status'=>1,
                'message'=> "Sản phẩm ".$product->name." đã được thêm vào giỏ hàng",
                'image'=>$product->image
            ]);
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