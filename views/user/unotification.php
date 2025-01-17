<?php
include "../../php/checklogin.php";
include "../../php/db.php";

$userId = $_SESSION['id'];
$sql = "SELECT * FROM notification WHERE user_id = ?";
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
    <title>Notification - ShipTech</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../../style/user/usernotif.css">


</head>

<body>
    <?php
    include '../navigation/userheader.php';
    ?>
    <div class="mt-16 mx-20">
        <div class="flex my-4">
            <span class="p-2 text-5xl primary-text font-bold">NOTIFICATIONS</span>
        </div>
        <?php
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $title = htmlspecialchars($row['title']);
                $message = htmlspecialchars($row['message']);
                $date = date('F j, Y g:i A', strtotime($row['date_time']));
        ?>
                <div class="flex my-2">
                    <span class="w-12 secondary-bg rounded-l-xl"></span>
                    <div class="flex flex-col w-full border-2 border-blue-100 rounded-r-xl p-2">
                        <span class="text-xl"><?php echo $title; ?></span>
                        <div class="flex justify-between">
                            <span class="text-sm"><?php echo $message; ?></span>
                            <span class="text-sm"><?php echo $date; ?></span>
                        </div>
                    </div>
                </div>
        <?php
            }
        } else {
            echo "<div class='flex my-2'><span class='w-12 secondary-bg rounded-l-xl'></span><div class='flex flex-col w-full border-2 border-blue-100 rounded-r-xl p-2'><span class='text-xl'>No notifications found.</span></div></div>";
        }
        ?>
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
</body>

</html>