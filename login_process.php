<?php
session_start();

// Include your database connection file or code here
include('db_connection.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $loginIdentifier = $_POST["login_identifier"]; // Username or email
    $password = $_POST["password"];

    // Perform basic input validation
    if (empty($loginIdentifier) || empty($password)) {
        // Handle validation error (e.g., redirect back to the login form with an error message)
        header("Location: login.php?error=All fields are required");
        exit();
    }

    // Retrieve user data from the database based on the username or email
    $query = "SELECT * FROM students WHERE username = :loginIdentifier OR email = :loginIdentifier";
    
    try {
        $stmt = $conn->prepare($query);
        $stmt->bindParam(':loginIdentifier', $loginIdentifier);
        $stmt->execute();

        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if (!$user || !password_verify($password, $user['password'])) {
            // Handle invalid login (e.g., redirect back to the login form with an error message)
            header("Location: login.php?error=Invalid login credentials");
            exit();
        }

        // Set session variables for the logged-in user
        $_SESSION['user_id'] = $user['id'];
        $_SESSION['username'] = $user['username'];

        // Redirect to the index_students.php page upon successful login
        header("Location: index_students.php");
        exit();
    } catch (PDOException $e) {
        // Handle database error (e.g., redirect back to the login form with an error message)
        header("Location: login.php?error=Database error");
        exit();
    }
} else {
    // Handle invalid request method (e.g., redirect back to the login form with an error message)
    header("Location: login.php?error=Invalid request");
    exit();
}
?>
