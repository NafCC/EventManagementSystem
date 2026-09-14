<?php
require_once "db.php";

function getAllEvents() {
    $conn = connectDB();
    $sql = "SELECT * FROM events";
    $result = mysqli_query($conn, $sql);
    $events = [];
    while($row = mysqli_fetch_assoc($result)){
        $events[] = $row;
    }
    return $events;
}

function addEvent($title, $description, $venue, $event_date, $ticket_price, $capacity, $category_id, $organizer_id) {
    $conn = connectDB();
    
    $title = mysqli_real_escape_string($conn, $title);
    $description = mysqli_real_escape_string($conn, $description);
    $venue = mysqli_real_escape_string($conn, $venue);
    $event_date = mysqli_real_escape_string($conn, $event_date);

    $ticket_price = (float)$ticket_price;
    $capacity = (int)$capacity;
    $category_id = (int)$category_id;
    $organizer_id = (int)$organizer_id;
    $status = 'upcoming';

    $sql = "INSERT INTO events (title, description, venue, event_date, ticket_price, capacity, category_id, organizer_id, status) 
            VALUES ('$title', '$description', '$venue', '$event_date', $ticket_price, $capacity, $category_id, $organizer_id, '$status')";
            
    return mysqli_query($conn, $sql);
}

function deleteEvent($id) {
    $conn = connectDB();
    $id = (int)$id;
    
    $sql = "DELETE FROM events WHERE id = $id";
    return mysqli_query($conn, $sql);
}
?>