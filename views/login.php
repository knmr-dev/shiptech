<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - ShipTech</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600&display=swap" rel="stylesheet">
    <style>
        :root {
            --primary-color: #043e66;
            --secondary-color: #1db4df;
        }
        body {
            font-family: 'Poppins', sans-serif;
        }
        .login-container {
            margin-top: 100px;
        }
        .login-logo {
            width: 200px;
            margin-bottom: 20px;
        }
        .btn-primary {
            background-color: var(--primary-color);
            border-color: var(--primary-color);
        }
        .btn-primary:hover {
            background-color: var(--secondary-color);
            border-color: var(--secondary-color);
        }
    </style>
</head>
<body>
    <div class="container login-container">
        <div class="row justify-content-center">
            <div class="col-md-4">
                <div class="text-center">
                    <img src="../ship.png" alt="ShipTech Logo" class="login-logo">
                </div>
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title text-center">Login</h5>
                        
                        <?php if (isset($_GET['error']) && $_GET['error'] == 'invalid'): ?>
                        <div class="alert alert-danger" role="alert">
                            Invalid username or password.
                        </div>
                        <?php endif; ?>

                        <form id="loginForm" action="../php/plogin.php" method="post">
                            <div class="form-group">
                                <label for="username">Username</label>
                                <input type="text" class="form-control" id="username" name="username" required>
                            </div>
                            <div class="form-group">
                                <label for="password">Password</label>
                                <input type="password" class="form-control" id="password" name="password" required>
                            </div>
                            <button type="submit" class="btn btn-primary btn-block">Login</button>
                        </form>
                        <p class="text-center mt-3">
                            Don't have an account? <a href="signup.php">Sign up</a>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
