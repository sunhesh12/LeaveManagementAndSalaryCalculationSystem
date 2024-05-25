<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Hide or Show Input Field Based on Select Option</title>
<script>
    function toggleInput() {
        var selectBox = document.getElementById("mySelect");
        var inputField = document.getElementById("textInput");
        
        if (selectBox.value === "option1") {
            inputField.style.display = "none";
        } else {
            inputField.style.display = "block";
        }
    }
</script>
</head>
<body>

<select id="mySelect" onchange="toggleInput()">
    <option value="option1">Option 1</option>
    <option value="option2">Option 2</option>
</select>

<input type="text" id="textInput" style="display: none;" placeholder="Enter something">

</body>
</html>
