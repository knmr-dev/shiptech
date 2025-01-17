<?php
session_start();
include "db.php"; // Ensure the path to your db connection is correct

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST["name"];
    $gender = $_POST["gender"];
    $contact = $_POST["contact"];
    $type = $_POST["type"];
    $username = $_POST["username"];
    $password = $_POST["password"];
    $role = 2; // Default role for regular users

    // Check if username or name already exists
    $check_sql = $conn->prepare("SELECT * FROM users WHERE username = ? OR name = ?");
    $check_sql->bind_param("ss", $username, $name);
    $check_sql->execute();
    $check_result = $check_sql->get_result();

    if ($check_result->num_rows > 0) {
        echo "Username already exists. Please try another one.";
    } else {
        
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);

        $stmt = $conn->prepare("INSERT INTO users (username, name, gender, contact, type, password, role) VALUES (?, ?, ?, ?, ?, ?, ?)");
        $stmt->bind_param("ssssssi", $username, $name, $gender, $contact, $type, $hashed_password, $role);

        if ($stmt->execute()) {
            header("refresh:1; url=../views/login.php");
            exit();
        } else {
            echo "Error: " . $stmt->error;
        }
    }
}
?>
