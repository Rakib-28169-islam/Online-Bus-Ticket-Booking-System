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

    <?php include 'navbar.php'; ?>

    <!-- Banner Section -->

    <header class="mx-auto h-screen">

        <!-- Banner BG -->
        <div class="hero h-full bg-no-repeat rounded-b-3xl" style="background-image: url(https://i.ibb.co.com/r3HDJt1/banner.png);">

            <!-- Banner texts & cards -->
            <div class="text-center mx-auto w-full text-neutral-content flex-col">

                <!-- banner texts -->
                <div class="pt-24">

                    <!-- banner title -->
                    <h1 class="font-raleway text-8xl font-extrabold leading-[120px]">
                        <span class="text-white">
                            End-to-End Travel with <br>
                        </span>
                        <span class="text-[#1DD100]">P Paribahan</span>
                    </h1>

                    <!-- banner description -->
                    <p class="mt-20 text-3xl">
                        Your One-Stop Ticket Shop! Explore destinations, book hassle-free bus rides. <br> Embark on
                        adventure with ease.
                    </p>

                    <!-- Banner buy tickets button -->
                    <button class="btn mt-24 font-raleway bg-[#1DD100] text-white border-0 text-xl font-bold w-40 h-16">
                        <a href="#ticketPanel">Buy Tickets</a>
                    </button>

                </div>

                <!-- banner small cards -->
                <div>
                    <img class="mx-auto relative top-36" src="https://marvelous-melba-c6ea67.netlify.app/images/records.svg" alt="">
                </div>

            </div>

        </div>

    </header>

    <main>
        <!-- Extras 1 -->
        <section class="text-center"><!-- Coupon Section -->

            <!-- Title -->
            <div class="text-5xl mt-64 pb-20 font-bold font-raleway">
                Best offers for you
            </div>

            <!-- Coupons -->
            <div class="flex gap-6 justify-center">

                <!-- Independence coupon -->
                <div class="bg-[#006a4eff] w-[573px] h-[220px] rounded-3xl flex gap-11">
                    <div class="pt-8 pl-[50px]">
                        <p class="font-inter w-56 h-32 leading-9">
                            <span class="text-4xl font-black text-[#f42a41ff]">
                                Independence Offer
                            </span>
                            <br>
                            <span class="text-[20px] text-[#f42a41ff] font-semibold">
                                50% off on purchase
                            </span>
                            <br>
                            <span class="text-[18px] text-[#f42a41ff] font-medium">
                                use by August 2024
                            </span>
                        </p>
                    </div>

                    <img src="https://i.ibb.co.com/WkfpPQ5/cupon-devider.png" alt="">

                    <div class="relative right-6">
                        <p class="font-raleway items-center mt-[80px]">
                            <span class="text-[32px] font-bold text-[#f42a41ff]">
                                NewBD24
                            </span> <br>
                            <span class="text-[20px] font-medium text-[#f42a41ff]">
                                Coupon Code
                            </span>
                        </p>
                    </div>

                </div>

                <!-- 15% off coupon -->
                <div class="bg-[#FFBF0F] w-[573px] h-[220px] rounded-3xl flex gap-11">
                    <div class="pt-14 pl-[50px]">
                        <p class="font-inter w-56 h-32 leading-9">
                            <span class="text-4xl font-black">
                                15% OFF
                            </span>
                            <br>
                            <span class="text-[20px] font-semibold">
                                on your next purchase
                            </span>
                            <br>
                            <span class="text-[18px] font-medium text-[#03071266]">
                                use by January 2024
                            </span>
                        </p>
                    </div>

                    <img src="https://i.ibb.co.com/WkfpPQ5/cupon-devider.png" alt="">

                    <div class="relative right-6">
                        <p class="font-raleway items-center mt-[80px]">
                            <span class="text-[32px] font-bold">
                                NEW15
                            </span> <br>
                            <span class="text-[20px] font-medium text-[#03071266]">
                                Coupon Code
                            </span>
                        </p>
                    </div>


                </div>

                <!-- 20% off coupon -->
                <div class="bg-[#F78C9C] w-[573px] h-[220px] rounded-3xl flex gap-11">
                    <div class="pt-14 pl-[50px]">
                        <p class="font-inter w-56 h-32 leading-9">
                            <span class="text-3xl font-black">
                                Be a member
                            </span>
                            <br>
                            <span class="text-[20px] font-semibold">
                                on your next purchase
                            </span>
                            <br>
                            <span class="text-[18px] font-medium text-[#03071266]">
                                use by January 2024
                            </span>
                        </p>
                    </div>

                    <img src="https://i.ibb.co.com/WkfpPQ5/cupon-devider.png" alt="">

                    <div class="relative right-6">
                        <p class="font-raleway items-center mt-[80px]">
                            <span class="text-[32px] font-bold">
                                Couple 20
                            </span> <br>
                            <span class="text-[20px] font-medium text-[#03071266]">
                                Coupon Code
                            </span>
                        </p>
                    </div>

                </div>


            </div>

            <!-- Button (See All Offers) -->
            <div class="pt-16">
                <button class="btn btn-outline btn-success text-[#1DD100] border-[#1DD100] font-bold text-xl w-48 h-16 mb-28">
                    See All Offers
                </button>
            </div>

        </section>

        <!-- Intro -->
        <section class="bg-white rounded-t-[88px] w-full border-t-2 border-[#1dd100]">
            <div class="text-center">

                <!-- Title and description (upper half) -->
                <div class="pt-28">
                    <p class="font-raleway text-4xl font-bold">
                        P Paribahan
                    </p>
                    <p class="w-[700px] mx-auto text-[#03071299] text-xl mt-6 pb-16">
                        Your One-Stop Ticket Shop! Explore destinations, book hassle-free bus rides, and embark on
                        adventure with ease.
                    </p>
                </div>

            </div>
        </section>

        <!-- Search Panel -->
        <section id="ticketPanel" class="bg-white pb-16">
            <?php include 'searchPanel.php'; ?>
        </section>

        <!-- Extras 2 -->
        <section>
            <div>
                <img class="mb-16" src="https://i.ibb.co.com/7k6r7q4/Ticket.jpg" alt="">

                <!-- Popular Bus Routes -->
                <p class="text-center font-raleway mb-10 text-4xl font-bold">Popular Bus Routes</h1>
                <div class="grid grid-cols-3 gap-4 mb-16 max-w-7xl mx-auto">
                    <!-- Routes -->
                    <div class="btn w-[420px] h-20 gap-[80px]">
                        <div>
                            <p class="font-bold text-xl">DHK</p>
                            <p class="text-sm font-light">Dhaka</p>
                        </div>
                        <svg class="w-8 h-8" version="1.1" id="Layer_2" xmlns="http://www.w3.org/2000/svg" x="0" y="0" viewBox="0 0 80.3 80.3" style="enable-background:new 0 0 80.3 80.3" xml:space="preserve">
                            <style>
                                .st4 {
                                    fill: #0c2c48
                                }

                                .st7 {
                                    fill: #2f4555
                                }

                                .st12 {
                                    fill: #f1cc4b
                                }
                            </style>
                            <circle transform="rotate(-.146 40.174 40.16)" cx="40.2" cy="40.2" style="fill:#55ab99" r="40.2" />
                            <path class="st4" d="M20.4 32.5c0 1.4-1.1 2.6-2.5 2.6h-1.7c-1.4 0-2.6-1.1-2.6-2.5v-7.4c0-1.4 1.1-2.6 2.5-2.6h1.7c1.4 0 2.6 1.1 2.6 2.5v7.4z" />
                            <path class="st4" d="M17.5 26.4h-.9v-7.5l4.2-2.5.5.7-3.9 2.3zM59.9 32.4c0 1.4 1.2 2.6 2.6 2.5h1.7c1.4 0 2.6-1.1 2.5-2.6v-7.4c0-1.4-1.2-2.6-2.6-2.5h-1.7c-1.4 0-2.6 1.1-2.5 2.6v7.4z" />
                            <path class="st4" d="M62.8 26.2h.8v-7.4l-4.2-2.5-.5.7 3.9 2.3z" />
                            <path transform="rotate(-.15 24.82 65.362)" class="st4" d="M22 62.2h5.6v6.4H22z" />
                            <path transform="matrix(1 -.00262 .00262 1 -.17 .146)" class="st4" d="M52.9 62.1h5.6v6.4h-5.6z" />
                            <path class="st7" d="M61.1 60.4 61 17.6c0-1.4-1.2-2.6-2.6-2.5l-36.6.1c-1.4 0-2.6 1.2-2.5 2.6l.1 42.8 41.7-.2z" />
                            <path style="fill:#81caff" d="M22.2 24H59v16.5H22.2z" />
                            <g>
                                <path transform="rotate(-.144 24.877 53.03)" class="st12" d="M20.4 50.7h8.9v4.7h-8.9z" />
                                <path transform="matrix(1 -.00252 .00252 1 -.133 .14)" class="st12" d="M51.1 50.6H60v4.7h-8.9z" />
                            </g>
                            <path class="st7" d="m41.2 42.5-2.1.1.8-20.6h.4z" />
                            <path transform="matrix(1 -.00254 .00254 1 -.155 .102)" style="fill:#babfc5" d="M17.1 59.6h46.2v2.8H17.1z" />
                        </svg>
                        <div>
                            <p class="font-bold text-xl">CTG</p>
                            <p class="text-sm font-light">Chittagong</p>
                        </div>
                    </div>

                    <div class="btn w-[420px] h-20 gap-[80px]">
                        <div>
                            <p class="font-bold text-xl">CTG</p>
                            <p class="text-sm font-light">Chittagong</p>
                        </div>
                        <svg class="w-8 h-8" version="1.1" id="Layer_2" xmlns="http://www.w3.org/2000/svg" x="0" y="0" viewBox="0 0 80.3 80.3" style="enable-background:new 0 0 80.3 80.3" xml:space="preserve">
                            <style>
                                .st4 {
                                    fill: #0c2c48
                                }

                                .st7 {
                                    fill: #2f4555
                                }

                                .st12 {
                                    fill: #f1cc4b
                                }
                            </style>
                            <circle transform="rotate(-.146 40.174 40.16)" cx="40.2" cy="40.2" style="fill:#55ab99" r="40.2" />
                            <path class="st4" d="M20.4 32.5c0 1.4-1.1 2.6-2.5 2.6h-1.7c-1.4 0-2.6-1.1-2.6-2.5v-7.4c0-1.4 1.1-2.6 2.5-2.6h1.7c1.4 0 2.6 1.1 2.6 2.5v7.4z" />
                            <path class="st4" d="M17.5 26.4h-.9v-7.5l4.2-2.5.5.7-3.9 2.3zM59.9 32.4c0 1.4 1.2 2.6 2.6 2.5h1.7c1.4 0 2.6-1.1 2.5-2.6v-7.4c0-1.4-1.2-2.6-2.6-2.5h-1.7c-1.4 0-2.6 1.1-2.5 2.6v7.4z" />
                            <path class="st4" d="M62.8 26.2h.8v-7.4l-4.2-2.5-.5.7 3.9 2.3z" />
                            <path transform="rotate(-.15 24.82 65.362)" class="st4" d="M22 62.2h5.6v6.4H22z" />
                            <path transform="matrix(1 -.00262 .00262 1 -.17 .146)" class="st4" d="M52.9 62.1h5.6v6.4h-5.6z" />
                            <path class="st7" d="M61.1 60.4 61 17.6c0-1.4-1.2-2.6-2.6-2.5l-36.6.1c-1.4 0-2.6 1.2-2.5 2.6l.1 42.8 41.7-.2z" />
                            <path style="fill:#81caff" d="M22.2 24H59v16.5H22.2z" />
                            <g>
                                <path transform="rotate(-.144 24.877 53.03)" class="st12" d="M20.4 50.7h8.9v4.7h-8.9z" />
                                <path transform="matrix(1 -.00252 .00252 1 -.133 .14)" class="st12" d="M51.1 50.6H60v4.7h-8.9z" />
                            </g>
                            <path class="st7" d="m41.2 42.5-2.1.1.8-20.6h.4z" />
                            <path transform="matrix(1 -.00254 .00254 1 -.155 .102)" style="fill:#babfc5" d="M17.1 59.6h46.2v2.8H17.1z" />
                        </svg>
                        <div>
                            <p class="font-bold text-xl">DHK</p>
                            <p class="text-sm font-light">Dhaka</p>
                        </div>
                    </div>

                    <div class="btn w-[420px] h-20 gap-[80px]">
                        <div>
                            <p class="font-bold text-xl">DHK</p>
                            <p class="text-sm font-light">Dhaka</p>
                        </div>
                        <svg class="w-8 h-8" version="1.1" id="Layer_2" xmlns="http://www.w3.org/2000/svg" x="0" y="0" viewBox="0 0 80.3 80.3" style="enable-background:new 0 0 80.3 80.3" xml:space="preserve">
                            <style>
                                .st4 {
                                    fill: #0c2c48
                                }

                                .st7 {
                                    fill: #2f4555
                                }

                                .st12 {
                                    fill: #f1cc4b
                                }
                            </style>
                            <circle transform="rotate(-.146 40.174 40.16)" cx="40.2" cy="40.2" style="fill:#55ab99" r="40.2" />
                            <path class="st4" d="M20.4 32.5c0 1.4-1.1 2.6-2.5 2.6h-1.7c-1.4 0-2.6-1.1-2.6-2.5v-7.4c0-1.4 1.1-2.6 2.5-2.6h1.7c1.4 0 2.6 1.1 2.6 2.5v7.4z" />
                            <path class="st4" d="M17.5 26.4h-.9v-7.5l4.2-2.5.5.7-3.9 2.3zM59.9 32.4c0 1.4 1.2 2.6 2.6 2.5h1.7c1.4 0 2.6-1.1 2.5-2.6v-7.4c0-1.4-1.2-2.6-2.6-2.5h-1.7c-1.4 0-2.6 1.1-2.5 2.6v7.4z" />
                            <path class="st4" d="M62.8 26.2h.8v-7.4l-4.2-2.5-.5.7 3.9 2.3z" />
                            <path transform="rotate(-.15 24.82 65.362)" class="st4" d="M22 62.2h5.6v6.4H22z" />
                            <path transform="matrix(1 -.00262 .00262 1 -.17 .146)" class="st4" d="M52.9 62.1h5.6v6.4h-5.6z" />
                            <path class="st7" d="M61.1 60.4 61 17.6c0-1.4-1.2-2.6-2.6-2.5l-36.6.1c-1.4 0-2.6 1.2-2.5 2.6l.1 42.8 41.7-.2z" />
                            <path style="fill:#81caff" d="M22.2 24H59v16.5H22.2z" />
                            <g>
                                <path transform="rotate(-.144 24.877 53.03)" class="st12" d="M20.4 50.7h8.9v4.7h-8.9z" />
                                <path transform="matrix(1 -.00252 .00252 1 -.133 .14)" class="st12" d="M51.1 50.6H60v4.7h-8.9z" />
                            </g>
                            <path class="st7" d="m41.2 42.5-2.1.1.8-20.6h.4z" />
                            <path transform="matrix(1 -.00254 .00254 1 -.155 .102)" style="fill:#babfc5" d="M17.1 59.6h46.2v2.8H17.1z" />
                        </svg>
                        <div>
                            <p class="font-bold text-xl">KHL</p>
                            <p class="text-sm font-light">Khulna</p>
                        </div>
                    </div>

                    <div class="btn w-[420px] h-20 gap-[80px]">
                        <div>
                            <p class="font-bold text-xl">KHL</p>
                            <p class="text-sm font-light">Khulna</p>
                        </div>
                        <svg class="w-8 h-8" version="1.1" id="Layer_2" xmlns="http://www.w3.org/2000/svg" x="0" y="0" viewBox="0 0 80.3 80.3" style="enable-background:new 0 0 80.3 80.3" xml:space="preserve">
                            <style>
                                .st4 {
                                    fill: #0c2c48
                                }

                                .st7 {
                                    fill: #2f4555
                                }

                                .st12 {
                                    fill: #f1cc4b
                                }
                            </style>
                            <circle transform="rotate(-.146 40.174 40.16)" cx="40.2" cy="40.2" style="fill:#55ab99" r="40.2" />
                            <path class="st4" d="M20.4 32.5c0 1.4-1.1 2.6-2.5 2.6h-1.7c-1.4 0-2.6-1.1-2.6-2.5v-7.4c0-1.4 1.1-2.6 2.5-2.6h1.7c1.4 0 2.6 1.1 2.6 2.5v7.4z" />
                            <path class="st4" d="M17.5 26.4h-.9v-7.5l4.2-2.5.5.7-3.9 2.3zM59.9 32.4c0 1.4 1.2 2.6 2.6 2.5h1.7c1.4 0 2.6-1.1 2.5-2.6v-7.4c0-1.4-1.2-2.6-2.6-2.5h-1.7c-1.4 0-2.6 1.1-2.5 2.6v7.4z" />
                            <path class="st4" d="M62.8 26.2h.8v-7.4l-4.2-2.5-.5.7 3.9 2.3z" />
                            <path transform="rotate(-.15 24.82 65.362)" class="st4" d="M22 62.2h5.6v6.4H22z" />
                            <path transform="matrix(1 -.00262 .00262 1 -.17 .146)" class="st4" d="M52.9 62.1h5.6v6.4h-5.6z" />
                            <path class="st7" d="M61.1 60.4 61 17.6c0-1.4-1.2-2.6-2.6-2.5l-36.6.1c-1.4 0-2.6 1.2-2.5 2.6l.1 42.8 41.7-.2z" />
                            <path style="fill:#81caff" d="M22.2 24H59v16.5H22.2z" />
                            <g>
                                <path transform="rotate(-.144 24.877 53.03)" class="st12" d="M20.4 50.7h8.9v4.7h-8.9z" />
                                <path transform="matrix(1 -.00252 .00252 1 -.133 .14)" class="st12" d="M51.1 50.6H60v4.7h-8.9z" />
                            </g>
                            <path class="st7" d="m41.2 42.5-2.1.1.8-20.6h.4z" />
                            <path transform="matrix(1 -.00254 .00254 1 -.155 .102)" style="fill:#babfc5" d="M17.1 59.6h46.2v2.8H17.1z" />
                        </svg>
                        <div>
                            <p class="font-bold text-xl">DHK</p>
                            <p class="text-sm font-light">Dhaka</p>
                        </div>
                    </div>

                    <div class="btn w-[420px] h-20 gap-[80px]">
                        <div>
                            <p class="font-bold text-xl">DHK</p>
                            <p class="text-sm font-light">Dhaka</p>
                        </div>
                        <svg class="w-8 h-8" version="1.1" id="Layer_2" xmlns="http://www.w3.org/2000/svg" x="0" y="0" viewBox="0 0 80.3 80.3" style="enable-background:new 0 0 80.3 80.3" xml:space="preserve">
                            <style>
                                .st4 {
                                    fill: #0c2c48
                                }

                                .st7 {
                                    fill: #2f4555
                                }

                                .st12 {
                                    fill: #f1cc4b
                                }
                            </style>
                            <circle transform="rotate(-.146 40.174 40.16)" cx="40.2" cy="40.2" style="fill:#55ab99" r="40.2" />
                            <path class="st4" d="M20.4 32.5c0 1.4-1.1 2.6-2.5 2.6h-1.7c-1.4 0-2.6-1.1-2.6-2.5v-7.4c0-1.4 1.1-2.6 2.5-2.6h1.7c1.4 0 2.6 1.1 2.6 2.5v7.4z" />
                            <path class="st4" d="M17.5 26.4h-.9v-7.5l4.2-2.5.5.7-3.9 2.3zM59.9 32.4c0 1.4 1.2 2.6 2.6 2.5h1.7c1.4 0 2.6-1.1 2.5-2.6v-7.4c0-1.4-1.2-2.6-2.6-2.5h-1.7c-1.4 0-2.6 1.1-2.5 2.6v7.4z" />
                            <path class="st4" d="M62.8 26.2h.8v-7.4l-4.2-2.5-.5.7 3.9 2.3z" />
                            <path transform="rotate(-.15 24.82 65.362)" class="st4" d="M22 62.2h5.6v6.4H22z" />
                            <path transform="matrix(1 -.00262 .00262 1 -.17 .146)" class="st4" d="M52.9 62.1h5.6v6.4h-5.6z" />
                            <path class="st7" d="M61.1 60.4 61 17.6c0-1.4-1.2-2.6-2.6-2.5l-36.6.1c-1.4 0-2.6 1.2-2.5 2.6l.1 42.8 41.7-.2z" />
                            <path style="fill:#81caff" d="M22.2 24H59v16.5H22.2z" />
                            <g>
                                <path transform="rotate(-.144 24.877 53.03)" class="st12" d="M20.4 50.7h8.9v4.7h-8.9z" />
                                <path transform="matrix(1 -.00252 .00252 1 -.133 .14)" class="st12" d="M51.1 50.6H60v4.7h-8.9z" />
                            </g>
                            <path class="st7" d="m41.2 42.5-2.1.1.8-20.6h.4z" />
                            <path transform="matrix(1 -.00254 .00254 1 -.155 .102)" style="fill:#babfc5" d="M17.1 59.6h46.2v2.8H17.1z" />
                        </svg>
                        <div>
                            <p class="font-bold text-xl">STK</p>
                            <p class="text-sm font-light">Satkhira</p>
                        </div>
                    </div>

                    <div class="btn w-[420px] h-20 gap-[80px]">
                        <div>
                            <p class="font-bold text-xl">STK</p>
                            <p class="text-sm font-light">Satkhira</p>
                        </div>
                        <svg class="w-8 h-8" version="1.1" id="Layer_2" xmlns="http://www.w3.org/2000/svg" x="0" y="0" viewBox="0 0 80.3 80.3" style="enable-background:new 0 0 80.3 80.3" xml:space="preserve">
                            <style>
                                .st4 {
                                    fill: #0c2c48
                                }

                                .st7 {
                                    fill: #2f4555
                                }

                                .st12 {
                                    fill: #f1cc4b
                                }
                            </style>
                            <circle transform="rotate(-.146 40.174 40.16)" cx="40.2" cy="40.2" style="fill:#55ab99" r="40.2" />
                            <path class="st4" d="M20.4 32.5c0 1.4-1.1 2.6-2.5 2.6h-1.7c-1.4 0-2.6-1.1-2.6-2.5v-7.4c0-1.4 1.1-2.6 2.5-2.6h1.7c1.4 0 2.6 1.1 2.6 2.5v7.4z" />
                            <path class="st4" d="M17.5 26.4h-.9v-7.5l4.2-2.5.5.7-3.9 2.3zM59.9 32.4c0 1.4 1.2 2.6 2.6 2.5h1.7c1.4 0 2.6-1.1 2.5-2.6v-7.4c0-1.4-1.2-2.6-2.6-2.5h-1.7c-1.4 0-2.6 1.1-2.5 2.6v7.4z" />
                            <path class="st4" d="M62.8 26.2h.8v-7.4l-4.2-2.5-.5.7 3.9 2.3z" />
                            <path transform="rotate(-.15 24.82 65.362)" class="st4" d="M22 62.2h5.6v6.4H22z" />
                            <path transform="matrix(1 -.00262 .00262 1 -.17 .146)" class="st4" d="M52.9 62.1h5.6v6.4h-5.6z" />
                            <path class="st7" d="M61.1 60.4 61 17.6c0-1.4-1.2-2.6-2.6-2.5l-36.6.1c-1.4 0-2.6 1.2-2.5 2.6l.1 42.8 41.7-.2z" />
                            <path style="fill:#81caff" d="M22.2 24H59v16.5H22.2z" />
                            <g>
                                <path transform="rotate(-.144 24.877 53.03)" class="st12" d="M20.4 50.7h8.9v4.7h-8.9z" />
                                <path transform="matrix(1 -.00252 .00252 1 -.133 .14)" class="st12" d="M51.1 50.6H60v4.7h-8.9z" />
                            </g>
                            <path class="st7" d="m41.2 42.5-2.1.1.8-20.6h.4z" />
                            <path transform="matrix(1 -.00254 .00254 1 -.155 .102)" style="fill:#babfc5" d="M17.1 59.6h46.2v2.8H17.1z" />
                        </svg>
                        <div>
                            <p class="font-bold text-xl">DHK</p>
                            <p class="text-sm font-light">Dhaka</p>
                        </div>
                    </div>

                    <div class="btn w-[420px] h-20 gap-[80px]">
                        <div>
                            <p class="font-bold text-xl">DHK</p>
                            <p class="text-sm font-light">Dhaka</p>
                        </div>
                        <svg class="w-8 h-8" version="1.1" id="Layer_2" xmlns="http://www.w3.org/2000/svg" x="0" y="0" viewBox="0 0 80.3 80.3" style="enable-background:new 0 0 80.3 80.3" xml:space="preserve">
                            <style>
                                .st4 {
                                    fill: #0c2c48
                                }

                                .st7 {
                                    fill: #2f4555
                                }

                                .st12 {
                                    fill: #f1cc4b
                                }
                            </style>
                            <circle transform="rotate(-.146 40.174 40.16)" cx="40.2" cy="40.2" style="fill:#55ab99" r="40.2" />
                            <path class="st4" d="M20.4 32.5c0 1.4-1.1 2.6-2.5 2.6h-1.7c-1.4 0-2.6-1.1-2.6-2.5v-7.4c0-1.4 1.1-2.6 2.5-2.6h1.7c1.4 0 2.6 1.1 2.6 2.5v7.4z" />
                            <path class="st4" d="M17.5 26.4h-.9v-7.5l4.2-2.5.5.7-3.9 2.3zM59.9 32.4c0 1.4 1.2 2.6 2.6 2.5h1.7c1.4 0 2.6-1.1 2.5-2.6v-7.4c0-1.4-1.2-2.6-2.6-2.5h-1.7c-1.4 0-2.6 1.1-2.5 2.6v7.4z" />
                            <path class="st4" d="M62.8 26.2h.8v-7.4l-4.2-2.5-.5.7 3.9 2.3z" />
                            <path transform="rotate(-.15 24.82 65.362)" class="st4" d="M22 62.2h5.6v6.4H22z" />
                            <path transform="matrix(1 -.00262 .00262 1 -.17 .146)" class="st4" d="M52.9 62.1h5.6v6.4h-5.6z" />
                            <path class="st7" d="M61.1 60.4 61 17.6c0-1.4-1.2-2.6-2.6-2.5l-36.6.1c-1.4 0-2.6 1.2-2.5 2.6l.1 42.8 41.7-.2z" />
                            <path style="fill:#81caff" d="M22.2 24H59v16.5H22.2z" />
                            <g>
                                <path transform="rotate(-.144 24.877 53.03)" class="st12" d="M20.4 50.7h8.9v4.7h-8.9z" />
                                <path transform="matrix(1 -.00252 .00252 1 -.133 .14)" class="st12" d="M51.1 50.6H60v4.7h-8.9z" />
                            </g>
                            <path class="st7" d="m41.2 42.5-2.1.1.8-20.6h.4z" />
                            <path transform="matrix(1 -.00254 .00254 1 -.155 .102)" style="fill:#babfc5" d="M17.1 59.6h46.2v2.8H17.1z" />
                        </svg>
                        <div>
                            <p class="font-bold text-xl">CXZ</p>
                            <p class="text-sm font-light">Cox's Bazar</p>
                        </div>
                    </div>

                    <div class="btn w-[420px] h-20 gap-[80px]">
                        <div>
                            <p class="font-bold text-xl">CXZ</p>
                            <p class="text-sm font-light">Cox's Bazar</p>
                        </div>
                        <svg class="w-8 h-8" version="1.1" id="Layer_2" xmlns="http://www.w3.org/2000/svg" x="0" y="0" viewBox="0 0 80.3 80.3" style="enable-background:new 0 0 80.3 80.3" xml:space="preserve">
                            <style>
                                .st4 {
                                    fill: #0c2c48
                                }

                                .st7 {
                                    fill: #2f4555
                                }

                                .st12 {
                                    fill: #f1cc4b
                                }
                            </style>
                            <circle transform="rotate(-.146 40.174 40.16)" cx="40.2" cy="40.2" style="fill:#55ab99" r="40.2" />
                            <path class="st4" d="M20.4 32.5c0 1.4-1.1 2.6-2.5 2.6h-1.7c-1.4 0-2.6-1.1-2.6-2.5v-7.4c0-1.4 1.1-2.6 2.5-2.6h1.7c1.4 0 2.6 1.1 2.6 2.5v7.4z" />
                            <path class="st4" d="M17.5 26.4h-.9v-7.5l4.2-2.5.5.7-3.9 2.3zM59.9 32.4c0 1.4 1.2 2.6 2.6 2.5h1.7c1.4 0 2.6-1.1 2.5-2.6v-7.4c0-1.4-1.2-2.6-2.6-2.5h-1.7c-1.4 0-2.6 1.1-2.5 2.6v7.4z" />
                            <path class="st4" d="M62.8 26.2h.8v-7.4l-4.2-2.5-.5.7 3.9 2.3z" />
                            <path transform="rotate(-.15 24.82 65.362)" class="st4" d="M22 62.2h5.6v6.4H22z" />
                            <path transform="matrix(1 -.00262 .00262 1 -.17 .146)" class="st4" d="M52.9 62.1h5.6v6.4h-5.6z" />
                            <path class="st7" d="M61.1 60.4 61 17.6c0-1.4-1.2-2.6-2.6-2.5l-36.6.1c-1.4 0-2.6 1.2-2.5 2.6l.1 42.8 41.7-.2z" />
                            <path style="fill:#81caff" d="M22.2 24H59v16.5H22.2z" />
                            <g>
                                <path transform="rotate(-.144 24.877 53.03)" class="st12" d="M20.4 50.7h8.9v4.7h-8.9z" />
                                <path transform="matrix(1 -.00252 .00252 1 -.133 .14)" class="st12" d="M51.1 50.6H60v4.7h-8.9z" />
                            </g>
                            <path class="st7" d="m41.2 42.5-2.1.1.8-20.6h.4z" />
                            <path transform="matrix(1 -.00254 .00254 1 -.155 .102)" style="fill:#babfc5" d="M17.1 59.6h46.2v2.8H17.1z" />
                        </svg>
                        <div>
                            <p class="font-bold text-xl">DHK</p>
                            <p class="text-sm font-light">Dhaka</p>
                        </div>
                    </div>

                    <div class="btn w-[420px] h-20 gap-[80px]">
                        <div>
                            <p class="font-bold text-xl">DHK</p>
                            <p class="text-sm font-light">Dhaka</p>
                        </div>
                        <svg class="w-8 h-8" version="1.1" id="Layer_2" xmlns="http://www.w3.org/2000/svg" x="0" y="0" viewBox="0 0 80.3 80.3" style="enable-background:new 0 0 80.3 80.3" xml:space="preserve">
                            <style>
                                .st4 {
                                    fill: #0c2c48
                                }

                                .st7 {
                                    fill: #2f4555
                                }

                                .st12 {
                                    fill: #f1cc4b
                                }
                            </style>
                            <circle transform="rotate(-.146 40.174 40.16)" cx="40.2" cy="40.2" style="fill:#55ab99" r="40.2" />
                            <path class="st4" d="M20.4 32.5c0 1.4-1.1 2.6-2.5 2.6h-1.7c-1.4 0-2.6-1.1-2.6-2.5v-7.4c0-1.4 1.1-2.6 2.5-2.6h1.7c1.4 0 2.6 1.1 2.6 2.5v7.4z" />
                            <path class="st4" d="M17.5 26.4h-.9v-7.5l4.2-2.5.5.7-3.9 2.3zM59.9 32.4c0 1.4 1.2 2.6 2.6 2.5h1.7c1.4 0 2.6-1.1 2.5-2.6v-7.4c0-1.4-1.2-2.6-2.6-2.5h-1.7c-1.4 0-2.6 1.1-2.5 2.6v7.4z" />
                            <path class="st4" d="M62.8 26.2h.8v-7.4l-4.2-2.5-.5.7 3.9 2.3z" />
                            <path transform="rotate(-.15 24.82 65.362)" class="st4" d="M22 62.2h5.6v6.4H22z" />
                            <path transform="matrix(1 -.00262 .00262 1 -.17 .146)" class="st4" d="M52.9 62.1h5.6v6.4h-5.6z" />
                            <path class="st7" d="M61.1 60.4 61 17.6c0-1.4-1.2-2.6-2.6-2.5l-36.6.1c-1.4 0-2.6 1.2-2.5 2.6l.1 42.8 41.7-.2z" />
                            <path style="fill:#81caff" d="M22.2 24H59v16.5H22.2z" />
                            <g>
                                <path transform="rotate(-.144 24.877 53.03)" class="st12" d="M20.4 50.7h8.9v4.7h-8.9z" />
                                <path transform="matrix(1 -.00252 .00252 1 -.133 .14)" class="st12" d="M51.1 50.6H60v4.7h-8.9z" />
                            </g>
                            <path class="st7" d="m41.2 42.5-2.1.1.8-20.6h.4z" />
                            <path transform="matrix(1 -.00254 .00254 1 -.155 .102)" style="fill:#babfc5" d="M17.1 59.6h46.2v2.8H17.1z" />
                        </svg>
                        <div>
                            <p class="font-bold text-xl">BAR</p>
                            <p class="text-sm font-light">Barishal</p>
                        </div>
                    </div>
                </div>

                <!-- Accordion (C) -->
                 <div class="my-28">
                     <?php include 'accordion.php'; ?>
                 </div>

                <img class="my-12" src="https://i.ibb.co.com/n1YxCSp/SSLCommerz-Pay-With-logo-All-Size-01.png" alt="">
            </div>
        </section>

    </main>

    <?php include 'footer.php'; ?>
</body>

</html>