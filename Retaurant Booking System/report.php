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
                <td style="width: 150px"><a href="/generalReport.php">General Report</a></td>
                <td style="width: 150px"><a href="/reportByEmail.php">Report by Email</a></td>
                <td style="width: 150px"><a href="/reportByLocation.php">Report by Location</a></td>
            </tr>
        </table>
    </div>
</div>
