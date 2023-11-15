<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <title>User Login</title>
    <style>
        body {
            background-color: #f8f9fa; /* Light gray background */
        }

        .login-form {
            background-color: #ffffff; /* White background */
            border-radius: 10px;
            padding: 20px;
            margin-top: 50px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        .form-group {
            margin-bottom: 15px;
        }

        .error-message {
            color: red;
            margin-top: 10px;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="row justify-content-md-center">
            <div class="col-md-6 login-form">
                <h2 class="text-center mb-4">User Login</h2>
                <?php
                    // Display error message, if any
                    if (isset($_GET['error'])) {
                        echo '<p class="error-message">' . $_GET['error'] . '</p>';
                    }
                ?>
                <form action="login_process.php" method="post">
                    <div class="form-group">
                        <label for="loginIdentifier">Username or Email:</label>
                        <input type="text" class="form-control" id="loginIdentifier" name="login_identifier" required>
                    </div>
                    <div class="form-group">
                        <label for="password">Password:</label>
                        <input type="password" class="form-control" id="password" name="password" required>
                    </div>
                    <button type="submit" class="btn btn-primary btn-block">Login</button>
                </form>
            </div>
        </div>
    </div>
</body>
</html>
