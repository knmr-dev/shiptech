<?php
session_start();
include "db.php";

// Check if bookingID is set in the POST request
if (isset($_POST['bookingID'])) {
    $bookingID = $_POST['bookingID'];

    // Prepare and execute the delete statement
    $stmt = $conn->prepare("DELETE FROM booking WHERE bookingID = ?");
    
    if ($stmt) {
        $stmt->bind_param("i", $bookingID);
        
        if ($stmt->execute()) {
            // Redirect back to the transaction page with a success message
            header("Location: /views/user/utransaction.php?msg=Booking cancelled successfully.");
            exit();
        } else {
            // If there's an error during execution
            echo "Error executing query: " . $stmt->error;
        }

        // Close the statement
        $stmt->close();
    } else {
        // If preparation fails
        echo "Error preparing statement: " . $conn->error;
    }
} else {
    echo "Error: No booking ID provided.";
}

// Close the database connection
$conn->close();
?>
