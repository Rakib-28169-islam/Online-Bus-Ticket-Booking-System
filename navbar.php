<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start(); // Start session only if not already started
}
?>

<nav class="font-raleway">
    <!-- Navbar container -->
    <div class="navbar bg-base-100">
        <!-- Navbar dropdown options in md:/ls: -->
        <div class="navbar-start">
            <a href="userHome.php" class="btn btn-ghost font-extrabold text-2xl lg:text-4xl pl-0">P-Ticket</a>
        </div>

        <!-- Navbar options -->
        <div class="navbar-center hidden lg:flex">
            <ul class="menu menu-horizontal px-1 text-[#424247] text-lg font-medium gap-14">
                <li><a href="userHome.php">Home</a></li>
                <li><a href="ticketOperation.php">Ticket Operation</a></li>
                <li><a>About</a></li>
                <li><a>Branch Location</a></li>
                <li><a>Contact Us</a></li>
                <li><a>FAQ</a></li>
            </ul>
        </div>

        <!-- Navbar Button -->
        <div class="navbar-end mr-4 gap-4">
            <?php if (isset($_SESSION['loggedIn']) && $_SESSION['loggedIn'] === true): ?>
                <?php if (isset($_SESSION['user_name'])): ?>
                    <span class="text-lg pr-12 font-bold">Hello, <?= htmlspecialchars($_SESSION['user_name']); ?>!</span>
                    <a href="logout.php" class="btn bg-[#7129291a] text-red-500 border-red-400 text-xl font-bold rounded-xl h-14">Logout</a>
                <?php elseif (isset($_SESSION['admin_name'])): ?>
                    <span class="text-lg pr-12 font-bold">Hello, <br> <?= htmlspecialchars($_SESSION['admin_name']); ?>!</span>
                    <a href="logout.php" class="btn bg-[#7129291a] text-red-500 border-red-400 text-xl font-bold rounded-xl h-14">Logout</a>
                <?php endif; ?>
            <?php else: ?>
                <a href="loginForm.php" class="btn bg-[#1DD1001A] text-[#1DD100] border-[#1dd10066] text-xl font-bold rounded-xl h-14">Login</a>
                <a href="signUpForm.php" class="btn bg-[#1DD1001A] text-[#1DD100] border-[#1dd10066] text-xl font-bold rounded-xl h-14">Sign-Up</a>
            <?php endif; ?>
        </div>
    </div>
</nav>