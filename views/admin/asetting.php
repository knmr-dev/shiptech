<?php
include "../../php/checklogin.php";
include "../../php/db.php";

$sql = "SELECT id, date, time, day, vesselName, capacity FROM available_trip";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Setting - ShipTech</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../../style/admin/adminsetting.css">
</head>

<body>
    <?php
    include '../navigation/adminheader.php';
    ?>

    <div class="mt-16 mx-20 flex gap-6">
        <div class="flex flex-col">
            <span class="text-2xl primary-text font-bold">Settings</span>
            <span class="text-lg text-black">Add Available Trips</span>

            <table class="table table-bordered table-striped mt-3" style="width: 100%;">
                <thead class="table-light">
                    <tr class="primary-bg text-white">
                        <th class="p-3">Date</th>
                        <th class="p-3">Time</th>
                        <th class="p-3">Day</th>
                        <th class="p-3">Vessel</th>
                        <th class="p-3">Capacity</th>
                        <th class="p-3 text-center">
                            <button class="btn secondary-bg border-2 border-white text-white" data-toggle="modal" data-target="#addTripsModal">ADD</button>
                        </th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                            echo "<tr>";
                            echo "<td class='p-3'>" . htmlspecialchars($row['date']) . "</td>";
                            echo "<td class='p-3'>" . htmlspecialchars($row['time']) . "</td>";
                            echo "<td class='p-3'>" . htmlspecialchars($row['day']) . "</td>";
                            echo "<td class='p-3'>" . htmlspecialchars($row['vesselName']) . "</td>";
                            echo "<td class='p-3'>" . htmlspecialchars($row['capacity']) . "</td>";
                            echo "<td class='text-center p-3'>
                <form action='../../php/deleteTripSetting.php' method='POST' style='display:inline;'>
                    <input type='hidden' name='id' value='" . htmlspecialchars($row['id']) . "'>
                    <button type='submit' class='btn btn-danger' onclick='return confirm(\"Are you sure you want to delete this trip?\");'>DELETE</button>
                </form>
              </td>";
                            echo "</tr>";
                        }
                    } else {
                        echo "<tr><td colspan='6' class='text-center p-3'>No available trips found.</td></tr>";
                    }
                    ?>

                </tbody>
            </table>
        </div>

        <div class="flex flex-col">
            <span class="text-2xl primary-text font-bold">Rates</span>
            <span class="text-lg text-black">Trip Rate</span>

            <table class="table table-bordered table-striped mt-3" style="width: 100%;">
                <thead class="table-light">
                    <tr class="primary-bg text-white">
                        <th class="p-3">Regular</th>
                        <th class="p-3">Student</th>
                        <th class="p-3">Senior</th>
                        <th class="p-3 text-center">
                            <button class="btn secondary-bg border-2 border-white text-white" data-toggle="modal" data-target="#">ADD</button>
                        </th>
                    </tr>
                </thead>
                <tbody>

                </tbody>
            </table>
        </div>

        <div class="flex flex-col">
            <span class="text-2xl primary-text font-bold">Bunk No.</span>
            <span class="text-lg text-black">Add Available Bed Bunk No.</span>

            <table class="table table-bordered table-striped mt-3" style="width: 100%;">
                <thead class="table-light">
                    <tr class="primary-bg text-white">
                        <th class="p-3">Bed No.</th>
                        <th class="p-3 text-center">
                            <button class="btn secondary-bg border-2 border-white text-white" data-toggle="modal" data-target="#">ADD</button>
                        </th>
                    </tr>
                </thead>
                <tbody>

                </tbody>
            </table>
        </div>  

        <div class="flex flex-col">
            <span class="text-2xl primary-text font-bold">Seat No.</span>
            <span class="text-lg text-black">Add Available Reclining Seat No.</span>

            <table class="table table-bordered table-striped mt-3" style="width: 100%;">
                <thead class="table-light">
                    <tr class="primary-bg text-white">
                        <th class="p-3">Seat No.</th>
                        <th class="p-3 text-center">
                            <button class="btn secondary-bg border-2 border-white text-white" data-toggle="modal" data-target="#">ADD</button>
                        </th>
                    </tr>
                </thead>
                <tbody>

                </tbody>
            </table>
        </div>  
    </div>

    <div class="modal fade" id="addTripsModal" tabindex="-1" aria-labelledby="addTripsModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header text-white secondary-bg">
                    <h5 class="modal-title" id="addTripsModalLabel">Add Available Trips</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="../../php/saveTrip.php" method="POST">
                        <div class="form-group">
                            <label for="date">Date</label>
                            <input type="date" class="form-control" id="date" name="date" required>
                        </div>
                        <div class="form-group">
                            <label for="time">Time</label>
                            <input type="time" class="form-control" id="time" name="time" required>
                        </div>
                        <div class="form-group">
                            <label for="day">Day</label>
                            <select class="form-control" id="day" name="day" required>
                                <option value="Monday">Monday</option>
                                <option value="Tuesday">Tuesday</option>
                                <option value="Wednesday">Wednesday</option>
                                <option value="Thursday">Thursday</option>
                                <option value="Friday">Friday</option>
                                <option value="Saturday">Saturday</option>
                                <option value="Sunday">Sunday</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="vesselName">Vessel Name</label>
                            <input type="text" class="form-control" id="vesselName" name="vesselName" required>
                        </div>
                        <div class="form-group">
                            <label for="capacity">Capacity</label>
                            <input type="number" class="form-control" id="capacity" name="capacity" min="1" required>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Back</button>
                            <button type="submit" class="btn btn-primary">Add</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>

<?php
$conn->close();
?>