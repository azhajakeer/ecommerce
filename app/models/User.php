<?php
// User Model
class User {
    private $db;

    public function __construct() {
        $this->db = new Database();
    }

    // Register a new user
    public function register($data) {
        $this->db->query('INSERT INTO users (name, email, password) VALUES (:name, :email, :password)');
        $this->db->bind(':name', $data['name']);
        $this->db->bind(':email', $data['email']);
        $this->db->bind(':password',$data['password']);

        return $this->db->execute();
    }

    // Find user by email, return true if user exists
    public function findUserByEmail($email) {
        $this->db->query('SELECT COUNT(*) as user_count FROM users WHERE email = :email');
        $this->db->bind(':email', $email);

        $result = $this->db->single();
        return $result['user_count'] > 0;  // Return true if user exists
    }

    // Log in the user
    // User Model
// User Model
public function login($email, $password) {
    // Debugging statement
   // echo "Attempting to log in with email: $email\n";

    // Query to find the user by email
    $this->db->query('SELECT * FROM users WHERE email = :email');
    $this->db->bind(':email', $email);
   // echo "Query executed to find user by email\n";

    // Fetch the user data
    $user = $this->db->single();

    // Check if the user exists
    if ($user) {
       // echo "User found, verifying password...\n";
        //print_r($user);


        // Compare passwords
        if ($password === $user['password']) {
           // echo "Password matches, returning user data\n";
            return $user;  // Return user data if login is successful
        } else {
            echo "Password does not match\n";
        }
    } else {
        echo "No user found with the given email\n";
    }

    return false;  // Return false for invalid credentials
}



}
