<?php
    require_once ("Includes/session.php");
    require_once ("DB/DBCre.php");
    require_once ("DB/connectDB.php");
    include("Includes/header.php");

    if(!$_SESSION['email']){
        echo ' <div>
            <div>
                <table>
                    <tr>
                        <td><div id="menutab"><a href="/login.php">Log In</a></div></td>
                        <td><div id="menutab"><a href="/signup.php">Sign up</a></div></td>
                    </tr>
                </table>
            </div>
        </div>';
    }
    else {
        echo "Hi, ".$_SESSION['lName'];
        echo "<br>";
        echo "<div>
                    &nbsp;
                </div>";
        if($_SESSION['isAdmin']==1){
            echo '
            <div>
                <div>
                    <table>
                        <tr>
                            <td><div id="menutab"><a href="/booking.php">Make Reservation</a></div></td>
                            <td><div id="menutab"><a href="/adminMod.php">Admin edit</a></div></td>
                            <td><div id="menutab"><a href="/report.php">Report</a></div></td>
                            <td><div id="menutab"><a href="/logout.php">Log out</a></div></td>
                        </tr>
                    </table>
                </div>
            </div>';
        }
        else{
            echo '
            <div>
                <div>
                    <table>
                        <tr>
                            <td><div id="menutab"><a href="/booking.php">Make Reservation</a></div></td>
                            <td><div id="menutab"><a href="/userMod.php">User edit</a></div></td>
                            <td><div id="menutab"><a href="/logout.php">Log out</a></div></td>
                        </tr>
                    </table>
                </div>
            </div>';
        }
    }

    
    include ("Includes/footer.php");    
    
?>
