<html>
<head>
    <title>Event Ticket Reservation</title>
</head>

<body>

<h2>Admin Regeistration Form</h2>

<form method="POST">

    <label>Name:</label><br>
    <input type="text" name="name">
    <br><br>

    <label>Password: </label><br>
    <input type="password" name="password">
    <br><br>

    <label>Confirm Password: </label><br>
    <input type="password" name="confirm_password">

    <br><br>

    <label>Age: </label><br>
    <input type="number" name="age">
    <br><br>

    <label>Gender:</label><br>
    <input type="radio" name="gender" value="Male" required> Male
    <input type="radio" name="gender" value="Female"> Female
    <input type="radio" name="gender" value="Other"> Other
    <br><br>


    <label>Email:</label><br>
    <input type="email" name="email">

    <br><br>

    <label>Phone:</label><br>
    <input type="text" name="phone">

    <br><br>

    <input type="submit" name="submit">

</form>


<?php

if (isset($_POST['submit'])) {

    $name = $_POST['name'];
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];
    $age = $_POST['age'];
    $gender = ($_POST['gender']);
    $email = $_POST['email'];
    $phone = $_POST['phone'];

    $error = "";

    if ($name == "") {
        $error = "Please enter your name.";
    }

    elseif($password == ""){
        $error = "Please enter password!";
    }

    elseif (strlen($password) < 8) {
        $error = "Password must be at least 8 characters.";
    }

    elseif ($password !== $confirm_password) {
        $error = "Passwords do not match.";
    }

    elseif ($age == "" || $age < 18) {
        $error = "Age must be 18 or older.";
    }

    elseif ($gender == "") {
        $error = "Please select a gender.";
    }
    
    elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $error = "Please enter a valid email address.";
    }

    elseif (!preg_match("/^[0-9]{11}$/", $phone)) {
        $error = "Phone number must contain 11 digits.";
    }



    if ($error != "") {

        echo "Error! $error";

    } else {

        echo "<h3>Regeistration Successfull!</h3>";

        echo "Admin Name: $name" . "<br>";
        echo "Age: $age" . "<br>";
        echo "Gender: $gender" . "<br>";
        echo "Email: $email" ."<br>";
        echo "Phone: $phone" . "<br>";

    }

}

?>