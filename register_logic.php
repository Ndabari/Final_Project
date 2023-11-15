<?php
// Include your database connection file or code here
include('db_connection.php');


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $username = $_GET["username"];
    $password = $_GET["password"];
    $email = $_GET["email"];
    $confirmPassword = $_GET["confirmPassword"];

    // Perform basic input validation
    if (empty($username) || empty($password) || empty($email) || empty($confirmPassword)) {
        // Handle validation error (e.g., redirect back to the registration form with an error message)
        header("Location: registration.php?error=All fields are required");
        exit();
    }

    if ($password !== $confirmPassword) {
        // Handle validation error (e.g., redirect back to the registration form with an error message)
        header("Location: registration.php?error=Passwords do not match");
        exit();
    }

    // Hash the password
    $hashedPassword = password_hash($password, PASSWORD_BCRYPT);

    // Save user data to the database (replace with your database connection code)
    $servername = "phpmyadmin";
    $username = "localhost";
    $password = "";
    $dbname = "final_project";

    try {
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        // Insert user data into the students table
        $stmt = $conn->prepare("INSERT INTO students (username, password, email) VALUES (:username, :password, :email)");
        $stmt->bindParam(':username', $username);
        $stmt->bindParam(':password', $hashedPassword);
        $stmt->bindParam(':email', $email);

        $stmt->execute();

        // Redirect to a success page or login page
        header("Location: login.php");
        exit();
    } catch (PDOException $e) {
        // Handle database error (e.g., redirect back to the registration form with an error message)
        header("Location: registration.php?error=Database error");
        exit();
    }
} else {
    // Handle invalid request method (e.g., redirect back to the registration form with an error message)
    header("Location: registration.php?error=Invalid request");
    exit();
}
?>
