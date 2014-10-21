<?php
    require_once ("Includes/session.php");
    require_once ("DB/DBCre.php");
    require_once ("DB/connectDB.php");
    include("Includes/header.php");

        $query = "SELECT B_Id, Email_Address, Time, Date, No_Pax, Location, Remark, Created_On FROM booking_record";
        $response = @mysqli_query($databaseConnection, $query);

        if($response){
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
            
            while($row = mysqli_fetch_array($response)){
                echo'<tr><td align="left" id="B_Id">' .//used to identify rows
                $row['B_Id'] . '</td><td align="left">' .
                $row['Email_Address']    . '</td><td align="left">' .
                $row['Time']     . '</td><td align="left">' .
                $row['Date']    . '</td><td align="left">' .
                $row['No_Pax']      . '</td><td align="left">' .
                $row['Location']  . '</td><td align="left">' .
                $row['Remark']      . '</td><td align="left">' .
                $row['Created_On']    . '</td><td align="left">';
                echo '<input type="submit" name="submit" id="editBTN" value="Edit" onclick="editRow()" />';
                echo '<input type="submit" name="submit" id="deleteBTN" value="Delete" onclick="deleteRow()"/>';
                echo '</tr>';
            }

            echo '</table>';
            
        }else{
            echo "couldn't connect to database";
            echo mysqli_error($databaseConnection);
        }
?>

<script type="text/javascript">
    function editRow() {
        window.location.href = "index.php";
    };

    function deleteRow(){
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
        
    </body>
</html>
