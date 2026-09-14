<?php
session_start();
require_once "userModel.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['action']) && $_POST['action'] == "login") {
        $user = getUserByEmail($_POST['email']);
        if ($user && password_verify($_POST['password'], $user['password_hash'])) {
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['name'] = $user['name'];
            $_SESSION['role'] = $user['role'];
            header("Location:admin.php");
            exit();
        } else {
            $error_message = "Invalid credentials. Please try again.";
            require "login.php";
            exit();
        }
    }
    if (isset($_POST['action']) && $_POST['action'] == "register") {
        $name = trim($_POST['name']);
        $email = trim($_POST['email']);
        $password = $_POST['password'];
        $role = $_POST['role'];
        if (strlen($password) < 8) {
            $error_message = "Password must be at least 8 characters.";
            require "register.php";
            exit();
        }

        $existingUser = getUserByEmail($email);
        if ($existingUser) {
            $error_message = "Email is already registered.";
            require "register.php";
            exit();
        }
        if (createUser($name, $email, $password, $role)) {
            $success_message = "Registration successful! Please login.";
            require "login.php";
            exit();
        } else {
            $error_message = "Registration failed due to a database error.";
            require "register.php";
            exit();
        }
    }
}
?>