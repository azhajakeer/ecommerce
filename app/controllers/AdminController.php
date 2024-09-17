<?php
class AdminController extends Controller {

    public function dashboard($action = null, $id = null) {
  
        // Start the session if it hasn't been started yet
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
           
        }

        // Check if the user is logged in and is an admin
        if (!isset($_SESSION['user_id']) || $_SESSION['role'] !== 'admin') {
            $this->renderView('admin/dashboard');
            header("Location: " . BASE_URL . "admin/login");
          
            exit();
        }

        // Load the Product model
        $productModel = $this->loadModel('Product');

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // Add new product
            if (!empty($_POST['name']) && !empty($_POST['description']) && !empty($_POST['price'])) {
                $name = $_POST['name'];
                $description = $_POST['description'];
                $price = $_POST['price'];
                $image = $_FILES['image']['name'];

                // Upload the image to the 'images' directory
                move_uploaded_file($_FILES['image']['tmp_name'], 'images/' . $image);

                // Add the product to the database
                $productModel->addProduct($name, $description, $price, $image);

                // Redirect back to the dashboard
               header("Location: " . BASE_URL . "admin/dashboard");
                $this->renderView('admin/dashboard');
                exit();
            }
        }

        if ($action === 'edit' && $id) {
            // Edit product
            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                $name = $_POST['name'];
                $description = $_POST['description'];
                $price = $_POST['price'];
                $image = $_FILES['image']['name'];

                // If a new image was uploaded, move it to the 'images' directory
                if ($image) {
                    move_uploaded_file($_FILES['image']['tmp_name'], 'images/' . $image);
                } else {
                    // If no new image was uploaded, use the existing image
                    $product = $productModel->getProductById($id);
                    $image = $product['image'];
                }

                // Update the product in the database
                $productModel->updateProduct($id, $name, $description, $price, $image);

                // Redirect back to the dashboard
                header("Location: " . BASE_URL . "admin/dashboard");
                exit();
            }

            // Load the product details for editing
            $product = $productModel->getProductById($id);
            $this->renderView('admin/edit_product', ['product' => $product]);
        } elseif ($action === 'delete' && $id) {
            // Delete product
            $productModel->deleteProduct($id);
            header("Location: " . BASE_URL . "admin/dashboard");
            exit();
        } else {
            // Display product list
            $products = $productModel->getAllProducts();
            $this->renderView('admin/dashboard', ['products' => $products]);
        }
    }
}
?>
