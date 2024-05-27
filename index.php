<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.metroui.org.ua/current/metro.css">
    <title>Flash Screen</title>
    <style>
        /* CSS for the flash screen */
        .flash-screen {
            position: absolute;
            /* top: 0; */
            /* left: 0; */
            width: 100%;
            height: 100%;
            background-color: rgb(0,0,0); /* Set your desired background color */
            z-index: 9999; /* Ensure the flash screen is on top of other elements */
            /* display: flex; */
            /* justify-content: center; */
            /* align-items: center; */
            animation-name: fadeOut;
            animation-duration: 5s; /* Adjust the duration as needed */
             animation-delay: 5s; /*Delay before the animation starts */
            animation-fill-mode: forwards; /* Ensure the element retains the styles after the animation */
        }

        @keyframes fadeOut {
            0% {
                opacity: 1;
            }
            100% {
                opacity: 20;
                visibility: hidden;
            }
        }
    </style>
</head>
<body>
    <!-- Flash screen -->
 
    <div class="flash-screen">
        <!-- Your Metro UI content goes here -->
        <h1 class="text-center">Lanka Security</h1>
        <!-- <h3 class="text-center;">Lanka Securities Stock Brokers</h3> -->
        <div data-role="cube"></div>

    </div>

    <script>
        // Delay the display of the main content and redirect after a timeout
        setTimeout(function() {
            // document.querySelector('.flash-screen').style.display = 'none';
            // document.querySelector('div').style.display = 'block';
            // Redirect to another webpage after a delay (e.g., 5 seconds)
            setTimeout(function() {
                window.location.href = 'http://localhost:3000/Interfaces/SignInPage/SignIn.php'; // Replace 'https://example.com' with your desired URL
            }, 5000); // Adjust the redirect delay time (in milliseconds) as needed
        }, 4000); // Adjust the delay time for the flash screen (in milliseconds) as needed
    </script>

    <!-- Import Metro UI JavaScript -->
    <script src="https://cdn.metroui.org.ua/current/metro.js"></script>
</body>
</html>
