<html>

<head>

<title>Login</title>

<link rel="stylesheet" href="style.css">

</head>

<body>

<h2>Login</h2>

<form method="POST" action="login.php">

<label>Gmail:</label><br>

<input type="email" name="email">

<br><br>


<label>Password:</label><br>

<input type="password" name="password">

<br><br>


<input type="submit" name="login" value="Login">

</form>


<?php

$db_server = "localhost";
$db_user = "root";
$db_pass = "";
$db_name = "orgdb";

$conn = mysqli_connect($db_server, $db_user, $db_pass, $db_name);

if (!$conn) {
    die("Not connected: " . mysqli_connect_error());
}


if (isset($_POST['login'])) {

    $email = $_POST['email'];
    $password = $_POST['password'];


    $sql = "SELECT * FROM organizers 
            WHERE email = '$email' 
            AND password = '$password'";


    $result = mysqli_query($conn, $sql);


    if (mysqli_num_rows($result) > 0) {

        echo "<h3>Login Successful!</h3>";

    }

    else {

        echo "<h3>Invalid Gmail or Password!</h3>";

    }

}


mysqli_close($conn);

?>

</body>

</html>