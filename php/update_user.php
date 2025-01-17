<?php
include "db.php"; // Database connection

// Start session if not already started
session_start();

// Check if user is logged in
if (!isset($_SESSION['id'])) {
    header('Location: ../login.php');
    exit();
}

$user_id = $_SESSION['id'];
$user_role = $_SESSION['role'];

// Fetch the data from the form
$name = $_POST['name'];
$gender = $_POST['gender'];
$contact = $_POST['contact'];
$type = $_POST['type'];
$password = $_POST['password'];
$confirm_password = $_POST['confirm_password'];

// Validate form data
if (empty($name) || empty($gender) || empty($contact) || empty($type)) {
    echo "All fields are required.";
    exit();
}

// Check if passwords match (optional, only update if provided)
if (!empty($password)) {
    if ($password !== $confirm_password) {
        echo "Passwords do not match!";
        exit();
    }
    // Hash the password for security
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);
}

// Update the user in the database
$query = "UPDATE users SET name=?, gender=?, contact=?, type=?";

if (!empty($password)) {
    $query .= ", password=?";
}

$query .= " WHERE id=?";

$stmt = $conn->prepare($query);

if (!empty($password)) {
    $stmt->bind_param('sssssi', $name, $gender, $contact, $type, $hashed_password, $user_id);
} else {
    $stmt->bind_param('ssssi', $name, $gender, $contact, $type, $user_id);
}

if ($stmt->execute()) {
    // Determine the redirection based on the user role
    $redirect_url = ($user_role === '1') ? '/views/admin/auserprofile.php' : '/views/user/uuserprofile.php';

    // Show JavaScript alert for success and then redirect
    echo "<script>
        alert('User profile updated successfully!');
        window.location.href = '$redirect_url';
    </script>";
    exit();
} else {
    echo "Error updating user: " . $conn->error;
}

$stmt->close();
$conn->close();
