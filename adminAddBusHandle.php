<?php
// Include the connection file
include('connection.php');

// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Retrieve form data
    $bus_code = $_POST['bus_code'];
    $source_location = $_POST['source_location'];
    $end_location = $_POST['end_location'];
    $capacity = $_POST['capacity'];
    $coach_type = $_POST['coach_type'];
    $bus_type = $_POST['bus_type'];
    $via_road = $_POST['via_road'];
    $max_price = $_POST['max_price'];

    // Insert data into the database
    $query = "INSERT INTO bus (bus_code, source_location, end_location, capacity, coach_type, bus_type, via_road, max_price)
              VALUES ('$bus_code', '$source_location', '$end_location', '$capacity', '$coach_type', '$bus_type', '$via_road', '$max_price')";

    // Execute the query
    if ($conn->query($query)) {
        echo "<script>
                alert('Bus added successfully!');
                window.location.href = 'adminAllBusInfo.php';
            </script>";
    } else {
        echo "<script>alert('Error: " . $conn->error . "');</script>";
    }

    // Close the database connection
    $conn->close();
}
