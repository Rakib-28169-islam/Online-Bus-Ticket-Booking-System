<?php
session_start();
include 'connection.php';

$info = $_SESSION['info'];
//print_r($_SESSION['info']);



if (isset($_GET['confirm']) && $_GET['confirm'] == 'confirm') {

    /*
    foreach ($_SESSION as $key => $value) {
        if ($key == 'user_id') {
            continue;

        } elseif ($key == 'loggedIn') {
            continue;

        }elseif()
         else {
            unset($_SESSION[$key]);
        }
    }
        */
    unset($_SESSION['info']);
    unset($_SESSION['bus_code']);
    unset($_SESSION['capacity']);
    unset($_SESSION['bus_id']);
    unset($_SESSION['bus_name']);
    unset($_SESSION['bus_type']);
    unset($_SESSION['bus_code']);
    unset($_SESSION['from']);
    unset($_SESSION['to']);
    unset($_SESSION['from_point_location']);
    unset($_SESSION['to_point_location']);
    unset($_SESSION['from_final_time']);
    unset($_SESSION['to_final_time']);
    unset($_SESSION['total_price']);
    unset($_SESSION['booked_seats']);
    unset($_SESSION['price']);
    unset($_SESSION['pricePerSeat']);


    header('location:userHome.php');

}

?>
<!DOCTYPE html>
<html lang="en" data-theme="light">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bus Ticket</title>

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
    <!-- route details -->
    <div id="link-to-click" class="bg-white w-[58%] border border-green-400 shadow-2xl mx-auto rounded-3xl my-24 p-6 flex">

        <!-- Left section -->
        <div class="">
            <!-- Bus name and available seats button -->
            <div class="flex justify-between">

                <!-- bus logo and details -->
                <div class="flex gap-4">

                    <img class="w-20" src="https://i.ibb.co.com/d6gPsJw/bus-logo.png" alt="">

                    <div class="font-raleway">
                        <p class="text-3xl font-bold">P Paribahan</p>
                        <p class="text-[#03071299]"><?= $info['coach_type'] ?></p>
                    </div>

                </div>

                <!-- Available seats button 
                <div>
                    <button
                        class="btn bg-[#1DD1001A] text-[#1DD100] text-xl font-bold rounded-xl w-48 h-14 mx-auto flex-col">

                        <img src="https://i.ibb.co.com/kyRp4S7/seat-green.png" alt="">

                        <p>
                            <span id="available-seats">X</span> Seats left
                        </p>

                    </button>
                </div>  -->

            </div>

            <!-- Route details -->
            <div class="bg-[#F7F8F8] w-[808px] border mt-6 rounded-3xl p-8 font-raleway font-semibold text-lg">

                <!-- Route and <hr> -->
                <div class="flex justify-between mb-6">
                    <p class="text-[#03071299]">Route</p>
                    <p><?= $info['from'] ?> - <?= $info['to'] ?></p>
                </div>
                <hr class="border-[#03071233] border-dashed">

                <!-- Departure time and <hr> -->
                <div class="flex justify-between mt-6 mb-6">
                    <p class="text-[#03071299]">Departure Time</p>
                    <p><?= $info['from_final_time'] ?></p>
                </div>

                <!-- Seats and <hr> -->
                <div class="flex justify-between mt-6 mb-6">
                    <p class="text-[#03071299]">Seats</p>
                    <p class="btn bg-green-500 text-white font-extrabold font-inter">
                        <?php

                        foreach ($info['booked_seats'] as $seat) {
                            echo $seat['seat_name'] . "  ";
                        }

                        ?>
                    </p>
                </div>
                <hr class="border-[#03071233] border-dashed">


                <!-- Boarding, Departure, ETA buttons -->
                <div class="mt-6">
                    <button
                        class="btn w-52 h-14 bg-[#0307120D] rounded-xl bg-green-500 text-white ml-6 leading-5 font-bold">Boarding
                        Point - <br>
                        <?php echo $info['from'] . " - " . $info['from_point_location'] ?></button>
                    <button
                        class="btn w-52 h-14 bg-[#0307120D] rounded-xl bg-green-500 text-white ml-6 leading-5 font-bold">Departure
                        Point - <br>
                        <?php echo $info['to'] ?></button>
                    <button
                        class="btn w-52 h-14 bg-[#0307120D] rounded-xl bg-green-500 text-white relative top-2 ml-6 font-bold">Est.
                        Time -
                        <?= $info['to_final_time'] ?></button>
                </div>
            </div>
        </div>

        <!-- info divider -->
        <div class="divider divider-horizontal"></div>

        <!-- Right Section (Fare rate) -->
        <div class="flex flex-col justify-center font-raleway">
            <!-- Currency Image -->
            <img class="mx-auto" src="https://i.ibb.co.com/R6kPHx7/fare.png" alt="">
            <!-- Fare rate -->
            <div class="leading-10 mt-4 flex flex-col gap-4">
                <span class="font-bold mb-8 text-3xl">৳ <?= $info['total_price'] ?> Taka</span>
                <form method="GET" action="">
                    <button type="submit" name="confirm" value="confirm">
                        <span class="font-bold text-3xl">Return Home</span>
                    </button>

                </form>
            </div>

        </div>

    </div>

</body>
<?php include 'footer.php'; ?>

</html>