<?php

class Order {
    private $db;

    public function __construct() {
        $this->db = new Database();
    }

    // Place an order and return the order ID
    public function placeOrder($userId, $cartItems, $totalAmount, $shippingAddress) {
        // Insert into the orders table
        $this->db->query("INSERT INTO orders (user_id, total_amount, shipping_address, created_at) 
                          VALUES (:user_id, :total_amount, :shipping_address, NOW())");
        $this->db->bind(':user_id', $userId);
        $this->db->bind(':total_amount', $totalAmount);
        $this->db->bind(':shipping_address', $shippingAddress);
        $this->db->execute();

        // Get the inserted order ID
        $orderId = $this->db->dbh->lastInsertId();

        // Insert each cart item into the order_items table
        foreach ($cartItems as $item) {
            $this->db->query("INSERT INTO order_items (order_id, product_id, quantity, price) 
                              VALUES (:order_id, :product_id, :quantity, :price)");
            $this->db->bind(':order_id', $orderId);
            $this->db->bind(':product_id', $item['product_id']);
            $this->db->bind(':quantity', $item['quantity']);
            $this->db->bind(':price', $item['price']);
            $this->db->execute();
        }

        // Clear the user's cart after order placement
        $this->db->query("DELETE FROM cart WHERE user_id = :user_id");
        $this->db->bind(':user_id', $userId);
        $this->db->execute();

        return $orderId;
    }

    // Get order details
    public function getOrderDetails($orderId) {
        $this->db->query("SELECT orders.*, order_items.*, products.name 
                          FROM orders 
                          JOIN order_items ON orders.id = order_items.order_id 
                          JOIN products ON order_items.product_id = products.id 
                          WHERE orders.id = :order_id");
        $this->db->bind(':order_id', $orderId);
        return $this->db->resultSet();
    }
}
