<?php
session_start();

// Database connection parameters
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "shiptech";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Required form fields
$requiredFields = ['date', 'time', 'day', 'vesselName', 'capacity'];
foreach ($requiredFields as $field) {
    if (!isset($_POST[$field]) || empty(trim($_POST[$field]))) {
        die("Error: Missing required field: $field");
    }
}

// Get form data
$date = trim($_POST['date']);
$time = trim($_POST['time']);
$day = trim($_POST['day']);
$vesselName = trim($_POST['vesselName']);
$capacity = trim($_POST['capacity']);

// Prepare SQL statement
$stmt = $conn->prepare("INSERT INTO available_trip (date, time, day, vesselName, capacity) VALUES (?, ?, ?, ?, ?)");
$stmt->bind_param("sssss", $date, $time, $day, $vesselName, $capacity); // Use 'ss' since both are strings

// Execute the statement and check for errors
if ($stmt->execute()) {
    // Show JavaScript alert for success and then redirect
    echo "<script>
            alert('Trip added successfully!');
            window.location.href = '/views/admin/asetting.php';
          </script>";
    exit();
} else {
    echo "Error: " . $stmt->error;
}

// Close statement and connection
$stmt->close();
$conn->close();
?>
