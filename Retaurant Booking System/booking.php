<?php
    require_once ("Includes/session.php");
    require_once ("DB/DBCre.php");
    require_once ("DB/connectDB.php");
    include("Includes/header.php");

    if(!$_SESSION['email']){
        header("Location:login.php");
    }

    if (isset($_POST['submit']))
    {
        $fName = $_POST['fname'];
        $lName = $_POST['lName'];
        $phoneNum = $_POST['phoneNum'];
        $email = $_SESSION['email'];
        $location = $_POST['location'];
        $date = $_POST['date'];
        $time = $_POST['time'];
        $numPax = $_POST['numPax'];
        $remark = $_POST['remark'];
        $createdOn = date('Y-m-d H:i:s');

        $recordQuery = "INSERT INTO booking_record(Email_Address,Time, Date, No_Pax, Location, Remark, Created_On) VALUES (?, ?, ?, ?, ?, ?, ?) ";
        $recordStatement = $databaseConnection -> prepare($recordQuery);
        $recordStatement -> bind_param('sisisss', $email, $time, $date, $numPax, $location, $remark, $createdOn);
        $recordStatement -> execute();
        $recordStatement -> store_result();

        $creationWasSuccessful = $recordStatement->affected_rows == 1 ? true : false;
        if ($creationWasSuccessful)
        {
            echo "Successful!";
        }
        else{
            echo "Fail";
        }

    }
    ?>

<div id="main">
    <h2>Book a seat now!</h2>
    <form id="formBooking" action="booking.php" method="post">
        <fieldset>
        <legend>Booking</legend>
            <label for="fName">First Name: </label>
            <input type="text" id="txtFName" name="fName"/>
            <br><br>
            <label for="lName">Last Name: </label>
            <input type="text" id="txtLName" name="lName"/>
            <br><br>
            <label for="phoneNum">Contact: </label>
            <input type="text" id="txtPhoneNum" name="phoneNum"/>
            <br><br>
            <label for="email">Email Address: </label>
            <input type="text" id="txtEmail" name="email" disabled/>
            <br><br>
            <label for="location">Location: </label>
            <select name="location" id="location">
                <option value="" disabled>Select Location</option>
                <?php
                $query = "SELECT location FROM restaurant";
                $statement = $databaseConnection ->prepare($query);
                $statement -> execute();
                $result = $statement->get_result();
                while($row = $result ->fetch_array(MYSQLI_NUM)) 
                {
                    foreach($row as $r){
                       echo"<option value=\"".$r."\">".$r."</option><br>";
                    }
                }
                ?>
            </select>
            <br><br>
            <label for="bookingDate">Date: </label>
            <input type="date" id="txtDate" name="date" min="2014-10-20"/>
            <br><br>
            <label for="bookingTime">Time: </label>
            <select name="time" id="time">
                <option value="" disabled>Lunch</option>
                <option value="1130">11:30</option>
                <option value="1200">12:00</option>
                <option value="1230">12:30</option>
                <option value="" disabled>Dinner</option>
                <option value="1800">18:00</option>
                <option value="1830">18:30</option>
                <option value="1900">19:00</option>
            </select>
            <br><br>
            <label for="numTable">No. of Pax: </label>
            <select name="numPax" id="numPax">
                <?php
                    for($i=1;$i<=15;$i++){
                        echo "<option value=\"".$i."\">".$i."</option><br>";
                    }
                ?>
            </select>
            <br><br>
            <label for="remark">Remark: </label>
            <textarea name="remark" id="txtremark" rows="5" cols="40"></textarea>
            <br><br>
            <input type="submit" value="Submit" name="submit" id="submit"/>
        </fieldset>
    </form>
</div>



<?php
    include ("Includes/footer.php");    
?>

<script type="text/javascript">
    $(document).ready(function () {
        var message = "";
        var today = new Date();
        today.setDate(today.getDate() + 1);
        var d= today.toISOString().split('T')[0];
        $("#txtDate")[0].setAttribute('min', d);
        
        $.ajax({
            type: "POST",
            url: "/getDetails.php",
            dataType: "Json",
            success: function (result) {
                $("#txtFName").val(result.fName);
                $("#txtLName").val(result.lName);
                $("#txtEmail").val(result.email);
                $("#txtPhoneNum").val(result.phoneNum);
            }
        });


        $("#formBooking").submit(function (event) {
            if ($("#txtFName").val().length == 0) {
                message = message + "First Name is required.\n";
            }
            if ($("#txtLName").val().length == 0) {
                message = message + "Last Name is required.\n";
            }
            if ($("#txtPhoneNum").val().length == 0) {
                message = message + "Contact is required.\n";
            }
            if ($("#txtEmail").val().length == 0) {
                message = message + "Email Address is required.\n";
            }
            if ($("#location").val().length == 0) {
                message = message + "Location is required.\n";
            }
            if ($("#txtDate").val().length == 0) {
                message = message + "Date is required.\n";
            }
            if ($("#time").val().length == 0) {
                message = message + "Booking time is required.\n";
            }
            if ($("#numPax").val().length == 0) {
                message = message + "No. of Pax is required.\n";
            }
            if (!IsEmail($("#email").val())) {
                message = message + "Invalid email format.\n";
            }
            if (!IsPhoneNum($("#phoneNum").val()) || $("#phoneNum").val().length != 8) {
                message = message + "Invalid phone number format.\n";
            }
            if (message.length > 0) {
                alert(message);
                event.preventDefault();
            }
            message = "";
        });
    })

    function IsEmail(email) {
        var regex = /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/;
        return regex.test(email);
    }

    function IsPhoneNum(txtPhone) {
        var filter = /^[0-9]+$/;
        return filter.test(txtPhone);
    }

</script>