<?php
// Include the connection file
session_start();
include('connection.php');

// Fetch data from the 'bus' table
$query = "SELECT * FROM bus";
$result = $conn->query($query);

$query2 = "SELECT * FROM bus_stop";
$result2 = $conn->query($query2);

if (!$result) {
    die("Query Failed: " . $conn->error);
}

if (!$result2) {
    die("Query Failed: " . $conn->error);
}

if (!isset($_SESSION['admin_id'])) {
    header('Location: loginForm.php');
    exit();
}

?>


<!DOCTYPE html>
<html lang="en" data-theme="light">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>

    <link href="https://cdn.jsdelivr.net/npm/daisyui@4.6.0/dist/full.min.css" rel="stylesheet" type="text/css" />
    <script src="https://cdn.tailwindcss.com"></script>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:slnt,wght@-10..0,100..900&family=Raleway:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">

    <style>
        .font-inter {
            font-family: "Inter", sans-serif;
        }

        .font-raleway {
            font-family: "Raleway", sans-serif;
        }
    </style>

</head>

<body>

    <div class="">
        <div class="drawer lg:drawer-open">
            <input id="my-drawer-2" type="checkbox" class="drawer-toggle" />
            <div class="drawer-content flex flex-col">
                <?php include 'navbar.php'; ?>
                <!-- Page content here -->

                <div class="flex items-center justify-center p-6">
                    <div class="w-full max-w-7xl mt-6 border bg-white shadow-lg rounded-lg">
                        <div class="p-4 border-b border-gray-200">
                            <h2 class="text-2xl font-bold text-gray-800">All Bus Information</h2>
                        </div>
                        <div class="overflow-x-auto">
                            <table class="min-w-full divide-y divide-gray-200 text-sm">
                                <thead class="bg-gray-50">
                                    <tr>
                                        <th class="px-4 py-2 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Bus Code</th>
                                        <th class="px-4 py-2 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Boarding Location</th>
                                        <th class="px-4 py-2 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Departure Location</th>
                                        <th class="px-4 py-2 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Seat Capacity</th>
                                        <th class="px-4 py-2 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Coach Type</th>
                                        <th class="px-4 py-2 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Bus Type</th>
                                        <th class="px-4 py-2 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Route</th>
                                        <th class="px-4 py-2 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Max Price</th>
                                        <th class="px-4 py-2 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">Actions</th>
                                    </tr>
                                </thead>
                                <tbody class="bg-white divide-y divide-gray-200">
                                    <?php
                                    // Dynamically generate table rows
                                    while ($row = $result->fetch_assoc()) {
                                        echo "<tr>";
                                        echo "<td class='px-4 py-2 text-gray-700'>{$row['bus_code']}</td>";
                                        echo "<td class='px-4 py-2 text-gray-700'>{$row['source_location']}</td>";
                                        echo "<td class='px-4 py-2 text-gray-700'>{$row['end_location']}</td>";
                                        echo "<td class='px-4 py-2 text-gray-700'>{$row['capacity']}</td>";
                                        echo "<td class='px-4 py-2 text-gray-700'>{$row['coach_type']}</td>";
                                        echo "<td class='px-4 py-2 text-gray-700'>{$row['bus_type']}</td>";
                                        echo "<td class='px-4 py-2 text-gray-700'>{$row['via_road']}</td>";
                                        echo "<td class='px-4 py-2 text-gray-700'>{$row['max_price']}</td>";
                                        echo "<td class='px-4 py-2 text-center'>
                                                <a href='.php?id={$row['bus_code']}' class='px-3 py-1 bg-blue-500 text-white rounded-lg text-xs hover:bg-blue-600'>Edit</a>
                                                <a href='adminDeleteBus.php?id={$row['bus_code']}' onclick='return confirm(\"Are you sure you want to delete this Bus Info?\")' class='px-3 py-1 bg-red-500 text-white rounded-lg text-xs hover:bg-red-600'>Delete</a>
                                            </td>";
                                    }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                        <div class="p-4 border-t border-gray-200">
                            <p class="text-sm text-gray-600">Total Bus: <span class="font-bold"><?php echo $result->num_rows; ?></span></p>
                        </div>
                    </div>
                </div>

                <div class="flex items-center justify-center p-6">
                    <div class="w-full max-w-7xl mt-6 border bg-white shadow-lg rounded-lg">
                        <div class="p-4 border-b border-gray-200">
                            <h2 class="text-2xl font-bold text-gray-800">All Bus Stops</h2>
                        </div>
                        <div class="overflow-x-auto">
                            <table class="min-w-full divide-y divide-gray-200 text-sm">
                                <thead class="bg-gray-50">
                                    <tr>
                                        <th class="px-4 py-2 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">ID</th>
                                        <th class="px-4 py-2 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Bus Code</th>
                                        <th class="px-4 py-2 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Location</th>
                                        <th class="px-4 py-2 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Time 1</th>
                                        <th class="px-4 py-2 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Time 2</th>
                                        <th class="px-4 py-2 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Location Level</th>
                                        <th class="px-4 py-2 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Point Location</th>
                                    </tr>
                                </thead>
                                <tbody class="bg-white divide-y divide-gray-200">
                                    <?php

                                    // Dynamically generate table rows
                                    while ($row = $result2->fetch_assoc()) {
                                        echo "<tr>";
                                        echo "<td class='px-4 py-2 text-gray-700'>{$row['id']}</td>";
                                        echo "<td class='px-4 py-2 text-gray-700'>{$row['bus_code']}</td>";
                                        echo "<td class='px-4 py-2 text-gray-700'>{$row['location']}</td>";
                                        echo "<td class='px-4 py-2 text-gray-700'>{$row['time_1']}</td>";
                                        echo "<td class='px-4 py-2 text-gray-700'>{$row['time_2']}</td>";
                                        echo "<td class='px-4 py-2 text-gray-700'>{$row['location_level']}</td>";
                                        echo "<td class='px-4 py-2 text-gray-700'>{$row['point_location']}</td>";
                                    }

                                    ?>
                                </tbody>
                            </table>
                        </div>
                        <div class="p-4 border-t border-gray-200">
                            <p class="text-sm text-gray-600">Total: <span class="font-bold"><?php echo $result2->num_rows; ?></span></p>
                        </div>
                    </div>
                </div>

                <div class="flex items-center justify-center mt-3 mb-12 gap-6">
                    <button class="btn w-[30%] btn-outline btn-success shadow-xl"><a href="adminAddBus.php">Add Bus</a></button>
                    <button class="btn w-[30%] btn-outline btn-success shadow-xl"><a href="adminAddBusStop.php">Add Bus Stop</a></button>
                </div>

            </div>

            <div class="drawer-side">
                <label for="my-drawer-2" aria-label="close sidebar" class="drawer-overlay"></label>
                <div class="menu bg-gray-800 text-white min-h-full w-80">
                    <!-- Sidebar content here -->
                    <p class="text-4xl btn btn-ghost font-extrabold text-center"><a href="adminPanel.php">Master Admin</a></p>
                    <p class="text-center">P Paribahan</p>
                    <hr class="my-4">
                    <?php include 'adminSideBarOptions.php'; ?>
                </div>
            </div>
        </div>
    </div>

    <?php include 'footer.php'; ?>
</body>

</html>