<?php
session_start();
include "../../php/db.php";

$userId = $_SESSION['id'];
$sql = "SELECT * FROM booking WHERE userID = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $userId);
$stmt->execute();
$result = $stmt->get_result();

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Transaction - ShipTech</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../../style/user/usertransaction.css">
</head>

<body>
    <?php
    include '../navigation/userheader.php';
    ?>

    <div class="mt-16 mx-20">
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
        <div class="flex flex-col my-4">
            <span class="text-3xl font-bold primary-text">TRANSACTION</span>
            <span>Booking Summary</span>
        </div>

        <div class="flex justify-between items-center mb-4">
            <span class="text-xl font-bold">Booking Reference No.</span>
            <button id="bookNowBtn" class="bg-blue-500 text-white py-2 px-4 rounded">Add Passenger</button>

            <div id="myModal" class="modal">
                <div class="modal-content">
                    <div class="flex justify-between">
                        <span class="primary-text text-2xl font-bold">ONLINE BOOKING</span>
                        <span class="close">&times;</span>
                    </div>
                    <div class="my-4 bg-gray-400 p-2 rounded-xl">
                        <form id="bookingForm" class="grid grid-cols-2">
                            <div class="flex flex-col mx-2">
                                <label for="fullname">Full Name:</label>
                                <input type="text" id="fullname" name="fullname" required>
                            </div>

                            <div class="flex flex-col mx-2">
                                <label for="email">Email Address:</label>
                                <input type="email" id="email" name="email" required>
                            </div>

                            <div class="flex flex-col mx-2">
                                <label for="address">Address:</label>
                                <input type="text" id="address" name="address" required>
                            </div>

                            <div class="flex flex-col mx-2">
                                <label for="contact">Contact:</label>
                                <input type="text" id="contact" name="contact" required>
                            </div>

                            <div class="grid grid-cols-2">
                                <div class="flex flex-col mx-2">
                                    <label for="age">Age:</label>
                                    <input type="text" id="age" name="age" required>
                                </div>
                                <div class="flex flex-col mx-2">
                                    <label for="gender">Gender:</label>
                                    <select id="gender" name="gender" required>
                                        <option value="" disabled selected>Select Gender</option>
                                        <option value="Male">Male</option>
                                        <option value="Female">Female</option>
                                    </select>
                                </div>
                            </div>

                            <div class="flex flex-col mx-2">
                                <label for="availtrip">Available Trips:</label>
                                <input type="text" id="availtrip" name="availtrip" required>
                            </div>

                            <div class="grid grid-cols-2">
                                <div class="flex flex-col mx-2">
                                    <label for="type">Type:</label>
                                    <select id="type" name="type" required>
                                        <option value="" disabled selected>Select Type</option>
                                        <option value="Regular">Regular</option>
                                        <option value="Student">Student</option>
                                        <option value="Senior">Senior</option>
                                    </select>
                                </div>

                                <div class="flex flex-col mx-2">
                                    <label for="price">Price:</label>
                                    <input type="text" id="price" name="price" required readonly>
                                </div>
                            </div>

                            <div class="flex items-end justify-center my-3">
                                <div class="grid grid-cols-2">
                                    <div class="flex flex-col mx-2">
                                        <button type="button" class="backButton">Back</button>
                                    </div>
                                    <div class="flex flex-col mx-2">
                                        <button type="button" class="continueButton"> Continue</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div id="myModal1" class="modal">
                <form id="bookingForm" action="../../php/addBooktrans.php" method="POST">
                    <div class="modal-content">
                        <div class="flex justify-between">
                            <span class="primary-text text-2xl font-bold">ONLINE BOOKING</span>
                            <span class="close1">&times;</span>
                        </div>
                        <div class="mt-4 p-4 secondary-bg p-2 rounded-t-lg">
                            <div class="flex flex-col text-white gap-4">
                                <span class="text-center">THANK YOU FOR BOOKING</span>
                                <span class="text-justify">
                                    NOTE: Please check your information below if it is correct then press continue to
                                    proceed in Transaction page. Please proceed to the Banton Port for your payment and ticket,
                                    just present the Booking Reference No and ID for student and senior. Pay before the cutoff, unless
                                    your booking will be canceled. Cutoff Time: 8:00 PM
                                </span>
                            </div>
                        </div>
                        <div class="mb-4 p-4 primary-bg p-2 rounded-b-lg">
                            <div class="flex flex-col text-white gap-4">
                                <span class="text-center">PASSENGER INFORMATION</span>
                                <div class="grid grid-cols-2">
                                    <span>Full Name:</span>
                                    <span id="passengerName"></span>
                                    <input type="hidden" name="fullname" id="hiddenFullname">

                                    <span>Email Address:</span>
                                    <span id="passengerEmail"></span>
                                    <input type="hidden" name="email" id="hiddenEmail">

                                    <span>Address:</span>
                                    <span id="passengerAddress"></span>
                                    <input type="hidden" name="address" id="hiddenAddress">

                                    <span>Contact No.:</span>
                                    <span id="passengerContact"></span>
                                    <input type="hidden" name="contact" id="hiddenContact">

                                    <span>Age:</span>
                                    <span id="passengerAge"></span>
                                    <input type="hidden" name="age" id="hiddenAge">

                                    <span>Gender:</span>
                                    <span id="passengerGender"></span>
                                    <input type="hidden" name="gender" id="hiddenGender">

                                    <span>Type:</span>
                                    <span id="passengerType"></span>
                                    <input type="hidden" name="type" id="hiddenType">

                                    <span>Price:</span>
                                    <span id="passengerPrice"></span>
                                    <input type="hidden" name="price" id="hiddenPrice">

                                    <span>Select Day:</span>
                                    <span id="passengerAvailTrip"></span>
                                    <input type="hidden" name="availableTrip" id="hiddenAvailableTrip">
                                </div>
                            </div>
                        </div>

                        <div class="grid grid-cols-2">
                            <div class="flex flex-col mx-2">
                                <button type="button" class="backFormButton primary-bg p-2 text-white rounded-lg">Back</button>
                            </div>
                            <div class="flex flex-col mx-2">
                                <button type="submit" id="submitBookButton" class="primary-bg p-2 text-white rounded-lg">Submit</button>
                            </div>
                        </div>
                    </div>
                </form>

            </div>
        </div>

        <!-- Booking Table -->
        <div class="table-container">
            <table class="table table-striped">
                <thead class="primary-bg text-white">
                    <tr>
                        <th>Passenger No.</th>
                        <th>Name</th>
                        <th>Address</th>
                        <th>Age</th>
                        <th>Contact</th>
                        <th>Type</th>
                        <th>Selected Date</th>
                        <th>Payment Status</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                            echo "<tr>";
                            echo "<td>" . htmlspecialchars($row['bookingID']) . "</td>";
                            echo "<td>" . htmlspecialchars($row['fullName']) . "</td>";
                            echo "<td>" . htmlspecialchars($row['address']) . "</td>";
                            echo "<td>" . htmlspecialchars($row['age']) . "</td>";
                            echo "<td>" . htmlspecialchars($row['contact']) . "</td>";
                            echo "<td>" . htmlspecialchars($row['type']) . "</td>";
                            echo "<td>" . htmlspecialchars($row['selectedTrip']) . "</td>";
                            echo "<td>" . htmlspecialchars($row['status']) . "</td>";
                            echo "<td class='action-buttons'>";
                            echo "<button class='bg-red-500 text-white py-1 px-2 rounded' data-toggle='modal' data-target='#cancelModal' data-id='" . htmlspecialchars($row['bookingID']) . "'>Cancel</button>";
                            // Update Button
                            if ($row['status'] === 'Pending') {
                                echo "<button class='bg-yellow-500 text-white py-1 px-2 rounded' data-toggle='modal' data-target='#updateModal' data-id='" . htmlspecialchars($row['bookingID']) . "' 
                                        data-fullname='" . htmlspecialchars($row['fullName']) . "' 
                                        data-email='" . htmlspecialchars($row['emailAddress']) . "' 
                                        data-address='" . htmlspecialchars($row['address']) . "' 
                                        data-age='" . htmlspecialchars($row['age']) . "' 
                                        data-gender='" . htmlspecialchars($row['gender']) . "' 
                                        data-contact='" . htmlspecialchars($row['contact']) . "' 
                                        data-type='" . htmlspecialchars($row['type']) . "' 
                                        data-selectedtrip='" . htmlspecialchars($row['selectedTrip']) . "'>Update</button>";
                            } else {
                                echo "<button class='bg-gray-400 text-gray-600 py-1 px-2 rounded' disabled>Update</button>";
                            }
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
        <div class="grid grid-cols-2 h-96 mt-4">
            <div class="flex flex-col p-6 gap-10">
                <img src="../../starhorse-logo.png" alt="Starhouse Logo" class="small-image">
                <span class="text-justify">
                    Starhorse Shipping Lines is a marine transportation company based in Lucena City,
                    Quezon catering to passengers & cargoes bound to Marinduque, Romblon, Batangas,
                    Calapan, Abra de Ilog, Masbate, Real, Polilo, San Andres, San Pascual, and Pasacao.
                </span>
                <span>Follow us on <a href="#" class="text-blue-600 hover:text-blue-800">Facebook</a></span>
            </div>
            <div class="flex flex-col p-6 gap-10">
                <span class="text-4xl font-extrabold primary-text">Get in touch</span>
                <div class="grid grid-cols-4">
                    <div class="gap-4 h-14">
                        <i class="fas fa-map-marker-alt text-lg text-black"></i>
                        <strong>Address:</strong>
                    </div>
                    <div class="col-span-3">
                        <span class="primary-text text-justify">20 San Antonio Street Lourdes Subdivision Brgy Isabang Lucena City Quezon Province.</span>
                    </div>

                    <div class="gap-4 h-10">
                        <i class="fas fa-phone text-lg text-black"></i>
                        <strong>Tel:</strong>
                    </div>
                    <div class="col-span-3">
                        <span class="primary-text text-justify">+63 (42) 710 - 7403</span>
                    </div>

                    <div class="gap-4 h-10">
                        <i class="fas fa-mobile-alt text-lg text-black"></i>
                        <strong>Phone:</strong>
                    </div>
                    <div class="col-span-3">
                        <span class="primary-text text-justify">0995 515 9319 / 0995 519 1017</span>
                    </div>

                    <div class="gap-4 h-10">
                        <i class="fas fa-envelope text-lg text-black"></i>
                        <strong>Email:</strong>
                    </div>
                    <div class="col-span-3">
                        <span class="primary-text text-justify">inquiry@starhorse.com.ph</span>
                    </div>

                </div>
            </div>
        </div>
    </div>

    <div class="flex items-center justify-center p-4 bg-black">
        <span class="text-white">
            2024 ShipTech Collaboration with Starhorse Shipping Lines | All rights reserved | RSU Capstone Project
        </span>
    </div>

    <div class="modal fade" id="cancelModal" tabindex="-1" role="dialog" aria-labelledby="cancelModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="cancelModalLabel">Confirm Cancellation</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    Are you sure you want to cancel this booking?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <form action="../../php/cancelBooking.php" method="POST" style="display: inline;">
                        <input type="hidden" name="bookingID" id="bookingIDInput">
                        <button type="submit" class="btn btn-danger">Cancel</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="updateModal" tabindex="-1" role="dialog" aria-labelledby="updateModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="updateModalLabel">Update Booking Information</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="../../php/updateBooking.php" method="POST" id="updateBookingForm">
                        <input type="hidden" name="bookingID" id="updateBookingIDInput">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="updateFullNameInput">Full Name:</label>
                                    <input type="text" class="form-control" id="updateFullNameInput" name="fullname" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="updateEmailInput">Email Address:</label>
                                    <input type="email" class="form-control" id="updateEmailInput" name="email" required>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="updateAddressInput">Address:</label>
                                    <input type="text" class="form-control" id="updateAddressInput" name="address" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="updateGenderInput">Gender:</label>
                                    <select class="form-control" id="updateGenderInput" name="gender" required>
                                        <option value="Male">Male</option>
                                        <option value="Female">Female</option>
                                        <option value="Other">Other</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="updateAgeInput">Age:</label>
                                    <input type="number" class="form-control" id="updateAgeInput" name="age" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="updateContactInput">Contact:</label>
                                    <input type="text" class="form-control" id="updateContactInput" name="contact" required>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="updateTypeInput">Type:</label>
                                    <select class="form-control" id="updateTypeInput" name="type" required>
                                        <option value="Regular">Regular</option>
                                        <option value="Student">Student</option>
                                        <option value="Senior">Senior</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="updatePriceInput">Price:</label>
                                    <input type="text" class="form-control" id="updatePriceInput" name="price" readonly>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="updateSelectedTripInput">Selected Trip:</label>
                                    <input type="text" class="form-control" id="updateSelectedTripInput" name="selectedTrip" required>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary" form="updateBookingForm">Update</button>
                </div>
            </div>
        </div>
    </div>

    <script>
        document.querySelectorAll('.action-buttons button.bg-red-500').forEach(button => {
            button.addEventListener('click', function() {
                const bookingID = this.getAttribute('data-id');
                document.getElementById('bookingIDInput').value = bookingID;
                $('#cancelModal').modal('show');
            });
        });
    </script>


    <script>
        document.getElementById('updateTypeInput').addEventListener('change', function() {
            const priceInput = document.getElementById('updatePriceInput');
            const selectedType = this.value;

            let price;
            switch (selectedType) {
                case 'Regular':
                    price = 300;
                    break;
                case 'Student':
                    price = 240;
                    break;
                case 'Senior':
                    price = 216;
                    break;
                default:
                    price = 0;
            }

            priceInput.value = price;
        });

        document.querySelectorAll('.action-buttons button.bg-yellow-500').forEach(button => {
            button.addEventListener('click', function() {
                const bookingID = this.getAttribute('data-id');
                const fullName = this.getAttribute('data-fullname');
                const email = this.getAttribute('data-email');
                const address = this.getAttribute('data-address');
                const age = this.getAttribute('data-age');
                const contact = this.getAttribute('data-contact');
                const type = this.getAttribute('data-type');
                const selectedTrip = this.getAttribute('data-selectedtrip');
                const gender = this.getAttribute('data-gender');

                document.getElementById('updateBookingIDInput').value = bookingID;
                document.getElementById('updateFullNameInput').value = fullName;
                document.getElementById('updateEmailInput').value = email;
                document.getElementById('updateAddressInput').value = address;
                document.getElementById('updateAgeInput').value = age;
                document.getElementById('updateContactInput').value = contact;
                document.getElementById('updateTypeInput').value = type;
                document.getElementById('updateSelectedTripInput').value = selectedTrip;
                document.getElementById('updateGenderInput').value = gender;

                $('#updateModal').modal('show');
            });
        });
    </script>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="../../script/userhome.js"></script>
    <script src="../../script/utransaction.js"></script>
</body>
</html>