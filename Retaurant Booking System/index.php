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
                <p> <a href="/booking.php"> Book Tables here!</a></p>
                <p> <a href="/logout.php"> Log out here!</a></p>
                <br />
                 <p> <a href="/adminEdit.php"> Admin edit</a></p>
            </div>
        </div>
    </body>
</html>
<?php
    include ("Includes/footer.php");    

?>