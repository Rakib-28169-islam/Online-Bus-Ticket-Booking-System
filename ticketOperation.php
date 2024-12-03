<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/daisyui@4.6.0/dist/full.min.css" rel="stylesheet" type="text/css" />
    <script src="https://cdn.tailwindcss.com"></script>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Inter:slnt,wght@-10..0,100..900&family=Raleway:ital,wght@0,100..900;1,100..900&display=swap"
        rel="stylesheet">
</head>

<body>
    <main>
        <?php
        date_default_timezone_set('Asia/Dhaka');
        session_start();
        include 'connection.php';
        include 'navbar.php';

        // Initialize seats information
        $seats_information = [];

        if (isset($_SESSION['loggedIn']) && $_SESSION['loggedIn'] === true) {
            $user_id = $_SESSION['user_id'];

            $today_date = date('Y-m-d');

            if (!isset($user_id)) {
                header('Location: loginForm.php');
                exit();
            }

            // Process search request
            if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['bus_code'], $_POST['date'])) {
                $date = $_POST['date'];
                $bus_code = $_POST['bus_code'];

                // Format the table name
                $table_name = (new DateTime($date))->format('Y_m_d');
                $_SESSION['refund_table_name'] = $table_name;
                $_SESSION['refund_bus_code'] = $bus_code;
                $_SESSION['refund_user_id'] = $user_id;

                // Fetch booked seats
                $sql = "SELECT bus_code, seat_name, booked_date, name 
                FROM `$table_name` 
                WHERE booked_user_id = ? AND bus_code = ?";

                $stmt = $conn->prepare($sql);
                $stmt->bind_param("is", $user_id, $bus_code);
                $stmt->execute();
                $result = $stmt->get_result();

                if (!$result) {
                    echo "Error: " . $conn->error;
                } elseif ($result->num_rows > 0) {
                    $_SESSION['booked_seats'] = $result->fetch_all(MYSQLI_ASSOC);
                    $seats_information = $_SESSION['booked_seats'];

                    // Determine refund eligibility
                    foreach ($seats_information as &$seat) {
                        $futureDateTableFormatted = $table_name;
                        $futureDate = DateTime::createFromFormat("Y_m_d", $futureDateTableFormatted)->format("Y-m-d");
                        $refundDeadline = date("Y-m-d", strtotime($futureDate . " -2 days"));
                        $presentDate = date("Y-m-d");

                        $seat['refund'] = $refundDeadline >= $presentDate ? 1 : 0;
                    }
                } else {
                    echo "<p>No data found for the given date and bus code.</p>";
                }
                $stmt->close();
            }
            // Process refund request
            elseif (isset($_POST['refund'])) {
                $seat_name = $_POST['refund'];
                $bus_code = $_SESSION['refund_bus_code'];
                $table_name = $_SESSION['refund_table_name'];

                $sql = "UPDATE `$table_name` 
                SET status = 'free', booked_date = NULL, booked_user_id = NULL, name = NULL, email = NULL, phone_number = NULL 
                WHERE bus_code = ? AND seat_name = ? AND booked_user_id = ?";

                $stmt = $conn->prepare($sql);
                $stmt->bind_param("ssi", $bus_code, $seat_name, $user_id);

                if ($stmt->execute()) {
                    echo "<script>alert('Refund Successful');</script>";
                } else {
                    echo "<p>Refund failed: " . $conn->error . "</p>";
                }
                $stmt->close();
            }
        } else {
            header('Location: loginForm.php');
            exit();
        }
        //include 'header.php';
        ?>

        <!-- Main Content -->
        <main class="container mx-auto my-8 border bg-white p-6 rounded-md shadow-md">
            <h1 class="text-2xl font-bold text-red-500 mb-4">Ticket Operation</h1>

            <div class="bg-green-100 text-green-700 p-4 rounded-md mb-6">
                <p>✅ Enter your Bus Code and Exact Date, then click Search to view your ticket details.</p>
                <p>✅ You can cancel tickets (if applicable), resend emails, or print ticket details.</p>
            </div>

            <form method="POST" action="" class="flex flex-col md:flex-row space-y-4 md:space-y-0 md:space-x-4">
                <input type="text" name="bus_code" placeholder="Bus Code"
                    class="flex-1 px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-red-400"
                    required>
                <input type="date" name="date" id="date"
                    class="flex-1 px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-red-400"
                    required>
                <button type="submit"
                    class="bg-red-500 text-white px-6 py-2 rounded-md hover:bg-red-600 transition">Search</button>
            </form>

            <?php if (!empty($seats_information)) { ?>
                <div class="mt-8">
                    <table class="w-full border-collapse border border-gray-300 text-left">
                        <thead class="bg-red-500 text-white">
                            <tr>
                                <th class="p-3 border border-gray-300">Bus Code</th>
                                <th class="p-3 border border-gray-300">Seat</th>
                                <th class="p-3 border border-gray-300">Booked Date</th>
                                <th class="p-3 border border-gray-300">Name</th>
                                <th class="p-3 border border-gray-300">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($seats_information as $seat) { ?>
                                <tr class="odd:bg-gray-100 even:bg-white">
                                    <td class="p-3 border border-gray-300"><?= htmlspecialchars($seat['bus_code']) ?></td>
                                    <td class="p-3 border border-gray-300"><?= htmlspecialchars($seat['seat_name']) ?></td>
                                    <td class="p-3 border border-gray-300"><?= htmlspecialchars($seat['booked_date']) ?></td>
                                    <td class="p-3 border border-gray-300"><?= htmlspecialchars($seat['name']) ?></td>
                                    <td class="p-3 border border-gray-300">
                                        <?php if ($seat['refund']) { ?>
                                            <form action="" method="POST">
                                                <button type="submit" name="refund"
                                                    value="<?= htmlspecialchars($seat['seat_name']) ?>"
                                                    class="bg-red-500 text-white px-3 py-1 rounded-md hover:bg-red-600">Refund</button>
                                            </form>
                                        <?php } else { ?>
                                            <button class="bg-gray-500 text-white px-3 py-1 rounded-md cursor-not-allowed"
                                                disabled>Not Refundable</button>
                                        <?php } ?>
                                    </td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            <?php } ?>
        </main>
</body>

</html>



<?php include 'footer.php'; ?>