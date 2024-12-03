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

                <div class="flex flex-wrap mt-12 gap-6 w-full justify-center p-6">
                    <!-- Users Card -->
                    <div class="card w-72 bg-indigo-600 text-white shadow-md p-4 rounded-lg">
                        <div class="text-2xl font-bold">26K</div>
                        <div class="text-sm">
                            <span class="text-red-400">(-12.4% ↓)</span>
                        </div>
                        <div class="text-lg mt-2">Users</div>
                        <div class="mt-4">
                            <canvas id="usersChart" height="50"></canvas>
                        </div>
                    </div>

                    <!-- Income Card -->
                    <div class="card w-72 bg-blue-500 text-white shadow-md p-4 rounded-lg">
                        <div class="text-2xl font-bold">$6,200</div>
                        <div class="text-sm">
                            <span class="text-green-400">(40.9% ↑)</span>
                        </div>
                        <div class="text-lg mt-2">Income</div>
                        <div class="mt-4">
                            <canvas id="incomeChart" height="50"></canvas>
                        </div>
                    </div>

                    <!-- Conversion Rate Card -->
                    <div class="card w-72 bg-yellow-500 text-white shadow-md p-4 rounded-lg">
                        <div class="text-2xl font-bold">2.49%</div>
                        <div class="text-sm">
                            <span class="text-green-400">(84.7% ↑)</span>
                        </div>
                        <div class="text-lg mt-2">Conversion Rate</div>
                        <div class="mt-4">
                            <canvas id="conversionChart" height="50"></canvas>
                        </div>
                    </div>

                    <!-- Sessions Card -->
                    <div class="card w-72 bg-red-500 text-white shadow-md p-4 rounded-lg">
                        <div class="text-2xl font-bold">44K</div>
                        <div class="text-sm">
                            <span class="text-red-900">(-23.6% ↓)</span>
                        </div>
                        <div class="text-lg mt-2">Sessions</div>
                        <div class="mt-4">
                            <canvas id="sessionsChart" height="50"></canvas>
                        </div>
                    </div>
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