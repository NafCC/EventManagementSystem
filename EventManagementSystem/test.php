<?php
if (isset($_POST['submit'])) {
    $event = $_POST['event'];
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $quantity = $_POST['quantity'];
    $message = $_POST['message'];

    echo "<h3>Reservation Submitted Successfully!</h3>";

    echo "Event: " . $event . "<br>";
    echo "Visitor Name: " . $name . "<br>";
    echo "Email: " . $email . "<br>";
    echo "Phone: " . $phone . "<br>";
    echo "Number of Tickets: " . $quantity . "<br>";
    echo "Message: " . $message;
}

?>
