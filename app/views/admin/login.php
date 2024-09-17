<!-- <?php

// // Check if the form has been submitted
// if ($_SERVER['REQUEST_METHOD'] == 'POST') {
//     $username = $_POST['username'];
//     $password = $_POST['password'];

//     // Simple hardcoded authentication for testing purposes
//     if ($username === 'admin' && $password === 'password') {
//         // Set session variables
//         $_SESSION['user_id'] = 1;
//         $_SESSION['role'] = 'admin';

//         // Redirect to the dashboard
//         header("Location: http://localhost/app/views/admin/dashboard.php");
//         exit();
//     } else {
//         // Invalid login, display an error message
//         $error = "Invalid username or password.";
//     }
// }
// ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<body>
    <h1>Login</h1>

    <?php if (isset($error)): ?>
        <p style="color:red;"><?php echo $error; ?></p>
    <?php endif; ?>

    <form method="post" action="">
        <label for="username">Username:</label>
        <input type="text" id="username" name="username" required>

        <br>

        <label for="password">Password:</label>
        <input type="password" id="password" name="password" required>

        <br>

        <button type="submit">Login</button>
    </form>
</body>
</html> -->