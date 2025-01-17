<?php
session_start();
include "db.php";

$requiredFields = ['fullname', 'email', 'address', 'contact', 'age', 'gender', 'type', 'price', 'availableTrip'];
foreach ($requiredFields as $field) {
    if (!isset($_POST[$field]) || empty(trim($_POST[$field]))) {
        die("Error: Missing required field: $field");
    }
}

$fullname = trim($_POST['fullname']);
$email = trim($_POST['email']);
$address = trim($_POST['address']);
$contact = trim($_POST['contact']);
$age = trim($_POST['age']);
$gender = trim($_POST['gender']);
$type = trim($_POST['type']);
$price = trim($_POST['price']);
$availableTrip = trim($_POST['availableTrip']);

if (!isset($_SESSION['id'])) {
    die("Error: User ID not set in session.");
}
$userId = $_SESSION['id'];
$dateCreated = date("Y-m-d H:i:s"); 

$stmt = $conn->prepare("INSERT INTO booking (userID, fullName, emailAddress, address, contact, age, gender, selectedTrip, type, price, date_created,  status, mode) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, 'Pending',  'Online')");
$stmt->bind_param("issssssssss", $userId, $fullname, $email, $address, $contact, $age, $gender, $availableTrip, $type, $price, $dateCreated);

if ($stmt->execute()) {
    header("Location: /views/user/utransaction.php");
    exit();
} else {
    echo "Error: " . $stmt->error;
}

$stmt->close();
$conn->close();
?>
