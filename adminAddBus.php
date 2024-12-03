<?php

include('connection.php');

if (session_status() === PHP_SESSION_NONE) {
    session_start(); // Start session only if not already started
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
                <div class="min-h-screen flex items-center justify-center bg-gray-100">
                    <form class="w-full max-w-[50%] bg-white shadow-lg rounded-lg p-8 space-y-6" id="addBusForm" method="POST" action="adminAddBusHandle.php">
                        <h2 class="text-2xl font-bold text-center text-gray-800">Add a New Bus</h2>

                        <div class="grid grid-cols-2 gap-6">
                            <!-- Bus Code -->
                            <div class="form-control">
                                <label for="busCode" class="label text-gray-600 font-medium">Bus Code</label>
                                <input type="text" id="busCode" name="bus_code" placeholder="Enter bus code" class="input input-bordered border-gray-300 w-full rounded-lg" required>
                            </div>

                            <!-- Boarding Location -->
                            <div class="form-control">
                                <label for="boardingLocation" class="label text-gray-600 font-medium">Boarding Location</label>
                                <input type="text" id="boardingLocation" name="source_location" placeholder="Enter boarding location" class="input input-bordered border-gray-300 w-full rounded-lg" required>
                            </div>

                            <!-- Departure Location -->
                            <div class="form-control">
                                <label for="departureLocation" class="label text-gray-600 font-medium">Departure Location</label>
                                <input type="text" id="departureLocation" name="end_location" placeholder="Enter departure location" class="input input-bordered border-gray-300 w-full rounded-lg" required>
                            </div>

                            <!-- Seat Capacity -->
                            <div class="form-control">
                                <label for="seatCapacity" class="label text-gray-600 font-medium">Seat Capacity</label>
                                <input type="number" id="seatCapacity" name="capacity" placeholder="Enter seat capacity" class="input input-bordered border-gray-300 w-full rounded-lg" required>
                            </div>

                            <!-- Coach Type -->
                            <div class="form-control">
                                <label for="coachType" class="label text-gray-600 font-medium">Coach Type</label>
                                <select id="coachType" name="coach_type" class="select select-bordered border-gray-300 w-full rounded-lg" required>
                                    <option disabled selected>Select coach type</option>
                                    <option value="AC">AC</option>
                                    <option value="Non-AC">Non-AC</option>
                                </select>
                            </div>

                            <!-- Bus Type -->
                            <div class="form-control">
                                <label for="busType" class="label text-gray-600 font-medium">Bus Type</label>
                                <select id="busType" name="bus_type" class="select select-bordered border-gray-300 w-full rounded-lg" required>
                                    <option disabled selected>Select bus type</option>
                                    <option value="Business-Class">Business Class</option>
                                    <option value="Economy-Class">Economy Class</option>
                                </select>
                            </div>

                            <!-- Via Road -->
                            <div class="form-control">
                                <label for="viaRoad" class="label text-gray-600 font-medium">Via Road</label>
                                <input type="text" id="viaRoad" name="via_road" placeholder="Enter route" class="input input-bordered border-gray-300 w-full rounded-lg" required>
                            </div>

                            <!-- Max Price -->
                            <div class="form-control">
                                <label for="maxPrice" class="label text-gray-600 font-medium">Max Price</label>
                                <input type="number" id="maxPrice" name="max_price" placeholder="Enter maximum price" class="input input-bordered border-gray-300 w-full rounded-lg" required>
                            </div>
                        </div>

                        <!-- Submit Button -->
                        <div class="form-control mt-6">
                            <button type="submit" class="btn bg-blue-500 text-white w-full text-lg font-semibold py-2 rounded-lg hover:bg-blue-600">
                                Add Bus
                            </button>
                        </div>
                    </form>
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