<?php

$servername = "phpmyadmin";
$username = "localhost";
$password = "";
$dbname = "final_project";

try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    // Optionally set other PDO attributes as needed

    // Uncomment the line below if you want to see detailed errors during development
     $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Uncomment the line below if you want to use UTF-8 encoding
    // $conn->exec('SET NAMES utf8');
} catch (PDOException $e) {
    // Handle connection error (e.g., display an error message or log the error)
    echo "Connection failed: " . $e->getMessage();
    die();
}

?>
