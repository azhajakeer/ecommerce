<?php

class Product {
    private $db;

    public function __construct() {
        $this->db = new Database();
    }

    // Fetch all products
    public function getAllProducts() {
        $this->db->query("SELECT * FROM products");
        return $this->db->resultSet();
    }

    // Fetch a single product
    public function getProductById($id) {
        $this->db->query("SELECT * FROM products WHERE id = :id");
        $this->db->bind(':id', $id);
        return $this->db->single();
    }
}

