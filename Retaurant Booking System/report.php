<?php
    require_once ("Includes/session.php");
    require_once ("DB/DBCre.php");
    require_once ("DB/connectDB.php");
    include("Includes/header.php");

    $isAdmin = $_SESSION['isAdmin'];

    if(!$_SESSION['email']){
        header("Location:login.php");
    }else if($isAdmin == 0){
        header("Location:index.php");
    }
?>

<div>
    <div>
        <table>
            <tr>
                <td><div id="menutab"><a href="/generalReport.php">General Report</a></div></td>
                <td><div id="menutab"><a href="/reportByEmail.php">Report by Email</a></div></td>
                <td><div id="menutab"><a href="/reportByLocation.php">Report by Location</a></div></td>
            </tr>
        </table>
    </div>
</div>
