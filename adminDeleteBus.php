<?php
include('connection.php');

// Check if bus_code is set
if (isset($_GET['id'])) {
    $bus_code = $_GET['id'];

    // First, delete related records in the `bus_stop` table
    $delete_bus_stop_query = "DELETE FROM bus_stop WHERE bus_code = '$bus_code'";

    if ($conn->query($delete_bus_stop_query)) {
        // Now, delete the bus record
        $delete_bus_query = "DELETE FROM bus WHERE bus_code = '$bus_code'";

        if ($conn->query($delete_bus_query)) {
            // Redirect back to the bus list
            header("Location: adminAllBusInfo.php");
            exit();
        } else {
            echo "Error deleting bus: " . $conn->error;
        }
    } else {
        echo "Error deleting related bus stops: " . $conn->error;
    }
}
?>
