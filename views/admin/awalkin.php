<?php
include "../../php/checklogin.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Walk In - ShipTech</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../../style/admin/adminwalkin.css">
</head>
<body>
    <?php
        include '../navigation/adminheader.php';
    ?>

    <div class="mt-16 mx-4">
        <div class="container">
        <span class="mb-8 text-2xl font-bold primary-text">Walk-In Transactions</span>
        <div class="mt-4 row header-section align-items-center">
            <div class="col-md-6 d-flex align-items-center">
                <input type="text" class="form-control search-bar" placeholder="Search...">
            </div>
            <div class="col-md-6 d-flex justify-content-end align-items-center">
                <h4 class="mr-3">Banton San Agustine 10/26/18</h4>
                <button class="btn add-btn">ADD PASSENGER</button>
            </div>
        </div>
        <div class="table-container p-3">
            <table class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>Passenger No.</th>
                        <th>Transaction ID</th>
                        <th>Name</th>
                        <th>Gender</th>
                        <th>Contact</th>
                        <th>Type</th>
                        <th>Amount</th>
                        <th>Date Selected</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>001</td>
                        <td>T123456</td>
                        <td>John Doe</td>
                        <td>Male</td>
                        <td>(123) 456-7890</td>
                        <td>Regular</td>
                        <td>$50</td>
                        <td>09/15/2024</td>
                    </tr>
                    <tr>
                        <td>002</td>
                        <td>T654321</td>
                        <td>Jane Smith</td>
                        <td>Female</td>
                        <td>(987) 654-3210</td>
                        <td>Senior</td>
                        <td>$30</td>
                        <td>09/16/2024</td>
                    </tr>
                    <tr>
                        <td>001</td>
                        <td>T123456</td>
                        <td>John Doe</td>
                        <td>Male</td>
                        <td>(123) 456-7890</td>
                        <td>Regular</td>
                        <td>$50</td>
                        <td>09/15/2024</td>
                    </tr>
                    <tr>
                        <td>002</td>
                        <td>T654321</td>
                        <td>Jane Smith</td>
                        <td>Female</td>
                        <td>(987) 654-3210</td>
                        <td>Senior</td>
                        <td>$30</td>
                        <td>09/16/2024</td>
                    </tr>
                    <tr>
                        <td>001</td>
                        <td>T123456</td>
                        <td>John Doe</td>
                        <td>Male</td>
                        <td>(123) 456-7890</td>
                        <td>Regular</td>
                        <td>$50</td>
                        <td>09/15/2024</td>
                    </tr>
                    <tr>
                        <td>002</td>
                        <td>T654321</td>
                        <td>Jane Smith</td>
                        <td>Female</td>
                        <td>(987) 654-3210</td>
                        <td>Senior</td>
                        <td>$30</td>
                        <td>09/16/2024</td>
                    </tr>
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