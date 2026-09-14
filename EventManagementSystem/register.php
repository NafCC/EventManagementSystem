<?php 
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Register - Event Management</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h2>Register (Admin)</h2>
    <?php
    if (isset($error_message)) {
        echo "<p style='color: red;'>" . $error_message . "</p>";
    }
    ?>
    <form action="authController.php" method="POST">
        <input type="hidden" name="action" value="register">
        
        <label>Name:</label><br>
        <input type="text" name="name" required><br><br>
        
        <label>Email:</label><br>
        <input type="email" name="email" required><br><br>

        <label>Password (Min 8 characters):</label><br>
        <input type="password" name="password" minlength="8" required><br><br>
        
        <label>Role:</label><br>
        <select name="role" required>
            <option value="admin">Admin</option>
            <option value="organizer">Organizer</option>
        </select><br><br>
        
        <button type="submit">Register</button>
    </form>
    
    <br>
    <a href="login.php">Already have an account? Login here.</a>
</body>
</html>