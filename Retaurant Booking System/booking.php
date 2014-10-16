<?php
    require_once ("Includes/session.php");
    require_once ("DB/DBCre.php");
    require_once ("DB/connectDB.php");
    include("Includes/header.php");

    if(!$_SESSION['email']){
        header("Location:login.php");
    }
    ?>

<div id="main">
    <h2>Booking for a seat now!</h2>
    <form action="booking.php" id="formBooking" method="post">
        <fieldset>
        <legend>Booking</legend>
            <label for="fName">First Name: </label>
            <input type="text" id="txtFName"/>
            <br><br>
            <label for="lName">Last Name: </label>
            <input type="text" id="txtLName"/>
            <br><br>
            <label for="email">Email Address: </label>
            <input type="text" id="txtEmail" disabled/>
            <br><br>
            <label for="location">Location: </label>
            <input type="text" id="txtLocation"/>
            <br><br>
            <label for="bookingDate">Date: </label>
            <input type="date" id="txtDate"/>
            <br><br>
            <label for="bookingTime">Time: </label>
            <input type="text" id="txtTime"/>
            <br><br>
            <label for="numTable">Number of Table: </label>
            <input type="number" id="txtTable"/>
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
        $.ajax({
            type: "POST",
            url: "/getDetails.php",
            dataType: "Json",
            success: function (result) {
                $("#txtFName").val(result.fName);
                $("#txtLName").val(result.lName);
                $("#txtEmail").val(result.email);
            }
        });
    })

</script>