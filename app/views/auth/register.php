<h2>Register</h2>
<form action="<?php echo BASE_URL; ?>auth/register" method="POST">
    <label for="name">Name:</label>
    <input type="text" name="name" required>
    
    <label for="email">Email:</label>
    <input type="email" name="email" required>
    
    <label for="password">Password:</label>
    <input type="password" name="password" required>
    
    <input type="submit" value="Register">
</form>
