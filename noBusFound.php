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

<body class="bg-gray-100 flex items-center justify-center min-h-screen">

    <div class="bg-white shadow-lg rounded-lg p-6 max-w-md w-full text-center">
        <!-- Icon -->
        <div class="text-red-500 mb-4">
            <svg xmlns="http://www.w3.org/2000/svg" class="w-16 h-16 mx-auto" fill="none" viewBox="0 0 24 24"
                stroke="currentColor" stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round"
                    d="M12 9v2m0 4h.01m6.938-5.496a9 9 0 11-13.856 0m13.856 0L12 3m0 0L5.062 9.504m6.938 0v6" />
            </svg>
        </div>

        <!-- Heading -->
        <h1 class="text-xl font-semibold text-gray-800 mb-2">No Bus Found</h1>

        <!-- Message -->
        <p class="text-gray-600 mb-6">
            We couldn’t find any buses for the selected route or time. Please try a different search.
        </p>

        <!-- Button -->
        <a href="userHome.php"
            class="px-4 py-2 bg-blue-500 hover:bg-blue-600 text-white font-medium rounded-md transition duration-300">
            Go Back to Search
        </a>
    </div>

</body>

</html>