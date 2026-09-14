<?php 
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Login - Event Management</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h2>Login</h2>

    <?php
    if (isset($success_message)) {
        echo "<p style='color: green;'>" . $success_message . "</p>";
    }
    if (isset($error_message)) {
        echo "<p style='color: red;'>" . $error_message . "</p>";
    }
    ?>
    <form action="authController.php" method="POST">
        <input type="hidden" name="action" value="login">
        
        <label>Email:</label><br>
        <input type="email" name="email" required><br><br>
        
        <label>Password:</label><br>
        <input type="password" name="password" required><br><br>
        
        <button type="submit">Login</button>
    </form>
    
    <br>
    <a href="register.php">Don't have an account? Register here.</a>
</body>
</html>