<?php
session_start();
include "db.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $password = $_POST["password"];

    // Query to get user information by username
    $sql = "SELECT * FROM users WHERE username='$username'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $user_data = $result->fetch_assoc();

        // Verify hashed password
        if (password_verify($password, $user_data['password'])) {
            $_SESSION['id'] = $user_data['id'];
            $_SESSION['role'] = $user_data['role'];

            // Redirect based on role
            if ($user_data['role'] == 1) {
                header("Location: /views/admin/adashboard.php");
            } elseif ($user_data['role'] == 2) {
                header("Location: /views/user/uhome.php");
            }
            exit();
        } else {
            header("Location: ../views/login.php?error=invalid");
            exit();
        }
    } else {
        header("Location: ../views/login.php?error=invalid");
        exit();
    }
}
?>
