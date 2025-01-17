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
    <title>Notifications - ShipTech</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../../style/admin/adminnotif.css">
</head>

<body>
    <?php
    include '../navigation/adminheader.php';
    ?>

    <div class="mt-16 mx-4">
        <div class="container">
            <div class="mt-4 row header-section align-items-center">
                <div class="col-md-6 d-flex align-items-center">
                    <span class="text-2xl font-bold primary-text">Send Notifications</span>
                </div>
                <div class="col-md-6 d-flex justify-content-end align-items-center">
                    <input type="text" class="form-control search-bar" placeholder="Search...">
                    <button class="ml-2 btn add-btn" data-toggle="modal" data-target="#notificationModal">SEND NOTIFICATION TO ALL</button>
                </div>
            </div>

            <!-- Table Section -->
            <div class="table-container p-3">
                <table class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>Transaction ID</th>
                            <th>Name</th>
                            <th>Gender</th>
                            <th>Contact</th>
                            <th>Type</th>
                            <th>Action</th>
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
                                echo "<td class='action-btns text-center'>";
                                echo "<button class='btn btn-success btn-sm send-btn' data-bookingid='" . htmlspecialchars($row['userID']) . "' data-toggle='modal' data-target='#notificationModal'>Send</button>";
                                echo "</td>";
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

    <div class="modal fade" id="notificationModal" tabindex="-1" role="dialog" aria-labelledby="notificationModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <form action="../../php/sendnotif.php" method="POST">
                    <div class="modal-header text-white secondary-bg">
                        <h5 class="modal-title" id="notificationModalLabel">Send Notifications</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group" hidden>
                            <input type="hidden" class="form-control" id="displayBookingID" name="displayBookingID" required>
                        </div>

                        <div class="form-group">
                            <label for="datetime">Date Time:</label>
                            <input type="datetime-local" class="form-control" id="datetime" name="datetime" required>
                        </div>
                        <div class="form-group">
                            <label for="title">Title:</label>
                            <input type="text" class="form-control" id="title" name="title" required>
                        </div>
                        <div class="form-group">
                            <label for="message">Message:</label>
                            <textarea class="form-control" id="message" name="message" rows="3" required></textarea>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Back</button>
                        <button type="submit" class="btn primary-bg text-white">Send</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script>
        document.querySelectorAll('.send-btn').forEach(button => {
            button.addEventListener('click', function() {
                var bookingID = this.getAttribute('data-bookingid');
                document.getElementById('displayBookingID').value = bookingID;
            });
        });
    </script>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>