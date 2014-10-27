<?php
    require_once ("Includes/session.php");
    require_once ("DB/DBCre.php");
    require_once ("DB/connectDB.php");
    include("Includes/header.php");
?>
<div>
    Booking Fail! Redirecting to Main Page in 3 seconds.
</div>

<script>setTimeout("location.href = 'index.php';",2000);</script>