<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Add the evo-calendar.css for styling -->
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/evo-calendar@1.1.2/evo-calendar/css/evo-calendar.min.css"/>
    <link rel="stylesheet" href="evo-calendar.midnight-blue.min.css">
    <link rel="stylesheet" href="evo-calendar.orange-coral.mincss">
    <title>Event Calendar</title>
    <style>

    </style>
</head>
<body>
<div id="calendar"></div>

<!-- Add jQuery library (required) -->
<script src="https://cdn.jsdelivr.net/npm/jquery@3.4.1/dist/jquery.min.js"></script>

<!-- Add the evo-calendar.js for functionality -->
<script src="https://cdn.jsdelivr.net/npm/evo-calendar@1.1.2/evo-calendar/js/evo-calendar.min.js"></script>

<script>
    let specificDate;


$(document).ready(function () {
    $.ajax({
    url: 'fetch_events.php', // Path to your PHP file for fetching events
    method: 'GET',
    dataType: 'json',
    success: function(data) {
        // Process the data received from PHP
        console.log(data);
        // Accessing each event's id, title, and date
        data.forEach(function(event) {
            var id = event.id;
            var title = event.title;
            var date = event.date;
            // console.log("ID: " + id + ", Title: " + title + ", Date: " + date);
            <?php ?>
            specificDate = date;
            $("#calendar").evoCalendar({
                calendarEvents: [
            {
                id: 'bHay68s', // Event's ID (required)
                name: "New Year", // Event name (required)
                date: specificDate, // Event date (required)
                type: "holiday", // Event type (required)
                everyYear: true // Same event every year (optional)
            },
            {
                name: "Vacation Leave",
                badge: "02/13 - 02/15", // Event badge (optional)
                date: ["February/13/2020", "February/15/2020"], // Date range
                description: "Vacation leave for 3 days.", // Event description (optional)
                type: "event",
                color: "#63d867" // Event custom color (optional)
            }
            ]
            });
            console.log("ID: " + id + ", Title: " + title + ", Date: " + date);
            // Now you can use these values as needed
        });
    },
    error: function(xhr, status, error) {
        console.error('AJAX Error: ' + status + ' - ' + error);
    }
});
});

</script>
<script src="evo-calendar.min.js"></script>
</body>
</html>
