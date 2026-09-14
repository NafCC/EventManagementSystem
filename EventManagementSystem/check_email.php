<?php

$conn = mysqli_connect(
    "localhost",
    "root",
    "",
    "orgdb"
);

$email = $_GET['email'];

$email = mysqli_real_escape_string($conn, $email);

$sql = "SELECT * FROM organizers
        WHERE email = '$email'";

$result = mysqli_query($conn, $sql);


if (mysqli_num_rows($result) > 0) {

$data = array("exists" => true);

} else {

$data = array("exists" => false);

}


echo json_encode($data);

mysqli_close($conn);

?>