<?php
session_start();
require_once "eventModel.php";

if (!isset($_SESSION['role']) || $_SESSION['role'] !== 'admin') {
    header("Location: login.php");
    exit();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    if (isset($_POST['action']) && $_POST['action'] == "add_event") {

        if (addEvent(
            $_POST['title'],
            $_POST['description'],
            $_POST['venue'],
            $_POST['event_date'],
            $_POST['ticket_price'],
            $_POST['capacity'],
            1,
            $_SESSION['user_id']
        )) {

            header("Location:admin.php");
            exit();

        } else {

            echo "Failed to add event";
        }
    }

    if (isset($_POST['action']) && $_POST['action'] == "delete") {

        header("Content-Type: application/json");

        if (deleteEvent($_POST['id'])) {

            echo json_encode([
                "message" => "Event deleted successfully"
            ]);

        } else {

            echo json_encode([
                "error" => "Delete failed"
            ]);
        }

        exit();
    }
}
?>