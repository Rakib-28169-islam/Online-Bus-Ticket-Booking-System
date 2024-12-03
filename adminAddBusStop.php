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
                    <form class="w-full max-w-[50%] bg-white shadow-lg rounded-lg p-8 space-y-6" id="addBusStopForm" method="POST" action="adminAddBusStopHandle.php">
                        <h2 class="text-2xl font-bold text-center text-gray-800">Add a New Bus Stop</h2>

                        <div class="grid grid-cols-2 gap-6">
                            
                            <!-- Bus Code -->
                            <div class="form-control">
                                <label for="busCode" class="label text-gray-600 font-medium">Bus Code</label>
                                <input type="text" id="busCode" name="bus_code" placeholder="Enter bus code" class="input input-bordered border-gray-300 w-full rounded-lg" required>
                            </div>

                            <!-- Location -->
                            <div class="form-control">
                                <label for="location" class="label text-gray-600 font-medium">Location</label>
                                <input type="text" id="location" name="location" placeholder="Enter stop location" class="input input-bordered border-gray-300 w-full rounded-lg" required>
                            </div>

                            <!-- Time 1 -->
                            <div class="form-control">
                                <label for="time1" class="label text-gray-600 font-medium">Time 1</label>
                                <input type="time" id="time1" name="time_1" class="input input-bordered border-gray-300 w-full rounded-lg" required>
                            </div>

                            <!-- Time 2 -->
                            <div class="form-control">
                                <label for="time2" class="label text-gray-600 font-medium">Time 2</label>
                                <input type="time" id="time2" name="time_2" class="input input-bordered border-gray-300 w-full rounded-lg" required>
                            </div>

                            <!-- Location Level -->
                            <div class="form-control">
                                <label for="locationLevel" class="label text-gray-600 font-medium">Location Level</label>
                                <input type="number" id="locationLevel" name="location_level" class="input input-bordered border-gray-300 w-full rounded-lg" required>
                            </div>

                            <!-- Point Location -->
                            <div class="form-control">
                                <label for="pointLocation" class="label text-gray-600 font-medium">Point Location</label>
                                <input type="text" id="pointLocation" name="point_location" placeholder="Enter point location" class="input input-bordered border-gray-300 w-full rounded-lg" required>
                            </div>
                        </div>

                        <!-- Submit Button -->
                        <div class="form-control mt-6">
                            <button type="submit" class="btn bg-green-500 text-white w-full text-lg font-semibold py-2 rounded-lg hover:bg-green-600">
                                Add Bus Stop
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