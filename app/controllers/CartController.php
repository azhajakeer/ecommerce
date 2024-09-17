<?php

class CartController extends Controller {
    



    public function add($productId) {
        if (!isset($_SESSION['user_id'])) {
            header("Location: " . BASE_URL . "auth/login");
           
            
            exit();
        }

        $cartModel = $this->loadModel('Cart');
        $cartModel->addToCart($_SESSION['user_id'], $productId, 1); 
         // Default quantity to 1
         

        header("Location: " . BASE_URL . "cart/index");
    }

    public function update($productId) {
        if (!isset($_SESSION['user_id'])) {
            header("Location: " . BASE_URL . "auth/login");
            exit();
        }

        $quantity = $_POST['quantity'];
        $cartModel = $this->loadModel('Cart');
        $cartModel->updateCart($_SESSION['user_id'], $productId, $quantity);

        header("Location: " . BASE_URL . "cart/index");
    }

    public function remove($productId) {
        if (!isset($_SESSION['user_id'])) {
            header("Location: " . BASE_URL . "auth/login");
            exit();
        }

        $cartModel = $this->loadModel('Cart');
        $cartModel->removeFromCart($_SESSION['user_id'], $productId);

        header("Location: " . BASE_URL . "cart/index");
    }

    public function index(){
            
            $this->renderView('cart/cart', [], 'Cart');
    
        

    }
}
?>
