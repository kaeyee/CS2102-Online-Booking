<?php
    require_once ("Includes/session.php");
    require_once ("DB/DBCre.php");
    require_once ("DB/connectDB.php");
    include("Includes/header.php");
?>

<script type="text/javascript">
    function editRow() {
        window.location.href = "index.php";
    };

    function deleteRow() {
        window.location.href = "index.php";
    };
</script>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <title></title>
        <style type="text/css">
            td {
                border:  1px solid black;
            }
        </style>
    </head>
    <body>
        <form id="searchForm" action="adminMod.php" method="post">
            <fieldset>
                <legend>Search for Booking Record based on Email</legend>
                 Email: <input type="text" id="email" name="email">
                <br><br>
                <input type="submit" id="btnSubmit" name="submit" value="Submit"/>
            </fieldset>
        </form>

    <?php
    if(isset($_POST['submit'])){
        $emailSubmitted = trim($_POST['email']);
        
        $query = "SELECT B_Id, Email_Address, Time, Date, No_Pax, Location, Remark, Created_On FROM booking_record WHERE Email_Address = ?";
        $statement = $databaseConnection -> prepare($query);
        $statement -> bind_param('s', $emailSubmitted);
        $statement -> execute();
        $statement -> bind_result($B_Id, $Email_Address, $Time, $Date, $No_Pax, $Location, $Remark, $Created_On);

       
            // create table's titles
            echo '<table align="left" cellspacing="5" cellpadding="8">
            <tr>
                <td align="left"><b>B_Id</b></td>
                <td align="left"><b>Email_Address</b></td>
                <td align="left"><b>Time</b></td>
                <td align="left"><b>Date</b></td>
                <td align="left"><b>No_Pax</b></td>
                <td align="left"><b>Location</b></td>
                <td align="left"><b>Remark</b></td>
                <td align="left"><b>Created_On</b></td>
            </tr>'; 
        
        while( $statement -> fetch()){
            echo'<tr><td align="left">' .
                $B_Id             . '</td><td align="left">' .
                $Email_Address    . '</td><td align="left">' .
                $Time             . '</td><td align="left">' .
                $Date             . '</td><td align="left">' .
                $No_Pax           . '</td><td align="left">' .
                $Location         . '</td><td align="left">' .
                $Remark           . '</td><td align="left">' .
                $Created_On       . '</td><td align="left">';
                echo '<input type="submit" name="submit" id="editBTN" value="Edit" onclick="editRow()" />';
                echo '<input type="submit" name="submit" id="deleteBTN" value="Delete" onclick="deleteRow()"/>';
                echo '</tr>';
        }
        echo '</table>';
         
     }
    ?>
        
    </body>
</html>
