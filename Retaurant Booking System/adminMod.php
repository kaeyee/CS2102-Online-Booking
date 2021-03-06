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
                <legend>Search for Booking Record based on Email AND/OR Location (Results are ordered by date followed by time)</legend>
                Email: <input type="text" id="email" name="email"> 
                <br><br>
                Location: <select name="location" id="location">
                <option value="">Select Location</option>
                <?php
                $query = "SELECT location FROM restaurant";
                $statement = $databaseConnection ->prepare($query);
                $statement -> execute();
                $result = $statement->get_result();
                while($row = $result ->fetch_array(MYSQLI_NUM)){
                    foreach($row as $r){
                       echo"<option value=\"".$r."\">".$r."</option><br>";
                    }
                }
                ?>
                </select>
                <br><br>
                <input type="submit" id="btnSubmit" name="submit" value="Submit"/>
            </fieldset>
        </form>

    <?php
    if(isset($_POST['submit'])){
        $emailSubmitted = trim($_POST['email']);
        $locationSubmitted = $_POST['location'];

        if($emailSubmitted == "" && $locationSubmitted == ""){
            echo "Please fill in at least 1 field!";
        }else{
            if($emailSubmitted != "" && $locationSubmitted != ""){
                $query = "SELECT B_Id, Email_Address, Time, Date, No_Table, Location, Remark, Created_On FROM booking_record WHERE Email_Address = ? AND Location = ? ORDER BY DATE, TIME";
                $statement = $databaseConnection -> prepare($query);
                $statement -> bind_param('ss', $emailSubmitted, $locationSubmitted);
            }else if($emailSubmitted != "" && $locationSubmitted == ""){
                $query = "SELECT B_Id, Email_Address, Time, Date, No_Table, Location, Remark, Created_On FROM booking_record WHERE Email_Address = ? ORDER BY DATE, TIME";
                $statement = $databaseConnection -> prepare($query);
                $statement -> bind_param('s', $emailSubmitted);
            }else if($emailSubmitted == "" && $locationSubmitted != ""){
                $query = "SELECT B_Id, Email_Address, Time, Date, No_Table, Location, Remark, Created_On FROM booking_record WHERE Location = ?  ORDER BY DATE, TIME";
                $statement = $databaseConnection -> prepare($query);
                $statement -> bind_param('s', $locationSubmitted);
            }

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
                    <td align="left"><b>Created_On</b></td>
             </tr>'; 
        
            while($statement -> fetch()){
                echo'<tr><td align="left">' .
                    $B_Id             . '</td><td align="left">' .
                    $Email_Address    . '</td><td align="left">' .
                    $Time             . '</td><td align="left">' .
                    $Date             . '</td><td align="left">' .
                    $No_Table           . '</td><td align="left">' .
                    $Location         . '</td><td align="left">' .
                    $Remark           . '</td><td align="left">' .
                    $Created_On       . '</td><td align="left">';
                    echo '<input type="submit" name="edit" id= "'.$B_Id.'" value="Edit" onclick= "editRow(id)" />'; 
                    echo '<input type="submit" name="delete" id= "'.$B_Id.'" value="Delete" onclick= "deleteRow(id)"/>';
                    echo '</tr>';
            }
            echo '</table>';
         }
    }
    ?>
        
    </body>
</html>
