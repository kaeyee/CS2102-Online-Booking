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
                        <td style="width: 150px"><a href="/login.php">Log In</a></td>
                        <td style="width: 150px"><a href="/signup.php">Sign up</a></td>
                    </tr>
                </table>
            </div>
        </div>';
    }
    else {
        echo "Hi,".$_SESSION['lName'];
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
                            <td style="width: 150px"><a href="/booking.php">Make Reservation</a></td>
                            <td style="width: 150px"><a href="/adminMod.php">Admin edit</a></td>
                            <td style="width: 150px"><a href="/report.php">Report</a></td>
                            <td style="width: 150px"><a href="/logout.php">Log out </a></td>
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
                            <td style="width: 150px"><a href="/booking.php">Make Reservation</a></td>
                            <td style="width: 150px"><a href="/userMod.php">User edit</a></td>
                            <td style="width: 150px"><a href="/logout.php">Log out</a></td>
                        </tr>
                    </table>
                </div>
            </div>';
        }
    }

    
    include ("Includes/footer.php");    
    
?>
