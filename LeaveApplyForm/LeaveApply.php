<?php session_start(); ?>
<script>
    function toggleInput() {
        var selectBox = document.getElementById("name");
        var inputField = document.getElementById("date1");
        var inp = document.getElementById("endp");
        
        if (selectBox.value === "Half Day") {
            inp.hidden=true;
            inputField.hidden=true;
            inputField.removeAttribute("required");
            inputField.value ="";
            inputField.name = "endDate";
        } else {
            inp.hidden=false;
            // inputField.style.display = "block";
            inputField.hidden = false;
            inputField.setAttribute("required",true);
        }
    }
</script>
<form method="post" action="../../DataBase/LeaveApplyForm.php" id="AdduserForm">
        
    <div class="Main-Dashboard" style="text-align:center; width:90%; background-color: rgb(205, 215, 253);">
            <!-- <div class="Div-leftContainer" > -->
            <h2>Leave Apply Form</h2>
            <p >Please Fill up the form below</p>
            <p style="margin-bottom:-30px; margin-left:-660px">Select your leave type</p>
                <?php
                if(isset($_SESSION["error"])){
                unset($_SESSION["error"]);
                echo' <select onchange="toggleInput()" name="leaveType" id="name" style="border-color: red; Border-width:1px; border-style: outset;" required>
                    <option value="volvo">-Select Reason-</option>
                    <option value="Annual leave">Annual leave </option>
                    <option value="Casual leave">Casual leave </option>
                    <option value="Medical leave">Medical leave</option>
                    <option value="Work from home">Work from home</option>
                    <option value="Half Day">Half Day</option>
                </select>';
                
                    // echo '<span style=" color:red margin-bottom:0px; margin-left:-660px" id="nameError" class="error" value="'.$_SESSION["error"].'"></span>';
                }else{
                    // echo '<span id="nameError" class="error" value=""></span><br><br>';
                echo' <select onchange="toggleInput()" name="leaveType" id="name" style="border-color: none; Border-width:1px; border-style: outset;" required>
                    <option value="volvo">-Select Reason-</option>
                    <option value="Annual leave">Annual leave </option>
                    <option value="Casual leave">Casual leave </option>
                    <option value="Medical leave">Medical leave</option>
                    <option value="Work from home">Work from home</option>
                    <option value="Half Day">Half Day</option>
                </select>';
                }
                ?>
              
                <?php
                if(isset($_SESSION["error1"])){
                    unset($_SESSION["error1"]);
                    echo '<p style="margin-bottom:-30px; margin-left:-670px">Select Starting Date</p>';
                    echo '<input style="border-color: red; Border-width:1px; border-style: outset;" name="startDate" type ="Date" id="date"  required>';
                    echo '<p id="endp" style="margin-bottom:-30px; margin-left:-700px">Select End Date</p>';
                    echo '<input style="border-color: red; Border-width:1px; border-style: outset;" name="endDate" type ="Date" id="date1"  required>';
                }else  if(isset($_SESSION["error2"])){
                    unset($_SESSION["error2"]);
                    echo '<p style="margin-bottom:-30px; margin-left:-670px">Select Starting Date</p>';
                    echo '<input style="border-color: red; Border-width:1px; border-style: outset;" name="startDate" type ="Date" id="date"  required>';
                    echo '<p id="endp" style="margin-bottom:-30px; margin-left:-700px">Select End Date</p>';
                    echo '<input  name="endDate" type ="Date" id="date1"  required>';
                }else if(isset($_SESSION["error3"])){
                    unset($_SESSION["error3"]);
                    echo '<p style="margin-bottom:-30px; margin-left:-670px">Select Starting Date</p>';
                    echo '<input name="startDate" type ="Date" id="date"  required>';
                    echo '<p id="endp" style="margin-bottom:-30px; margin-left:-700px">Select End Date</p>';
                    echo '<input style="border-color: red; Border-width:1px; border-style: outset;" name="endDate" type ="Date" id="date1"  required>';
                }else{
                    echo '<p style="margin-bottom:-30px; margin-left:-670px">Select Starting Date</p>';
                    echo '<input  name="startDate" type ="Date" id="date"  required>';
                    echo '<p id="endp" style="margin-bottom:-30px; margin-left:-700px">Select End Date</p>';
                    echo '<input  name="endDate" type ="Date" id="date1"  required>';
                }
                ?>
                
                <!-- <p style="margin-bottom:-30px; margin-left:-700px">Select End Date</p>
                <input name="endDate" type ="Date" id="date"  placeholder="Full Name" required> -->


                <p style="margin-bottom:-30px; margin-left:-650px">Describe your condion</p>
                <textarea name="message" type ="text" id="message" placeholder="Type your comments" required style="width: 78%;height: 300px;resize: none; Border:none;border-radius: 10px; padding: 10px; margin-top: 33px; " ></textarea>
                <span id="messageError" class="error"></span><br><br>    
                <!-- <p style="color:red;">Error message here</p> Error message -->

                <button style=" width:260px; " type="submit" value="Submit" >Submit</button>


        </div>
</form>

<script>
    // Get the select element
    const selectElement1 = document.getElementById('date');

    // Add event listener for change event
    selectElement1.addEventListener('input', function() {
    // Get the selected value
    const selectedColor = "white";

    // Change the border color based on the selected value
    this.style.borderColor = selectedColor;});
        // Get the select element
        const selectElement2 = document.getElementById('date1');

        // Add event listener for change event
        selectElement2.addEventListener('input', function() {
        // Get the selected value
        const selectedColor = "white";

        // Change the border color based on the selected value
        this.style.borderColor = selectedColor;});
    // Get the select element
    const selectElement = document.getElementById('name');

    // Add event listener for change event
    selectElement.addEventListener('change', function() {
    // Get the selected value
    const selectedColor = "white";

    // Change the border color based on the selected value
    this.style.borderColor = selectedColor;
    });
</script>
