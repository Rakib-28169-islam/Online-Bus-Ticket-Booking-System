<?php
$serverName = "localhost";  // e.g., "localhost"
$userName = "root";      // e.g., "root"
$password = "";      // e.g., "password"
$dbName = "cse311project";   // e.g., "your database name "

// Create connection
$conn = new mysqli($serverName, $userName, $password, $dbName);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} else {



    //echo "Connected successfully";
}
