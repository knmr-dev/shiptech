<?php
include "../../php/checklogin.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home - ShipTech</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="../../style/user/userhome.css">
</head>

<body>
    <?php
        include '../navigation/userheader.php';
    ?>
    <div class="mt-16 mx-20">
        <div class="flex flex-col gap-4">
            <span class="text-5xl font-bold primary-text">Welcome to ShipTech</span>
            <span>A convenient and user-friendly online booking system with collaboration
                of starthorse shipping lines for travelers between Banton and San Agustin,
                Romblon that ensuring reliable and easiest access to transportation services.
            </span>
        </div>
        <div class="grid grid-cols-2 h-96 relative mt-4">
            <div class="flex bg-image-1">
            </div>
            <div class="flex bg-image-2">
            </div>
            <div class="absolute-center top-center">
                <img src="../../starhorse-logo.png" alt="Starhouse Logo" class="small-image">
            </div>
            <div class="absolute-center bottom-center">
                <button id="bookNowBtn" class="book-now-button">BOOK NOW</button>
            </div>
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
                <form id="bookingForm" action="../../php/addBook.php" method="POST">
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

        <div class="grid grid-cols-2 h-96 mt-4">
            <div class="flex items-center justify-center overflow-hidden">
                <img src="../../ssl.jpg" alt="Starhouse Logo" class="object-cover w-full h-full">
            </div>
            <div class="flex flex-col p-6 gap-10">
                <span class="text-4xl font-extrabold primary-text">Why should you choose Starhorse Shipping Lines, Inc.?</span>
                <div class="flex flex-col gap-2">
                    <span class="text-2xl font-extrabold primary-text">Vision</span>
                    <span class="text-justify">
                        To be known as the best domestic shipppinh company in Southern Luzon
                        and Visayas Region the provides the highest value-for-money service its
                        customers while meeting profitability target. Creating a harmonious working
                        environment that generates opportunities for personal and professional growth
                        and preserves dignity of every employees and crew.
                    </span>
                </div>
            </div>
        </div>

        <div class="grid grid-cols-2 h-auto mt-4 gap-2">
            <div class="flex flex-col p-6 gap-6">
                <span class="text-2xl font-extrabold primary-text">Mission</span>
                <span class="text-justify">
                    1. To deliver excellent service to our customers in a safe manner and with the highest value-for-money experience;
                </span>
                <span class="text-justify">
                    2. To set the standards for domesti shipping companies;
                </span>
                <span class="text-justify">
                    3. To ack as a development caatalyst by serving as a trade facilitator along the areas we are serving;
                </span>
                <span class="text-justify">
                    4. To enhance people mobility by bridging the islands of the Philippines, thus connecting families and promoting tourism in the country;
                </span>
                <span class="text-justify">
                    5. To provide employees an environment that will allows them to grow professionally and personally.
                </span>
            </div>
            <div class="flex items-center justify-center overflow-hidden">
                <img src="../../ssl1.png" alt="Starhouse Logo" class="object-cover w-full h-full">
            </div>
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

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="../../script/userhome.js"></script>
    <script src="../../script/utransaction.js"></script>

</body>
</html>