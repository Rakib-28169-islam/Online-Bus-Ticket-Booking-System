<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start(); // Start session only if not already started
}
include 'connection.php';
if (isset($_SESSION['loggedIn']) && $_SESSION['loggedIn'] === true) {
    //fetch bus_code-> bus seats from data base only at once not every refresh time
//$_SESSION['seats'] = NULL;
//echo isset($_GET['fVisitPage']) . "<br>";
//echo $_GET['info']."<br>";
//print_r($_SESSION['seats']);

    if (isset($_GET['fVisitPage'])) { //VERY IMPORTANT-----
        unset($_SESSION['seats']);
        unset($_SESSION['tmpSeats']);
        //echo !isset($_SESSION['seats']);
    }
    //print_r($_SESSION['seats']);
    if (!isset($_SESSION['seats'])) {

        //all important information in $info

        if (isset($_GET['info'])) {
            $infoString = $_GET['info'];
            $jsonString = base64_decode($infoString);
            $info = json_decode($jsonString, true);
            $_SESSION['info'] = $info;
            $_SESSION['info']['price'] = $_SESSION['info']['price'] ?? 0;

            //echo "ami seats ar tmp paisi";
            //print_r($info);
            //echo $info . "<br>";

        }


        //this data comes from handleFromToSearch.php file



        // echo "esece";
        $date = $_SESSION['info']['date'];
        $bus_code = $_SESSION['info']['bus_code'];
        $formattedDate = (new DateTime($date))->format('Y_m_d');
        $_SESSION['table_name'] = $formattedDate;

        $sql = "SELECT * FROM $formattedDate WHERE bus_code = $bus_code;";
        $result = $conn->query($sql);
        if (!$result) {
            die("SQL Error: " . $conn->error);
        }
        $_SESSION['seats'] = $result->fetch_all(MYSQLI_ASSOC);
        // print_r($_SESSION['seats']);
        $_SESSION['tmpSeats'] = [];

        //PRINT seats
        function printSeats($seats)
        {
            foreach ($seats as $seat) {
                echo $seat['seat_name'] . " ";
            }
        }
        //printSeats($_SESSION['seats']);


        $_SESSION['price'] = 0;
        $_SESSION['pricePerSeat'] = (int) $_SESSION['info']['price'] ?? (int) $_SESSION['price'];
        // echo $_SESSION['pricePerSeat']."  ".$_SESSION['price'];

        $_SESSION['visitFlag'] = true;
    } elseif (count($_SESSION['seats']) == 0) {
        $table = $_SESSION['table_name'];
        $bus_code = $_SESSION['bus_code'];

        $sql = "SELECT * FROM $table WHERE bus_code = $bus_code;";
        $result = $conn->query($sql);
        if (!$result) {
            die("SQL Error: " . $conn->error);
        }
        $_SESSION['seats'] = $result->fetch_all(MYSQLI_ASSOC);
        $_SESSION['tmpSeats'] = [];
    }



    if (isset($_GET['seat_name']) && $_SERVER['REQUEST_METHOD'] === 'GET') {
        $seat_name = $_GET['seat_name'];
        foreach ($_SESSION['seats'] as $seat) {
            if ($seat['seat_name'] === $seat_name) {
                // Check the current status from session or seat array
                $currentStatus = $_SESSION['tmpSeats'][$seat_name]['status'] ?? $seat['status'];

                if ($currentStatus === 'free') {
                    $seat['status'] = 'selected';
                    $_SESSION['tmpSeats'][$seat_name] = $seat;
                    $_SESSION['price'] += $_SESSION['pricePerSeat'];
                } elseif ($currentStatus === 'selected') {
                    $seat['status'] = 'free';
                    $_SESSION['price'] = $_SESSION['price'] - $_SESSION['pricePerSeat'] < 0 ? 0 : $_SESSION['price'] - $_SESSION['pricePerSeat'];
                    unset($_SESSION['tmpSeats'][$seat_name]); // Remove from tmpSeats
                }
            }
        }
    }
    // Update tmpSeats based on user interaction




    // Handle "Next" button submission to update the database
    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['updateSeats'])) {

        $name = "";
        $phone_number = "";
        $email = "";
        $bus_code = $_SESSION['info']['bus_code'];
        $table = $_SESSION['table_name'];
        if (isset($_POST['name']) && isset($_POST['phone_number']) && isset($_POST['email'])) {
            $name = $_POST['name'];
            $phone_number = $_POST['phone_number'];
            $email = $_POST['email'];
        } else {
            echo "<script>alert('Please fill all the fields');</script>";
        }
        foreach ($_SESSION['tmpSeats'] as $seat) {
            $seat_name = $seat['seat_name'];

            $updateSql = "UPDATE $table SET status = 'booked', booked_date = CURDATE(), booked_user_id = 1, name = '$name', phone_number = '$phone_number', email = '$email' WHERE bus_code = $bus_code AND seat_name = '$seat_name'";
            if (!$conn->query($updateSql)) {
                die("Database Update Error: " . $conn->error);
            }
        }
        // Clear tmpSeats after updating the database
        $_SESSION['info']['total_price'] = $_SESSION['price'];
        $_SESSION['info']['booked_seats'] = $_SESSION['tmpSeats'];
        $_SESSION['seats'] = [];

        echo "<script>alert('Seats successfully booked!');</script>";
        header("Location: finalTicket.php?info=" . base64_encode(json_encode($_SESSION['info'])));
    }



} else {

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
    <!-- Seat and Info interface (lower section) -->
    <div class="bg-white py-7 m-16 border border-green-300 z-10 max-w-[45.5%] mx-auto rounded-3xl flex">

        <!-- Left section (Seat interface and notations) -->
        <div class="pl-8 max-w-[670px]">

            <!-- seat notation -->
            <div class="max-w-[615px]">

                <p class="font-raleway text-2xl font-semibold pb-6">
                    Select Your Seat
                </p>

                <hr class="border-dashed border-[#03071233] pb-4">

                <div class="flex justify-between">

                    <div class="flex gap-2">
                        <img src="https://i.ibb.co.com/V3Qbpx8/seat-gray.png" alt="">
                        <p>Available</p>
                    </div>

                    <div class="flex gap-2">
                        <img src="https://i.ibb.co.com/Lkx0smr/seat-green-filled.png" alt="">
                        <p>Selected</p>
                    </div>

                </div>

                <hr class="border-dashed border-[#03071233] mt-4 mb-6">

            </div>

            <!-- steering wheel -->
            <div class="max-w-[615px] flex justify-end">
                <img class="pb-3" src="https://marvelous-melba-c6ea67.netlify.app/images/steering%20wheel.svg" alt="">
            </div>

            <!-- seats (A-H) -->
            <div class="font-inter text-lg font-medium grid grid-cols-5 gap-3">


                <!-- seats (1-8) -->
                <?php foreach ($_SESSION['seats'] as $seat): ?><!--$seats is from $SESSION['seats'] not data base -->

                    <?php

                    $currentStatus = isset($_SESSION['tmpSeats'][$seat['seat_name']])
                        ? $_SESSION['tmpSeats'][$seat['seat_name']]['status']
                        : $seat['status'];

                    $seatCol = $seat['seat_name'][1];//A B C D
                
                    //echo $seatCol;    
                    if ($_SESSION['info']['capacity'] == 24 && $seatCol == 'B') {
                        ?>

                        <button id="blank" class="seat btn no-animation bg-gray-50 border-none w-14 h-14"></button>

                        <?php
                    }

                    ?>

                    <?php if ($seat['seat_name'][1] == 'B' && $_SESSION['info']['capacity'] == 24) { ?>
                        <button id="blank" class="seat btn no-animation bg-gray-50 border-none w-14 h-14"></button>
                    <?php } elseif ($_SESSION['info']['capacity'] == 32 && $seat['seat_name'][1] == 'C') { ?>
                        <button id="blank" class="seat btn no-animation bg-gray-50 border-none w-14 h-14"></button>
                    <?php } ?>



                    <form method="GET" class="text-center">
                        <input type="hidden" name="seat_name" value="<?= $seat['seat_name'] ?>">
                        <button type="submit" id="<?= $seat['seat_name'] ?>" class="btn border border-green-300 w-14 h-14 text-[#03071280]
                                <?php if ($currentStatus === 'booked'): ?>
                                    bg-gray-300 text-gray-500 line-through cursor-not-allowed
                                <?php elseif ($currentStatus === 'free'): ?>
                                    bg-green-500 text-white hover:bg-green-600
                                <?php elseif ($currentStatus === 'selected'): ?>
                                    bg-blue-500 text-white hover:bg-blue-600
                                <?php endif; ?>" <?= $currentStatus === 'booked' ? 'disabled' : '' ?>>
                            <?= $seat['seat_name'] ?>
                        </button>

                    </form>
                <?php endforeach; ?>




            </div>

        </div>

        <!-- Seat divider line -->
        <div class="divider divider-horizontal"></div>

        <!-- Right section (Seat & customer info) -->
        <div class="w-[427px]">

            <!-- Select Your Seat notation -->
            <div>
                <p class="font-raleway text-2xl font-semibold pb-6">
                    Select Your Seat
                </p>

                <hr class="border-dashed border-[#03071233] pb-6">
            </div>

            <!-- seat info, coupons, total & grand total card -->
            <div class="bg-[#F7F8F8] rounded-xl font-inter pt-8 px-8 ">

                <!-- Seat -- Class -- Price bar -->
                <div class="flex justify-between">

                    <!-- Seat and availed Button -->
                    <div class="flex">
                        <p class="mr-1 text-base font-semibold">
                            Seat
                        </p>
                        <button class="btn btn-xs bg-[#1DD100] rounded-md text-white text-xs font-bold">
                            <span id="selected-seats"><?= count($_SESSION['tmpSeats']) ?></span>
                        </button>
                    </div>

                    <p class="text-base font-semibold relative right-4">Class</p>

                    <p class="text-base font-semibold">Price</p>

                </div>

                <hr class="my-4 border-dashed border-[#03071233]">


                <!-- no seat selected -->
                <?php if (empty($_SESSION['tmpSeats'])): ?>
                    <p id="no-seat" class="mb-4 font-raleway font-semibold text-center">No Seats Selected</p>
                <?php endif; ?>
                <!-- seat selected -->
                <?php foreach ($_SESSION['tmpSeats'] as $seat): ?>
                    <div class="flex justify-between pt-4">
                        <p class="text-base font-semibold"><?= $seat['seat_name'] ?></p>
                    </div>
                <?php endforeach; ?>


                <!-- Seats, prices, coupons & grandtotal -->
                <div>
                    <hr class="border-[#03071233] mb-4">

                    <!-- Total Price -->
                    <div class="flex justify-between mb-4">
                        <p class="font-semibold">Price Per Seat</p>
                        <p class="font-semibold">BDT <span id="total-price"><?= $_SESSION['pricePerSeat'] ?></span></p>
                    </div>

                    <!-- Grand Total -->
                    <div class="flex justify-between mt-6 pb-4">
                        <p class="font-semibold">Grand Total</p>
                        <p class="font-semibold">BDT <span id="grand-total"><?= $_SESSION['price'] ?></span></p>
                    </div>
                </div>

            </div>

            <!-- Passenger Info -->
            <form action="" method="POST">
                <div>

                    <!-- passenger name -->
                    <div class="py-4">
                        <p class="font-bold mb-3">Passenger Name*</p>
                        <label class="input input-bordered flex items-center gap-2 h-16 border-[#0307121A]">
                            <input required type="text" class="grow" name="name" placeholder="Enter your name" />
                        </label>
                    </div>

                    <!-- Phone number -->
                    <div>
                        <p class="font-bold mb-3">Phone Number*</p>
                        <label class="input input-bordered flex items-center gap-2 h-16 border-[#0307121A]">
                            <input required id="phone-input" type="number" name="phone_number" class="grow"
                                placeholder="Enter your phone number" />
                        </label>
                    </div>

                    <!-- Email ID -->
                    <div class="py-4">
                        <p class="font-bold mb-3">Email ID*</p>
                        <label class="input input-bordered flex items-center gap-2 h-16 border-[#0307121A]">
                            <input required type="email" name="email" class="grow" placeholder="Enter your email id" />
                        </label>
                    </div>

                    <!-- next button -->
                    <div>
                        <button id="next-btn" type="submit" name="updateSeats"
                            class="btn w-full h-16 bg-[#1DD100] font-raleway text-xl font-extrabold text-white">
                            Next
                        </button>
                    </div>

                </div>
            </form>


            <!-- Next button & Terms and conditions -->
            <div>
                <!-- Modal -->
                <dialog id="my_modal_4" class="modal">
                    <div class="modal-box w-[718px] h-[500px] max-w-5xl">
                        <div class="text-center">
                            <img class="mx-auto" src="images/success.png" alt="">
                            <p class="my-9 text-2xl font-bold">Success</p>
                            <div class="mb-12">
                                <p class="text-xl font-medium">
                                    Thank you for Booking Our Bus Seats. <br>
                                    We are working hard to find the best service and deals for you. <br>
                                </p>
                                <p class="text-xl font-light mt-4">Shortly you will find a confirmation in your email.
                                </p>
                            </div>
                        </div>
                        <div class="modal-action justify-center">
                            <form method="dialog">
                                <!-- if there is a button, it will close the modal -->
                                <button id="modal-btn"
                                    class="btn w-80 h-14 rounded-[32px] text-xl font-semibold text-white bg-[#27AE60]">
                                    Continue
                                </button>
                            </form>
                        </div>
                    </div>
                </dialog>

                <!-- Terms and Conditions -->
                <div class="flex justify-between mt-6 text-[#03071299]">
                    <p><u>Terms and Conditions</u></p>
                    <p><u>Cancellation Policy</u></p>
                </div>

            </div>

        </div>

    </div>
</body>
<?php include 'footer.php'; ?>

</html>