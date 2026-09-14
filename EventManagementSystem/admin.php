<?php
session_start();
if($_SESSION['role'] !== 'admin') { 
    header("Location: login.php");
    exit(); }
require_once "eventModel.php";
$events = getAllEvents();
?>
<!DOCTYPE html>
<html>
<head>
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h2>Admin Dashboard</h2>
    <p>Welcome, <?php echo $_SESSION['name']; ?></p>
    
    <h3>Create Event</h3>
    <form action="adminController.php" method="POST">
        <input type="hidden" name="action" value="add_event">
        <input type="text" name="title" placeholder="Event Title" required>
        <input type="text" name="description" placeholder="Description">
        <input type="text" name="venue" placeholder="Venue" required>
        <input type="date" name="event_date" required>
        <input type="number" name="ticket_price" placeholder="Price" required>
        <input type="number" name="capacity" placeholder="Capacity" required>
        <button type="submit">Add Event</button>
    </form>

    <h3>Manage Events</h3>
    <table border="1">
        <thead>
            <tr>
                <th>ID</th><th>Title</th><th>Venue</th><th>Date</th><th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($events as $event): ?>
            <tr id="event-<?php echo $event['id']; ?>">
                <td><?php echo $event['id']; ?></td>
                <td><?php echo $event['title']; ?></td>
                <td><?php echo $event['venue']; ?></td>
                <td><?php echo $event['event_date']; ?></td>
                <td>
                    <button onclick="deleteEvent(<?php echo $event['id']; ?>)"> Delete</button>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    
    <script src="ajax.js"></script>
</body>
</html>