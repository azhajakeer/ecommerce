<?php

class Cart {
    private $db;

    public function __construct() {
        $this->db = new Database();
    }

    // Add product to cart
    public function addToCart($userId, $productId, $quantity) {
        // Check if the product already exists in the user's cart
        $this->db->query('SELECT * FROM cart WHERE user_id = :user_id AND product_id = :product_id');
        $this->db->bind(':user_id', $userId);
        $this->db->bind(':product_id', $productId);
        $existingCartItem = $this->db->single();

        if ($existingCartItem) {
            // Update the quantity if the item is already in the cart
            $this->db->query('UPDATE cart SET quantity = quantity + :quantity WHERE user_id = :user_id AND product_id = :product_id');
            $this->db->bind(':quantity', $quantity);
        } else {
            // Add new item to the cart
            $this->db->query('INSERT INTO cart (user_id, product_id, quantity) VALUES (:user_id, :product_id, :quantity)');
            $this->db->bind(':quantity', $quantity);
        }

        $this->db->bind(':user_id', $userId);
        $this->db->bind(':product_id', $productId);

        return $this->db->execute();
    }

    // Get the cart items for a user
    public function getCartItems($userId) {
        $this->db->query('SELECT cart.*, products.name, products.price FROM cart JOIN products ON cart.product_id = products.id WHERE cart.user_id = :user_id');
        $this->db->bind(':user_id', $userId);

        return $this->db->resultSet();
    }

    // Remove item from cart
    public function removeFromCart($userId, $productId) {
        $this->db->query('DELETE FROM cart WHERE user_id = :user_id AND product_id = :product_id');
        $this->db->bind(':user_id', $userId);
        $this->db->bind(':product_id', $productId);

        return $this->db->execute();
    }

    // Update the quantity of an item in the cart
    public function updateCart($userId, $productId, $quantity) {
        $this->db->query('UPDATE cart SET quantity = :quantity WHERE user_id = :user_id AND product_id = :product_id');
        $this->db->bind(':quantity', $quantity);
        $this->db->bind(':user_id', $userId);
        $this->db->bind(':product_id', $productId);

        return $this->db->execute();
    }
}
?>
