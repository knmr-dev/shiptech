<?php
include 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $bookingID = htmlspecialchars($_POST['bookingID']);
    $fullName = htmlspecialchars($_POST['fullname']);
    $email = htmlspecialchars($_POST['email']);
    $address = htmlspecialchars($_POST['address']);
    $age = htmlspecialchars($_POST['age']);
    $contact = htmlspecialchars($_POST['contact']);
    $type = htmlspecialchars($_POST['type']);
    $selectedTrip = htmlspecialchars($_POST['selectedTrip']);
    $gender = htmlspecialchars($_POST['gender']);
    $price = htmlspecialchars($_POST['price']);

    $stmt = $conn->prepare("UPDATE booking SET fullName = ?, emailAddress = ?, address = ?, age = ?, contact = ?, type = ?, selectedTrip = ?, gender = ?, price = ? WHERE bookingID = ?");
    
    $stmt->bind_param("sssssssssi", $fullName, $email, $address, $age, $contact, $type, $selectedTrip, $gender, $price, $bookingID);
    if ($stmt->execute()) {
        header("Location: /views/user/utransaction.php");
        exit();
    }
    $stmt->close();
    $conn->close();
} 
?>
