<?php

// Database connection constants
const HOSTNAME = "localhost";
const USERNAME = "root";
const PASSWORD = ""; // Leave this empty if you have no password for root
const DATABASE = "mycontactdatabase";

try {
    // Create a new PDO instance
    $pdo = new PDO("mysql:host=" . HOSTNAME . ";dbname=" . DATABASE, USERNAME, PASSWORD);

    // Set PDO error mode to exception for better error handling
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    echo "Connected successfully"; 
} catch (PDOException $error) {
    echo "Connection Failed: " . $error->getMessage();
}
