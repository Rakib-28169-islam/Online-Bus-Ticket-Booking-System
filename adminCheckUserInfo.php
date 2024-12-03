<?php
// Include the connection file
include('connection.php');

// Fetch data from the 'user' table
$query = "SELECT * FROM user";
$result = $conn->query($query);

if (!$result) {
    die("Query Failed: " . $conn->error);
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

                <?php include 'userTable.php'; ?>
<!-- 
                <div class="flex items-center justify-center p-6">
                    <div class="w-full max-w-7xl mt-6 border bg-white shadow-lg rounded-lg">
                        <div class="p-4 border-b border-gray-200">
                            <h2 class="text-2xl font-bold text-gray-800">User Information</h2>
                        </div>
                        <div class="overflow-x-auto">
                            <table class="min-w-full divide-y divide-gray-200 text-sm">
                                <thead class="bg-gray-50">
                                    <tr>
                                        <th class="px-4 py-2 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">ID</th>
                                        <th class="px-4 py-2 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Email</th>
                                        <th class="px-4 py-2 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">First Name</th>
                                        <th class="px-4 py-2 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Last Name</th>
                                        <th class="px-4 py-2 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Username</th>
                                        <th class="px-4 py-2 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Phone</th>
                                        <th class="px-4 py-2 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Date of Signup</th>
                                        <th class="px-4 py-2 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Last Login</th>
                                        <th class="px-4 py-2 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">Actions</th>
                                    </tr>
                                </thead>
                                <tbody class="bg-white divide-y divide-gray-200">
                                    <?php
                                    /*
                                    // Dynamically generate table rows
                                    while ($row = $result->fetch_assoc()) {
                                        echo "<tr>";
                                        echo "<td class='px-4 py-2 text-gray-700'>{$row['id']}</td>";
                                        echo "<td class='px-4 py-2 text-gray-700'>{$row['email']}</td>";
                                        echo "<td class='px-4 py-2 text-gray-700'>{$row['first_name']}</td>";
                                        echo "<td class='px-4 py-2 text-gray-700'>{$row['last_name']}</td>";
                                        echo "<td class='px-4 py-2 text-gray-700'>{$row['user_name']}</td>";
                                        echo "<td class='px-4 py-2 text-gray-700'>{$row['phone']}</td>";
                                        echo "<td class='px-4 py-2 text-gray-700'>{$row['date_of_signup']}</td>";
                                        echo "<td class='px-4 py-2 text-gray-700'>{$row['last_login']}</td>";
                                        echo "<td class='px-4 py-2 text-center'>
                                                <a href='adminEditUser.php?id={$row['id']}' class='px-3 py-1 bg-blue-500 text-white rounded-lg text-xs hover:bg-blue-600'>Edit</a>
                                                <a href='adminDeleteUser.php?id={$row['id']}' onclick='return confirm(\"Are you sure you want to delete this user?\")' class='px-3 py-1 bg-red-500 text-white rounded-lg text-xs hover:bg-red-600'>Delete</a>
                                            </td>";
                                    }
                                    */
                                    ?>
                                </tbody>
                            </table>
                        </div>
                        <div class="p-4 border-t border-gray-200">
                            <p class="text-sm text-gray-600">Total Users: <span class="font-bold"><?php echo $result->num_rows; ?></span></p>
                        </div>
                    </div>
                </div>
 -->
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