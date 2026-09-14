
<?php

$db_server = "localhost";
$db_user = "root";
$db_pass = "";
$db_name = "orgdb";

$conn = mysqli_connect($db_server, $db_user, $db_pass, $db_name);

if ($conn) {
echo "Connected successfully";
} else {
echo "Not connected: " . mysqli_connect_error();
}

?>

