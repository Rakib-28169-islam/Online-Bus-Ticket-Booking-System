<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start(); // Start session only if not already started
}
include 'connection.php';

?>

<!DOCTYPE html>
<html lang="en">

<body>
    <div class="bg-slate-200/50 w-[65%] mx-auto rounded-xl">

        <p class="font-raleway font-medium p-8 text-3xl text-center">Book your ticket from the country's best bus operator</p>

        <form method="POST" action="handleFromToSearch.php">
            <div class="flex gap-4 mb-5 ml-20">
                <!-- From Location -->
                <div class="relative max-w-lg">
                    <!-- <label for="from" class="sr-only">From</label> -->
                    <div class="absolute inset-y-0 start-0 flex items-center ps-1.5 pointer-events-none">
                        <svg class="w-7 h-7" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" style="enable-background:new 0 0 512 512" xml:space="preserve">
                            <path style="fill:#e54728" d="M398.338 71.921c-78.611-78.611-206.066-78.611-284.677 0-78.611 78.611-78.611 206.066 0 284.677L256 498.937l142.338-142.338c78.612-78.612 78.612-206.066 0-284.678z" />
                            <path style="fill:#f95428" d="M136.755 333.505c-31.852-31.852-49.394-74.201-49.394-119.247s17.541-87.394 49.394-119.245c31.852-31.852 74.201-49.394 119.247-49.394 45.044 0 87.394 17.541 119.245 49.393s49.394 74.201 49.394 119.245c0 45.046-17.541 87.395-49.394 119.245L256 452.749 136.755 333.505z" />
                            <circle style="fill:#e6e6e6" cx="255.997" cy="214.261" r="123.002" />
                            <path style="fill:#ccc" d="M296.167 297.098c-67.935 0-123.006-55.072-123.006-123.006 0-23.677 6.696-45.786 18.287-64.551-35.077 21.668-58.455 60.461-58.455 104.719 0 67.935 55.072 123.006 123.006 123.006 44.258 0 83.05-23.378 104.718-58.455-18.763 11.592-40.874 18.287-64.55 18.287z" />
                            <path style="fill:#333" d="M407.575 62.684c-83.578-83.579-219.572-83.579-303.152 0-83.578 83.579-83.578 219.572 0 303.151l142.34 142.338c2.451 2.449 5.773 3.826 9.237 3.826s6.786-1.377 9.237-3.826l142.338-142.34c83.58-83.577 83.58-219.569 0-303.149zm-18.473 284.677L256 480.463 122.899 347.361c-73.393-73.394-73.393-192.812.001-266.203 35.553-35.553 82.822-55.133 133.101-55.133s97.549 19.58 133.101 55.133c73.391 73.393 73.391 192.811 0 266.203z" />
                            <path style="fill:#333" d="M256 78.19c-75.029 0-136.069 61.041-136.069 136.069S180.972 350.329 256 350.329s136.069-61.04 136.069-136.069S331.029 78.19 256 78.19zm0 246.013c-60.622 0-109.943-49.32-109.943-109.943S195.378 104.317 256 104.317s109.943 49.32 109.943 109.943c0 60.622-49.321 109.943-109.943 109.943z" />
                            <path style="fill:#333" d="M336.486 264.661c-9.21-16.564-23.122-29.562-39.516-37.726a59.396 59.396 0 0 0 15.114-23.618 58.914 58.914 0 0 0 3.187-19.164c0-25.839-16.616-47.863-39.725-55.949a58.754 58.754 0 0 0-19.542-3.318c-32.684 0-59.267 26.583-59.267 59.267 0 16.812 7.054 31.992 18.328 42.782-16.42 8.164-30.333 21.162-39.542 37.752-3.501 6.296-1.228 14.252 5.082 17.753a12.878 12.878 0 0 0 6.323 1.646c4.598 0 9.053-2.417 11.43-6.728 11.626-20.927 33.716-33.938 57.648-33.938 23.919 0 46.008 12.998 57.648 33.938 3.514 6.31 11.469 8.569 17.766 5.069 6.307-3.501 8.567-11.456 5.066-17.766zm-80.482-47.367c-18.275 0-33.141-14.866-33.141-33.141s14.866-33.141 33.141-33.141c3.867 0 7.577.666 11.025 1.881 12.867 4.559 22.116 16.851 22.116 31.26 0 1.62-.118 3.214-.34 4.768-2.325 16.029-16.146 28.373-32.801 28.373z" />
                            <ellipse transform="rotate(-134.999 306.812 165.492)" style="fill:#fff" cx="306.81" cy="165.491" rx="48.984" ry="29.39" />
                            <path style="fill:#b3b3b3" d="M315.271 184.153a58.919 58.919 0 0 1-3.187 19.164c-7.76-2.743-15.859-7.629-23.279-14.396.222-1.555.34-3.148.34-4.768 0-14.409-9.249-26.701-22.116-31.26-1.62-8.909-.052-16.838 5.147-22.037a18.278 18.278 0 0 1 3.37-2.652c23.109 8.086 39.725 30.11 39.725 55.949z" />
                        </svg>
                    </div>
                    <input list="keywords" name="from" id="from" type="text" class="w-80 h-14 rounded-[4px] bg-gray-50 border border-gray-300 placeholder-gray-400 shadow-md shadow-gray-500 text-gray-900 text-sm  focus:ring-blue-500 focus:border-blue-500 block ps-10 p-2.5" placeholder="From" required>
                    <datalist id="keywords">
                        <?php
                        $sql = "SELECT DISTINCT location from bus_stop;";
                        $result = $conn->query($sql);
                        if ($result->num_rows > 0) {
                            foreach ($result as $row) {
                                $location = $row['location'];
                                echo "<option value='$location'>";
                            }
                        }
                        ?>
                    </datalist>
                </div>

                <div>
                    <svg class="w-10 h-10 mt-[6px]" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" style="enable-background:new 0 0 512 512" xml:space="preserve">
                        <path style="fill:#f95428" d="M154.355 143.545H13.371V31.53h140.984l-40.557 56.008z" />
                        <path style="fill:#2ba5f7" d="M475.25 311.134c-31.174-31.174-81.716-31.174-112.889 0-31.174 31.174-31.174 81.716 0 112.889l56.445 56.445 56.445-56.445c31.172-31.173 31.172-81.715-.001-112.889z" />
                        <circle style="fill:#e6e6e6" cx="418.807" cy="368.159" r="29.08" />
                        <path style="fill:#333" d="M418.804 493.839a13.373 13.373 0 0 1-9.454-3.916l-56.444-56.445c-17.602-17.602-27.296-41.005-27.296-65.898 0-24.893 9.694-48.297 27.296-65.9 17.602-17.602 41.005-27.296 65.898-27.297 24.893 0 48.297 9.694 65.9 27.296 17.602 17.602 27.296 41.005 27.296 65.9s-9.694 48.297-27.296 65.9l-56.445 56.445a13.38 13.38 0 0 1-9.455 3.915zm0-192.714c-17.749 0-34.439 6.913-46.99 19.464-12.552 12.552-19.465 29.24-19.465 46.991s6.913 34.439 19.465 46.99l46.99 46.991 46.991-46.991c12.552-12.551 19.465-29.239 19.465-46.99s-6.913-34.439-19.465-46.99c-12.552-12.552-29.241-19.465-46.991-19.465z" />
                        <path style="fill:#333" d="M418.804 410.612c-23.408 0-42.45-19.044-42.45-42.45s19.042-42.45 42.45-42.45c7.383 0 13.371 5.986 13.371 13.371s-5.987 13.371-13.371 13.371c-8.663 0-15.709 7.048-15.709 15.709s7.048 15.709 15.709 15.709 15.709-7.048 15.709-15.709c0-7.385 5.987-13.371 13.371-13.371s13.371 5.986 13.371 13.371c0 23.405-19.043 42.449-42.451 42.449z" />
                        <path style="fill:#4d4d4d" d="M359.768 493.839H183.696c-41.573 0-75.395-33.822-75.395-75.395s33.822-75.395 75.395-75.395h48.276c26.827 0 48.654-21.826 48.654-48.654S258.8 245.74 231.972 245.74H57.592c-7.385 0-13.371-5.986-13.371-13.371 0-7.385 5.986-13.371 13.371-13.371H231.97c41.573 0 75.395 33.822 75.395 75.395s-33.822 75.395-75.395 75.395h-48.276c-26.828 0-48.654 21.826-48.654 48.654s21.826 48.654 48.654 48.654h176.072c7.383 0 13.371 5.986 13.371 13.371s-5.986 13.372-13.369 13.372z" />
                        <path style="fill:#333" d="m130.307 87.538 34.879-48.165a13.37 13.37 0 0 0-10.829-21.212H13.371C5.986 18.161 0 24.147 0 31.531v200.84c0 7.385 5.986 13.371 13.371 13.371s13.371-5.986 13.371-13.371v-75.454h127.614a13.37 13.37 0 0 0 10.829-21.212l-34.878-48.167zm-27.339 7.842 25.197 34.794H26.741V44.9h101.424l-25.197 34.794a13.378 13.378 0 0 0 0 15.686z" />
                    </svg>
                </div>

                <!-- To Location -->
                <div class="relative max-w-lg">
                    <!-- <label for="to" class="sr-only">To</label> -->
                    <div class="absolute inset-y-0 start-0 flex items-center ps-2 pointer-events-none">
                        <svg class="w-6 h-6" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" style="enable-background:new 0 0 512 512" xml:space="preserve">
                            <circle style="fill:#ccc" cx="255.936" cy="255.998" r="243.449" />
                            <path style="fill:#e6e6e6" d="M255.941 468.079C139 468.079 43.862 372.94 43.862 256.001S139 43.921 255.941 43.921s212.078 95.138 212.078 212.078-95.138 212.08-212.078 212.08z" />
                            <path style="fill:#f95428" d="m381.297 130.643-112.818 309.57-54.002-142.749-142.749-54.002z" />
                            <path style="fill:#e54728" d="m214.477 297.464 166.82-166.821-112.818 309.57z" />
                            <path style="fill:#333" d="M268.479 452.762a12.55 12.55 0 0 1-11.738-8.109l-51.998-137.455-137.455-51.999a12.55 12.55 0 0 1 .143-23.527l309.57-112.82a12.547 12.547 0 0 1 16.086 16.086l-112.819 309.57a12.549 12.549 0 0 1-11.714 8.252c-.025.002-.052.002-.075.002zM107.775 243.681l111.142 42.044a12.548 12.548 0 0 1 7.297 7.297l42.045 111.142 92.024-252.508-252.508 92.025z" />
                            <path style="fill:#333" d="M255.94 512c-68.38 0-132.667-26.629-181.02-74.98-99.814-99.815-99.814-262.224 0-362.039C123.272 26.629 187.561 0 255.94 0s132.667 26.629 181.02 74.981 74.981 112.639 74.981 181.02-26.629 132.667-74.981 181.02l-8.873-8.873 8.873 8.873C388.607 485.371 324.32 512 255.94 512zm0-486.902c-61.675 0-119.66 24.017-163.272 67.63-90.029 90.029-90.029 236.516 0 326.544 43.611 43.613 101.596 67.63 163.272 67.63 61.677 0 119.662-24.017 163.273-67.63 43.613-43.611 67.631-101.596 67.631-163.272s-24.019-119.66-67.631-163.273C375.601 49.115 317.616 25.098 255.94 25.098z" />
                        </svg>
                    </div>
                    <input list="keywords" type="text" name="to" id="to" class="w-80 h-14 bg-gray-50 border border-gray-300 placeholder-gray-400 shadow-md shadow-gray-500 text-gray-900 text-sm rounded-[4px] focus:ring-blue-500 focus:border-blue-500 block ps-10 p-2.5" placeholder="To" required>
                    <datalist id="keywords">
                        <?php
                        $sql = "SELECT DISTINCT location from bus_stop;";
                        $result = $conn->query($sql);
                        if ($result->num_rows > 0) {
                            foreach ($result as $row) {
                                $location = $row['location'];
                                echo "<option value='$location'>";
                            }
                        }
                        ?>
                    </datalist>
                </div>

                <!-- Bus Type -->
                <div class="relative max-w-lg mx-2">
                    <!-- <label for="coach_type" class="sr-only font-raleway">Coach Type</label> -->
                    <select name="coach_type" id="coach_type" required
                        class="w-40 h-14 bg-gray-50 border border-gray-300 placeholder-gray-400 shadow-md shadow-gray-500 text-gray-900 text-sm rounded-[4px] focus:ring-blue-500 focus:border-blue-500 block ps-10 p-2.5">
                        <option class="font-raleway" value="">Coach Type</option>
                        <option class="font-raleway" value="AC">AC</option>
                        <option class="font-raleway" value="Non AC">Non AC</option>
                    </select>
                </div>
                <!-- Date -->
                <div class="relative max-w-lg">
                    <!-- <label for="date" class="sr-only">Date</label> -->
                    <input type="date" name="date" id="date" required
                        class="w-40 h-14 bg-gray-50 border border-gray-300 placeholder-gray-400 shadow-md shadow-gray-500 text-gray-900 text-sm rounded-[4px] focus:ring-blue-500 focus:border-blue-500 block ps-10 p-2.5">
                </div>
                <!-- Submit Button -->
            </div>
            <div>
                <button type="submit" class="ml-[6%] w-[88%] h-12 text-white bg-gradient-to-r from-green-400 via-green-500 to-green-600 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-green-300 shadow-md shadow-green-500/50 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-6">Search</button>
            </div>
        </form>
    </div>
</body>

</html>