<?php
include('connection.php');

if (session_status() === PHP_SESSION_NONE) {
    session_start(); // Start session only if not already started
}

if (!isset($_SESSION['admin_id'])) {
    header('Location: loginForm.php');
    exit();
}

// Check if the user ID is set
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Fetch user data
    $query = "SELECT * FROM user WHERE id = $id";
    $result = $conn->query($query);

    if ($result->num_rows == 1) {
        $user = $result->fetch_assoc();
    } else {
        die("User not found.");
    }
}

// Handle form submission
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = $_POST['email'];
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $username = $_POST['user_name'];
    $phone = $_POST['phone'];

    $update_query = "UPDATE user SET 
        email = '$email',
        first_name = '$first_name',
        last_name = '$last_name',
        user_name = '$username',
        phone = '$phone'
        WHERE id = $id";

    if ($conn->query($update_query)) {
        header("Location: adminCheckUserInfo.php");
        exit();
    } else {
        echo "Error updating user: " . $conn->error;
    }
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

                <div class="flex justify-center mt-12">
                    <div class="w-full max-w-md bg-white border border-gray-200 rounded-lg shadow-lg">
                        <div class="p-6 border-b border-gray-200">
                            <h2 class="text-xl font-bold text-gray-800">Edit User Details</h2>
                            <p class="text-sm text-gray-600">Update the details below and save changes.</p>
                        </div>

                        <form method="POST" class="p-6 space-y-4">
                            <!-- Email -->
                            <div>
                                <label class="block text-sm font-medium text-gray-700" for="email">Email</label>
                                <input type="email" id="email" name="email" value="<?php echo $user['email']; ?>"
                                    class="mt-1 w-full px-3 py-2 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-400 focus:border-blue-400">
                            </div>
                            <!-- First Name -->
                            <div>
                                <label class="block text-sm font-medium text-gray-700" for="first_name">First Name</label>
                                <input type="text" id="first_name" name="first_name" value="<?php echo $user['first_name']; ?>"
                                    class="mt-1 w-full px-3 py-2 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-400 focus:border-blue-400">
                            </div>
                            <!-- Last Name -->
                            <div>
                                <label class="block text-sm font-medium text-gray-700" for="last_name">Last Name</label>
                                <input type="text" id="last_name" name="last_name" value="<?php echo $user['last_name']; ?>"
                                    class="mt-1 w-full px-3 py-2 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-400 focus:border-blue-400">
                            </div>
                            <!-- Username -->
                            <div>
                                <label class="block text-sm font-medium text-gray-700" for="user_name">Username</label>
                                <input type="text" id="user_name" name="user_name" value="<?php echo $user['user_name']; ?>"
                                    class="mt-1 w-full px-3 py-2 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-400 focus:border-blue-400">
                            </div>
                            <!-- Phone -->
                            <div>
                                <label class="block text-sm font-medium text-gray-700" for="phone">Phone</label>
                                <input type="text" id="phone" name="phone" value="<?php echo $user['phone']; ?>"
                                    class="mt-1 w-full px-3 py-2 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-400 focus:border-blue-400">
                            </div>
                            <!-- Submit Button -->
                            <div class="pt-4">
                                <button type="submit"
                                    class="w-full bg-blue-500 text-white font-medium py-2 px-4 rounded-lg shadow-md hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-400 focus:ring-offset-2">
                                    Save Changes
                                </button>
                            </div>
                        </form>
                    </div>
                </div>

            </div>

            <div class="drawer-side">
                <label for="my-drawer-2" aria-label="close sidebar" class="drawer-overlay"></label>
                <div class="menu bg-gray-800 text-white min-h-full w-80">
                    <!-- Sidebar content here -->
                    <p class="text-4xl btn btn-ghost font-extrabold text-center"><a href="adminPanel.php">Master Admin</a>
                    </p>
                    <p class="text-center">P Paribahan</p>
                    <hr class="my-4">
                    <?php include 'adminSideBarOptions.php'; ?>
                </div>
            </div>
        </div>
    </div>
</body>

</html>