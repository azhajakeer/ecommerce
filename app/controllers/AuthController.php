<?php

class AuthController extends Controller {
    
    public function index() {
            //echo "Rendering login page";
            $this->renderView("auth/login");
           // $this->renderView('home', [], 'Book List');

        exit;
    }

    public function registration(){
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $data = [
                'name' => $_POST['name'],
                'email' => $_POST['email'],
                'password' => $_POST['password']
            ];

            $userModel = $this->loadModel('User');
            if ($userModel->findUserByEmail($data['email'])) {
                echo "Email already taken.";
            } else {
                if ($userModel->register($data)) {
                    $this->renderView('product/product');
                    header("Location: " . BASE_URL . "product");
                } else {
                    echo "Registration failed.";
                }
            }
        }

    }

            


    // AuthController
    public function login() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            //echo "some wrong";
            $email = $_POST['email'];
            $password = $_POST['password'];
           // echo "some 2 wrong";
            $userModel = $this->loadModel('User');
            //echo "Some wrong three";
    
            // Debugging: Check email and password
            
    
            // Check if the user exists and credentials are correct
            $loggedInUser = $userModel->login($email, $password);
            //echo "user login function in user model is working";
            if ($loggedInUser) {
               // echo "User found: " . $loggedInUser['email'];
                $_SESSION['user_id'] = $loggedInUser['id'];
                $_SESSION['user_email'] = $loggedInUser['email'];
                $role = $loggedInUser['role'];
                $_SESSION['user_role'] = $role;
                
                
    
                if ($role === 'admin') {
                  //header("Location: /ecommerce/public/admin/dashboard");


                  echo "hello admin";
                } elseif ($role === 'user') {
                    $this->renderView('product/product');
                    header("Location: " . BASE_URL . "product");
                   // echo "Its WORKING";
                    
                }
            } else {
                echo "Invalid credentials.";
            }
        } else {
            echo "hello not working";
        }
    }
    

    
    

    

    public function logout() {
        unset($_SESSION['user_id']);
        unset($_SESSION['user_email']);
        session_destroy();
        header("Location: " . BASE_URL . "auth/login");
    }
}
?>

