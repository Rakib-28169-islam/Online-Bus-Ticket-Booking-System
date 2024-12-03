<?php
// Include database connection
include('connection.php');

if (session_status() === PHP_SESSION_NONE) {
    session_start(); // Start session only if not already started
}

if (!isset($_SESSION['admin_id'])) {
    header('Location: loginForm.php');
    exit();
}

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $id = $_POST['id'];
    $bus_code = $_POST['bus_code'];
    $location = $_POST['location'];
    $time_1 = $_POST['time_1'];
    $time_2 = $_POST['time_2'];
    $location_level = $_POST['location_level'];
    $point_location = $_POST['point_location'];

    // SQL query to insert a new bus stop
    $query = "INSERT INTO bus_stop (bus_code, location, time_1, time_2, location_level, point_location) 
              VALUES ('$bus_code', '$location', '$time_1', '$time_2', '$location_level', '$point_location')";


    // Execute query
    if ($conn->query($query)) {
        // Success: Redirect back to the form with a success message
        echo "<script>
            alert('Bus stop added successfully!');
            window.location.href = 'adminAddBusStop.php';
        </script>";
    } else {
        // Error: Show error message
        echo "<script>
            alert('Error adding bus stop: " . $conn->error . "');
            window.history.back();
        </script>";
    }
}

// Close the database connection
$conn->close();
