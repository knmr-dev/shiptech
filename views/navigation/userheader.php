<nav class="navbar navbar-expand-lg navbar-dark">
    <a class="navbar-brand" href="#">
        <div class="flex items-center justify-center gap-4">
            <img src="../../sips.png" width="30" height="30" class="logo" alt="ShipTech Logo">
            <span class="text-3xl font-bold">ShipTech</span>
        </div>
    </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav ml-auto">
            <li class="nav-item">
                <a class="nav-link" href="../user/uhome.php">Home</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="../user/utransaction.php">Transaction</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="../user/uschedulerate.php">Schedule & Rate</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="../user/ucontact.php">Contact Us</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="../user/unotification.php">Notification</a>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="fas fa-user user-icon"></i>
                </a>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
                    <a class="dropdown-item" href="../user/uuserprofile.php">User Profile</a>
                    <a class="dropdown-item" href="../../php/plogout.php">Log Out</a>
                </div>
            </li>
        </ul>
    </div>
</nav>