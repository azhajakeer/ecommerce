<?php

class ProductController extends Controller {
    private $productModel;

    public function __construct() {
        $this->productModel = $this->loadModel('Product');
    }

    // List all products
    public function index() {
        $products = $this->productModel->getAllProducts();
        $this->renderView('product/product', ['products' => $products], 'Product List');
    }
}
