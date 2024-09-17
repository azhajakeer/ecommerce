<?php

class OrderController extends Controller {

    // public function index() {
    //     if (!isset($_SESSION['user_id'])) {
    //         header("Location: " . BASE_URL . "auth/login");
    //         exit();
    //     }

    //     $cartModel = $this->loadModel('Cart');
    //     $cartItems = $cartModel->getCartItems($_SESSION['user_id']);

    //     if (empty($cartItems)) {
    //         header("Location: " . BASE_URL . "order");
    //         exit();
    //     }

    //     $total = array_sum(array_column($cartItems, 'price'));

    //     $orderModel = $this->loadModel('Order');
    //     $orderModel->createOrder($_SESSION['user_id'], $total, $cartItems);

    //     // Clear cart
    //     $cartModel->clearCart($_SESSION['user_id']);

    //     header("Location: " . BASE_URL . "order/success");
    // }

    public function index(){

        $this->renderView('order', [], 'Order List');

    }

    public function success() {
        $this->renderView('order/success');
    }

    public function history() {
        if (!isset($_SESSION['user_id'])) {
            header("Location: " . BASE_URL . "auth/login");
            exit();
        }

        $orderModel = $this->loadModel('Order');
        $orders = $orderModel->getOrdersByUser($_SESSION['user_id']);

        $this->renderView('order/history', ['orders' => $orders]);
    }
}
