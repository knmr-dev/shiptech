<?php
include "db.php"; // Adjust to your DB connection script

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get the trip ID from the POST request
    $id = intval($_POST['id']);

    // Prepare and execute the delete query
    $sql = "DELETE FROM available_trip WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $id);

    if ($stmt->execute()) {
        // Redirect back to the settings page with a success message
        header("Location: /views/admin/asetting.php");
    } else {
        // Redirect back with an error message
        header("Location: /views/admin/asetting.php?message=Error deleting trip: " . $conn->error);
    }

    // Close the statement
    $stmt->close();
}

// Close the database connection
$conn->close();
?>
