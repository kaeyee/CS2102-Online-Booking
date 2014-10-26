<?php
    require_once ("Includes/session.php");
    require_once ("DB/DBCre.php");
    require_once ("DB/connectDB.php");
    include("Includes/header.php");

    if(!$_SESSION['email']){
        header("Location:login.php");
    }

    $emailSubmitted = $_SESSION['email'];

    $query = "SELECT B_Id, Email_Address, Time, Date, No_Table, Location, Remark, Created_On FROM booking_record WHERE Email_Address = ?";
        $statement = $databaseConnection -> prepare($query);
        $statement -> bind_param('s', $emailSubmitted);
        $statement -> execute();
        $statement -> bind_result($B_Id, $Email_Address, $Time, $Date, $No_Table, $Location, $Remark, $Created_On);
       
            // create table's titles
            echo '<table align="left" cellspacing="5" cellpadding="8">
            <tr>
                <td align="left"><b>B_Id</b></td>
                <td align="left"><b>Email_Address</b></td>
                <td align="left"><b>Time</b></td>
                <td align="left"><b>Date</b></td>
                <td align="left"><b>No_Table</b></td>
                <td align="left"><b>Location</b></td>
                <td align="left"><b>Remark</b></td>
            </tr>'; 
        
        while($statement -> fetch()){
            echo'<tr><td align="left">' .
                $B_Id             . '</td><td align="left">' .
                $Email_Address    . '</td><td align="left">' .
                $Time             . '</td><td align="left">' .
                $Date             . '</td><td align="left">' .
                $No_Table           . '</td><td align="left">' .
                $Location         . '</td><td align="left">' .
                $Remark           . '</td><td align="left">' ;
                echo '<input type="submit" name="edit" id= "'.$B_Id.'" value="Edit" onclick= "editRow(id)" />'; 
                echo '<input type="submit" name="delete" id= "'.$B_Id.'" value="Delete" onclick= "deleteRow(id)"/>';
               // <td><input id="'.$B_Id.'" class="delete" type="button" value="Delete" /></td>
                echo '</tr>';
        }
        echo '</table>';
?>
<script type="text/javascript">
    function editRow(id) {
        $url = "edit.php?ID=";
        $url = $url + id;
        window.location.href = $url;
    };
</script>

<script type="text/javascript">
    function deleteRow(id) {
        if (confirm("Sure you want to delete this update? There is NO undo!")) {
            $url = "delete.php?ID=";
            $url = $url + id;
            window.location.href = $url;
        }
    }
</script>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <title></title>
        <style type="text/css">
            td {
                border: 1px dashed black;
            }
        </style>
    </head>
    <body>
        
    </body>
</html>
