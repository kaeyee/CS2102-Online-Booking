<?php
    require_once ("DB/DBCre.php");
    require_once ("DB/connectDB.php");
    include("Includes/header.php");
?>
    This is the main page
<!DOCTYPE html>
<html lang="en">
    <body>
        <div>
            <div>
                <p> <a href="/login.php"> Log In here!</a></p>
                <p> <a href="/signup.php"> Sign up here!</a></p>
            </div>
        </div>

<?php
    include ("Includes/footer.php");    

?>