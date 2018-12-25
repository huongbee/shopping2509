<?php
include_once 'BaseController.php';
include_once 'model/ShoppingCartModel.php';
include_once 'Helper/Cart.php';
!isset($_SESSION) ? session_start() : null;

class ShoppingCartController extends BaseController{
    function getShoppingCartPage(){
        $oldCart = isset($_SESSION['cart']) ? $_SESSION['cart'] : null;
        $cart = new Cart($oldCart);
        // print_r($cart);die;
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
    function deleteItemCart(){
        $id = $_POST['idSP'];
        $oldCart = isset($_SESSION['cart']) ? $_SESSION['cart'] : null;
        $cart = new Cart($oldCart);
        if(array_key_exists($id,$cart->items)){
            $cart->removeItem($id);
            $_SESSION['cart'] = $cart;
            echo json_encode([
                'status'=>1,
                'message'=> "Updated!",
                'data'=>[
                    'totalPrice'=>number_format($cart->totalPrice),
                    'promtPrice'=>number_format($cart->promtPrice)
                ]
            ]);
        }
        else{
            echo json_encode([
                'status'=>0,
                'message'=> "Can not find product in your cart."
            ]);
        }
        
    }

    function updateItemCart(){
        $qty = isset($_POST['soluong']) ? (int)$_POST['soluong'] : 1;
        $id = $_POST['idSP'];

        $model = new ShoppingCartModel();
        $product = $model->findProductById($id);
        if($product){
            //update 
            $oldCart = isset($_SESSION['cart']) ? $_SESSION['cart'] : null;
            $cart = new Cart($oldCart);
            $cart->update($product, $qty);
            $_SESSION['cart'] = $cart;
            // print_r($_SESSION['cart']);
            echo json_encode([
                'status'=>1,
                'message'=> 'Updated!',
                'data'=>[
                    'price'=>number_format($cart->items[$id]['price']),
                    'discountPrice'=>number_format($cart->items[$id]['discountPrice']),
                    'totalPrice'=>number_format($cart->totalPrice),
                    'promtPrice'=>number_format($cart->promtPrice)
                ]
            ]);
        }
        else{
            echo json_encode([
                'status'=>0,
                'message'=>'Product not found!'
            ]);
        }
    }

    //save 1 new customer => return id customer 
    //save new bill => return id bill
    //save bill_detail
    
}

?>