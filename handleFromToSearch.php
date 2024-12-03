<?php

//session_start();
//include 'header.php';
if (session_status() === PHP_SESSION_NONE) {
    session_start(); // Start session only if not already started
}
include 'connection.php';
$user_id;
$admin_id;
date_default_timezone_set('Asia/Dhaka');
if (isset($_SESSION['loggedIn']) && $_SESSION['loggedIn'] == true) {
    // Placeholder for any session-related actions
    if (isset($_SESSION['user_id'])) {
        $user_id = $_SESSION['user_id'] ?? null;

    } elseif (isset($_SESSION['admin_id'])) {
        $admin_id = $_SESSION['admin_id'] ?? null;

    } else {
        header('Location: loginForm.php');
        exit();
    }

    $from = $_POST['from'];
    $to = $_POST['to'];
    $date = $_POST['date'];
    $_SESSION['bus_date'] = $date;
    $coach_type= $_POST['coach_type'];

    $today = date('Y-m-d');
    if ($date < $today) //if user selects a date before today then show error message
    {
       // echo "Invalid Date";
        //exit();
        header('Location: invalidDate.php');
    }


    //check is bus available on that date
    function checkTable($tableName)
    {
        global $conn;

        $query = "SELECT COUNT(*) 
              FROM information_schema.tables 
              WHERE table_schema = DATABASE() 
              AND table_name = '$tableName'";

        $result = $conn->query($query);
        $row = $result->fetch_row();

        return $row[0] > 0;
    }
    $formattedDate = (new DateTime($date))->format('Y_m_d');
    $bus_available = checkTable($formattedDate);

    $sql = "SELECT b.bus_code as bus_code,b.capacity as capacity, f.location as from_location, f.time_1 as from_time_1, f.time_2 as from_time_2, 
               f.point_location as from_point_location, f.location_level as from_location_level, 
               t.location as to_location, t.time_1 as to_time_1, t.time_2 as to_time_2, 
               t.point_location as to_point_location, t.location_level as to_location_level, 
               b.source_location as source_location, b.end_location as end_location, 
               b.coach_type as coach_type, b.bus_type as bus_type, b.max_price as price, b.via_road as via_road 
        FROM (SELECT * FROM bus_stop WHERE location='$from') AS f 
        INNER JOIN (SELECT * FROM bus_stop WHERE location='$to') AS t 
        ON f.bus_code = t.bus_code 
        INNER JOIN bus AS b ON f.bus_code = b.bus_code where b.coach_type='$coach_type'";

    $result = $conn->query($sql);
    function validBusTime($time1, $time2, $date)
    {

        $todayDate = date('Y-m-d'); // Get the current time
        if ($date === $todayDate) {
            $currentTime = date('H:i:s'); // Get the current time
            if ($currentTime >= $time1 && $currentTime <= $time2) {
                return false;
            } elseif ($currentTime > $time1 && $currentTime > $time2) {
                return false;
            } elseif ($currentTime < $time1 && $currentTime < $time2) {
                return true;
            }
        } else {
            return true;
        }
    }
    if ($result->num_rows > 0 && $bus_available) {

        ?>
        <!DOCTYPE html>
        <html lang="en">

        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Home</title>

            <link href="https://cdn.jsdelivr.net/npm/daisyui@4.6.0/dist/full.min.css" rel="stylesheet" type="text/css" />
            <script src="https://cdn.tailwindcss.com"></script>

            <link rel="preconnect" href="https://fonts.googleapis.com">
            <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
            <link
                href="https://fonts.googleapis.com/css2?family=Inter:slnt,wght@-10..0,100..900&family=Raleway:ital,wght@0,100..900;1,100..900&display=swap"
                rel="stylesheet">

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
            <?php include 'navbar.php'; ?>
            <?php
            // Fetch and display the results in a table format 
            while ($row = $result->fetch_assoc()) {


                $capacity = $row['capacity'];

                $bus_code = $row['bus_code'];
                $from_location = $row['from_location'];



                $from_time_1 = $row['from_time_1'];
                $from_time_2 = $row['from_time_2'];
                $to_location = $row['to_location'];


                $to_time_1 = $row['to_time_1'];
                $to_time_2 = $row['to_time_2'];
                $from_point_location = $row['from_point_location'];
                $to_point_location = $row['to_point_location'];
                $source_location = $row['source_location'];
                $end_location = $row['end_location'];
                $coach_type = $row['coach_type'];
                $bus_type = $row['bus_type'];
                $price = $row['price'];
                $from_location_level = $row['from_location_level'];
                $to_location_level = $row['to_location_level'];
                $via_road = $row['via_road'];

                // Initialize final times
                $final_from_time = '';
                $final_to_time = '';

                if ($from_location_level < $to_location_level) {
                    $final_from_time = $from_time_1;
                    $final_to_time = $to_time_1;
                    //echo $final_from_time . " " . $final_to_time;
                } else if ($from_location_level > $to_location_level) {
                    $final_from_time = $from_time_2;
                    $final_to_time = $to_time_2;
                    // echo $final_from_time . " " . $final_to_time;
                } else {
                    // Optional: handle case where levels are equal
                    $final_from_time = $from_time_1;
                    $final_to_time = $to_time_1;
                }



                $new_sql = "SELECT COUNT(location) AS location_count FROM bus_stop WHERE bus_code = '$bus_code' GROUP BY bus_code";

                $new_result = $conn->query($new_sql);
                $new_row = $new_result->fetch_assoc();
                $location_count = $new_row['location_count'] ? $new_row['location_count'] : 1;

                $per_stop_price = round(($price / ($location_count - 1)));
                $total_price = $per_stop_price * abs($from_location_level - $to_location_level);

                $queryParams = [

                    'user_id' => $user_id,
                    'admin_id' => $admin_id ?? null,
                    'bus_code' => $bus_code,
                    'capacity' => $capacity,
                    'date' => $date,
                    'price' => $total_price,
                    'from' => $from_location,
                    'to' => $to_location,
                    'from_final_time' => $final_from_time,
                    'to_final_time' => $final_to_time,
                    'coach_type' => $coach_type,
                    'via_road' => $via_road,
                    'from_point_location' => $from_point_location
                ];
                // print_r($queryParams);
    
                ?>




                <?php if (validBusTime($final_from_time, $final_to_time, $date)) { ?>


                    <div class="flex-1 space-y-6">
                        <!-- Single Result -->

                        <div class="bg-white shadow-md w-[60%] mx-auto border border-gray-300 mb-4 p-4 rounded">
                            <div class="flex items-center justify-between">
                                <div class="text-xl font-medium">
                                    <?= $final_from_time ?>
                                </div>
                                <div class="text-gray-500"><?= $coach_type ?></div>
                            </div>
                            <div class="text-sm text-gray-500 mt-1 flex items-center">
                                <span class="flex items-center space-x-1">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-gray-500" fill="none"
                                        viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M4 16s1-1 4-1 4 1 4 1M4 8s1 1 4 1 4-1 4-1M12 6h8m-8 12h8" />
                                    </svg>
                                    <span>Single Deck</span>
                                </span>
                                <span class="mx-2">|</span>
                                <span><?= $via_road ?></span>
                            </div>
                            <div class="flex items-center justify-between mt-4 text-sm">
                                <div>
                                    <span class="text-gray-500">
                                        <?= $from_location ?></span>

                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-500 inline mx-1"
                                        viewBox="0 0 20 20" fill="currentColor">
                                        <path fill-rule="evenodd"
                                            d="M10.293 15.707a1 1 0 001.414 0l7-7a1 1 0 00-1.414-1.414L11 13.586V3a1 1 0 10-2 0v10.586l-5.293-5.293a1 1 0 00-1.414 1.414l7 7z"
                                            clip-rule="evenodd" />
                                    </svg>
                                    <span class="text-gray-500">
                                        <?= $to_location ?></span>
                                </div>
                                <div class="text-sm text-gray-500">
                                    <?= $_POST['date'] ?>
                                </div>
                            </div>
                            <div class="flex items-center justify-between mt-6">
                                <div>
                                    <div class="text-gray-500 text-sm">Price Per Seat</div>
                                    <div class="text-lg font-bold text-gray-700">BDT <?= $total_price ?></div>
                                </div>
                                <div>
                                    <a href="ticketPanel.php?info=<?= base64_encode(json_encode($queryParams)) ?>&& fVisitPage=1"
                                        class="bg-red-500 text-white px-6 py-2 rounded hover:bg-red-600 flex items-center space-x-2">
                                        <button
                                            class="bg-red-500 text-white px-6 py-2 rounded hover:bg-red-600 flex items-center space-x-2">
                                            <span>View Seats</span>
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20"
                                                fill="currentColor">
                                                <path
                                                    d="M16.707 10.707a1 1 0 010-1.414L18.586 7H12a1 1 0 010-2h6.586l-1.879-1.879a1 1 0 111.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" />
                                            </svg>
                                        </button>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>



                    <?php
                } else {
                    //echo "No Bus Found";
                    header('Location: noBusFound.php');
                }
            }
    } else {
        header('Location: noBusFound.php');
    }

} else {
    header('Location: loginForm.php');
}


?>
</body>

</html>


<?php
include 'footer.php';
?>