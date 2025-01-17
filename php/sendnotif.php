<?php
include "db.php";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Get the form data
    $bookingID = $_POST['displayBookingID'];
    $datetime = $_POST['datetime'];
    $title = $_POST['title'];
    $message = $_POST['message'];

    $sql = "INSERT INTO notification (user_id, date_time, title, message) 
            VALUES ('$bookingID', '$datetime', '$title', '$message')";

    if (mysqli_query($conn, $sql)) {
        echo "<script>
            alert('Notification sent successfully!');
            window.location.href = '/views/admin/anotif.php';
          </script>";
    } 

    // Close the database connection
    mysqli_close($conn);
}
?>
