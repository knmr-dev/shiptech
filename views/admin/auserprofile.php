<?php

include "../../php/checklogin.php";
include "../../php/db.php";

$user_id = $_SESSION['id'];
$query = "SELECT name, gender, contact, type, username, password FROM users WHERE id = ?";
$stmt = $conn->prepare($query); 
$stmt->bind_param('i', $user_id);
$stmt->execute();
$result = $stmt->get_result();
$user = $result->fetch_assoc();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Profile - ShipTech</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
    <link rel="stylesheet" href="../../style/admin/adminprofile.css">

</head>

<body>
    <?php
        include '../navigation/adminheader.php';
    ?>
    <div class="container mt-5">
        <div class="profile-container">
            <h2 class="text-center">User Profile</h2>
            <form>
                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" class="form-control" id="name" placeholder="Enter your name" value="<?php echo $user['name']; ?>" readonly>
                </div>
                <div class="form-group">
                    <label for="gender">Gender</label>
                    <select class="form-control" id="gender" name="gender" disabled>
                        <option value="">Select Gender</option>
                        <option value="Male" <?php echo ($user['gender'] == 'Male') ? 'selected' : ''; ?>>Male</option>
                        <option value="Female" <?php echo ($user['gender'] == 'Female') ? 'selected' : ''; ?>>Female</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="contact">Contact</label>
                    <input type="text" class="form-control" id="contact" name="contact" value="<?php echo $user['contact']; ?>" disabled>
                </div>
                <div class="form-group">
                    <label for="type">Type</label>
                    <select class="form-control" id="type" name="type" disabled>
                        <option value="">Select Type</option>
                        <option value="Student" <?php echo ($user['type'] == 'Student') ? 'selected' : ''; ?>>Student</option>
                        <option value="Regular" <?php echo ($user['type'] == 'Regular') ? 'selected' : ''; ?>>Regular</option>
                        <option value="Senior" <?php echo ($user['type'] == 'Senior') ? 'selected' : ''; ?>>Senior</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="username">Username</label>
                    <input type="text" class="form-control" id="username" placeholder="Enter your username" value="<?php echo $user['username']; ?>" readonly>
                </div>
                <button type="button" class="btn btn-update btn-block" data-toggle="modal" data-target="#updateModal">Update</button>
            </form>
        </div>
    </div>

    <div class="modal fade" id="updateModal" tabindex="-1" aria-labelledby="updateModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="updateModalLabel">Update Information</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form method="POST" action="../../php/update_user.php">
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="modal-name">Name</label>
                            <input type="text" class="form-control" id="modal-name" name="name" value="<?php echo $user['name']; ?>">
                        </div>
                        <div class="form-group">
                            <label for="modal-gender">Gender</label>
                            <select class="form-control" id="modal-gender" name="gender">
                                <option value="Male" <?php echo ($user['gender'] == 'Male') ? 'selected' : ''; ?>>Male</option>
                                <option value="Female" <?php echo ($user['gender'] == 'Female') ? 'selected' : ''; ?>>Female</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="modal-contact">Contact</label>
                            <input type="text" class="form-control" id="modal-contact" name="contact" value="<?php echo $user['contact']; ?>">
                        </div>
                        <div class="form-group">
                            <label for="modal-type">Type</label>
                            <select class="form-control" id="modal-type" name="type">
                                <option value="Student" <?php echo ($user['type'] == 'Student') ? 'selected' : ''; ?>>Student</option>
                                <option value="Regular" <?php echo ($user['type'] == 'Regular') ? 'selected' : ''; ?>>Regular</option>
                                <option value="Senior" <?php echo ($user['type'] == 'Senior') ? 'selected' : ''; ?>>Senior</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="modal-password">New Password</label>
                            <input type="password" class="form-control" id="modal-password" name="password">
                        </div>
                        <div class="form-group">
                            <label for="modal-confirm-password">Confirm New Password</label>
                            <input type="password" class="form-control" id="modal-confirm-password" name="confirm_password">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>