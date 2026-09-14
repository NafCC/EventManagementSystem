<?php
require_once "db.php";

function getUserByEmail($email) {
    $conn = connectDB();
    $email = mysqli_real_escape_string($conn, $email);
    
    $sql = "SELECT * FROM users WHERE email = '$email'";
    $result = mysqli_query($conn, $sql);
    
    return mysqli_fetch_assoc($result);
}

function createUser($name, $email, $password, $role) {
    $conn = connectDB();
    $name = mysqli_real_escape_string($conn, $name);
    $email = mysqli_real_escape_string($conn, $email);
    $role = mysqli_real_escape_string($conn, $role);
    $hash = password_hash($password, PASSWORD_DEFAULT);
    
    $sql = "INSERT INTO users (name, email, password_hash, role) 
            VALUES ('$name', '$email', '$hash', '$role')";
            
    return mysqli_query($conn, $sql);
}
?>