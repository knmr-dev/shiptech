<?php
include "../../php/checklogin.php";
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vessel - ShipTech</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../../style/admin/adminvessel.css">
</head>

<body>
    <?php
        include '../navigation/adminheader.php';
    ?>

    <div class="mt-16 mx-20">
        <div class="header-section">
            <span class="text-2xl font-bold text-white">ShipTech User Dashboard</span>
        </div>

        <div class="grid grid-cols-4 gap-6">
            <div class="flex flex-col text-white">
                <span class="secondary-bg rounded-t-lg p-2 gap-4 flex items-center">
                    <i class="fas fa-calendar-day icon"></i>
                    DATE
                </span>
                <span class="primary-bg rounded-b-lg p-4">September 15, 2024</span>
            </div>
            <div class="flex flex-col text-white">
                <span class="secondary-bg rounded-t-lg p-2 gap-4 flex items-center">
                    <i class="fas fa-users icon"></i>
                    TOTAL PASSENGERS
                </span>
                <span class="primary-bg rounded-b-lg p-4">25 / 120</span>
            </div>
            <div class="flex flex-col text-white">
                <span class="secondary-bg rounded-t-lg p-2 gap-4 flex items-center">
                    <i class="fas fa-ship icon"></i>
                    VESSEL OF THE DAY
                </span>
                <span class="primary-bg rounded-b-lg p-4">VII - VERGEN DE PENEFRNCIA</span>
            </div>
            <div class="flex flex-col text-white">
                <span class="secondary-bg rounded-t-lg p-2 gap-4 flex items-center">
                    <i class="fas fa-clock icon"></i>
                    ARRIVAL TIME
                </span>
                <span class="primary-bg rounded-b-lg p-4">8:00 PM</span>
            </div>
        </div>

        <div class="form-section my-8">
            <h2 class="text-xl font-bold primary-text">Set User Dashboard</h2>
            <form class="mt-4">
                <div class="form-group">
                    <label for="departureDate">Date of Departure:</label>
                    <input type="date" class="form-control" id="departureDate" required>
                </div>
                <div class="form-group">
                    <label for="arrivalTime">Vessel Arrival Time:</label>
                    <input type="time" class="form-control" id="arrivalTime" required>
                </div>
                <div class="form-group">
                    <label for="vesselOfTheDay">Vessel of the Day:</label>
                    <input type="text" class="form-control" id="vesselOfTheDay" required>
                </div>
                <div class="form-group">
                    <label for="totalPassengers">Total Passengers Accommodate:</label>
                    <input type="number" class="form-control" id="totalPassengers" required>
                </div>
                <button type="submit" class="btn primary-bg text-white">Submit</button>
            </form>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>
