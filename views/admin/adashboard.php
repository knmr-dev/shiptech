<?php
include "../../php/checklogin.php";
include "../../php/db.php";


$sql = "SELECT * FROM booking";
$stmt = $conn->prepare($sql);
$stmt->execute();
$result = $stmt->get_result();

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - ShipTech</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../../style/admin/admindash.css">
</head>

<body>
    <?php
        include '../navigation/adminheader.php';
    ?>
    
    <div class="mt-16 mx-20">
        <span class="text-2xl font-bold primary-text">ShipTech Admin Dashboard</span>
        <div class="grid grid-cols-4 gap-6 mb-8">
            <div class="flex flex-col text-white">
                <span class="secondary-bg rounded-t-lg p-2 gap-4 flex items-center">
                    <i class="fas fa-users icon"></i>
                    TOTAL USER
                </span>
                <span class="primary-bg rounded-b-lg p-4">
                    23
                </span>
            </div>
            <div class="flex flex-col text-white">
                <span class="secondary-bg rounded-t-lg p-2 gap-4 flex items-center">
                    <i class="fas fa-calendar-alt icon"></i>
                    TOTAL BOOKING
                </span>
                <span class="primary-bg rounded-b-lg p-4">
                    25
                </span>
            </div>
            <div class="flex flex-col text-white">
                <span class="secondary-bg rounded-t-lg p-2 gap-4 flex items-center">
                    <i class="fas fa-ship icon"></i>
                    TOTAL VESSEL
                </span>
                <span class="primary-bg rounded-b-lg p-4">
                    5
                </span>
            </div>
        </div>
        <span class="text-2xl font-bold primary-text">ShipTech User Dashboard</span>
        <div class="grid grid-cols-4 gap-6">
            <div class="flex flex-col text-white">
                <span class="secondary-bg rounded-t-lg p-2 gap-4 flex items-center">
                    <i class="fas fa-calendar-day icon"></i>
                    DATE
                </span>
                <span class="primary-bg rounded-b-lg p-4">
                    September 15, 2024
                </span>
            </div>
            <div class="flex flex-col text-white">
                <span class="secondary-bg rounded-t-lg p-2 gap-4 flex items-center">
                    <i class="fas fa-users icon"></i>
                    TOTAL PASSENGERS
                </span>
                <span class="primary-bg rounded-b-lg p-4">
                    25 / 120
                </span>
            </div>
            <div class="flex flex-col text-white">
                <span class="secondary-bg rounded-t-lg p-2 gap-4 flex items-center">
                    <i class="fas fa-ship icon"></i>
                    VESSEL OF THE DAY
                </span>
                <span class="primary-bg rounded-b-lg p-4">
                    VII - VERGEN DE PENEFRNCIA
                </span>
            </div>
            <div class="flex flex-col text-white">
                <span class="secondary-bg rounded-t-lg p-2 gap-4 flex items-center">
                    <i class="fas fa-clock icon"></i>
                    ARRIVAL TIME
                </span>
                <span class="primary-bg rounded-b-lg p-4">
                    8:00 PM
                </span>
            </div>
        </div>

        <div class="container my-12">
            <div class="row header-section">
                <div class="col-md-6 text-xl">
                    <h1 class="font-weight-bold">Passenger Booking Status</h1>
                </div>
                <div class="col-md-6 text-right text-xl">
                    <h1 class="font-weight-bold">Banton San Agustine 10/26/18</h1>
                </div>
            </div>

            <div class="table-container p-3">
                <table class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>Booking ID</th>
                            <th>Name</th>
                            <th>Gender</th>
                            <th>Age</th>
                            <th>Type</th>
                            <th>Amount</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php
                    if ($result->num_rows > 0) {
                        $index = 1; 
                        while ($row = $result->fetch_assoc()) {
                            echo "<tr>";
                            echo "<td>" . $index . "</td>"; 
                            echo "<td>" . htmlspecialchars($row['bookingID']) . "</td>";
                            echo "<td>" . htmlspecialchars($row['fullName']) . "</td>";
                            echo "<td>" . htmlspecialchars($row['gender']) . "</td>";
                            echo "<td>" . htmlspecialchars($row['age']) . "</td>";
                            echo "<td>" . htmlspecialchars($row['type']) . "</td>";
                            echo "<td>" . htmlspecialchars($row['price']) . "</td>";
                            echo "</tr>";
                        }
                    } else {
                        echo "<tr><td colspan='9' class='text-center'>No bookings found.</td></tr>";
                    }
                    ?>
                </tbody>
                </table>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>