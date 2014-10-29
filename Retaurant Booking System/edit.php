<?php
   require_once ("Includes/session.php");
   require_once ("DB/DBCre.php");
   require_once ("DB/connectDB.php");
   include("Includes/header.php");

     if(empty($_SESSION['email'])){
       header("Location: index.php");
    }
     $email = ($_SESSION['email']);
     $isAdmin = $_SESSION['isAdmin'];

     //the parameter is passed by entering the B_Id to the url
     $UID = intval($_GET['ID']);            
     $findQuery ="SELECT * FROM booking_record where B_Id = ?";
     $findStatement = $databaseConnection -> prepare($findQuery);
     $findStatement -> bind_param('i', $UID);
     $findStatement -> execute();
     $findStatement -> store_result();
     $findStatement -> bind_result($b_id,$r_email,$time,$date,$no_table,$location,$remark,$created_on);
     $findStatement -> fetch();

     //check whether the person is authorized to edit the item
     if($isAdmin==0){       
             if(!($r_email == $email)){
                  header("Location: editFail_authorized.php");
             }
     }

     //check whether the record has passed if the user is authorized
     else{
         $date1 = new DateTime("now");
         $date2 = new DateTime($date);

        if($date2<$date1){
              header("Location: editFail_date.php");
        }
     }

    if (isset($_POST['submit'])){
        $ud_time = $_POST["time"];
        $ud_date = $_POST["date"];
        $ud_no_table = $_POST["numTable"];
        $ud_location = $_POST["location"];
        $ud_remark = $_POST["remark"];
        $ModifieddOn = date('Y-m-d H:i:s');

        //get number of tables from the location entered
        $getTableQuery = "SELECT No_Tables FROM restaurant WHERE location=?";
        $getTableStatement = $databaseConnection -> prepare($getTableQuery);
        $getTableStatement -> bind_param('s',  $ud_location);
        $getTableStatement -> execute();
        $getTableStatement -> store_result();
        $getTableStatement -> bind_result($maxTable);
        $getTableStatement -> fetch();

        //get previous location
        $getPreviousLocation = "SELECT Location FROM booking_record WHERE B_Id = ?";
        $getPreviousLocationStatement = $databaseConnection -> prepare($getPreviousLocation);
        $getPreviousLocationStatement -> bind_param('i', $UID);
        $getPreviousLocationStatement -> execute();
        $getPreviousLocationStatement -> store_result();
        $getPreviousLocationStatement -> bind_result($previousLocation);
        $getPreviousLocationStatement -> fetch();

        if($ud_time == 1130 || $ud_time == 1200 || $ud_time == 1230){
            $checkBookedTableQuery = "SELECT SUM(No_Table) FROM booking_record WHERE (Time=1130 or Time=1200 or Time=1230) AND location =? AND Date =?";
            $isLunch = true;
        }else if($ud_time == 1800 || $ud_time == 1830 || $ud_time == 1900){
            $checkBookedTableQuery = "SELECT SUM(No_Table) FROM booking_record WHERE (Time=1800 or Time=1830 or Time=1900) AND location =? AND Date =?";
            $isLunch = false;
        }

        $checkBookedTableStatement = $databaseConnection -> prepare($checkBookedTableQuery);
        $checkBookedTableStatement -> bind_param('ss', $ud_location, $ud_date);
        $checkBookedTableStatement ->execute();
        $checkBookedTableStatement -> store_result();
        $checkBookedTableStatement -> bind_result($takenTable);
        $checkBookedTableStatement -> fetch();

        if($previousLocation === $ud_location){
            //get number of tables from the previous location
            $getPreviousTable = "SELECT No_Table FROM booking_record WHERE B_Id = ?";
            $getPreviousTableStatement = $databaseConnection -> prepare($getPreviousTable);
            $getPreviousTableStatement -> bind_param('i', $UID);
            $getPreviousTableStatement -> execute();
            $getPreviousTableStatement -> store_result();
            $getPreviousTableStatement -> bind_result($previousTable);
            $getPreviousTableStatement -> fetch();

             $availTable = $maxTable - $takenTable + $previousTable;
        }else{
             $availTable = $maxTable - $takenTable ;
        }

        if($availTable >= $ud_no_table){
            $updateQuery= "UPDATE booking_record SET Time = ?, 
                                               Date = ?, 
                                               No_Table = ?,
                                               Location = ?,
                                               Remark = ? WHERE B_Id ='$b_id'";

            $updateStatement = $databaseConnection -> prepare($updateQuery);
            $updateStatement -> bind_param('isiss', $ud_time, $ud_date, $ud_no_table, $ud_location, $ud_remark);
            $updateStatement -> execute();
            $updateStatement -> store_result();
            $updateWasSuccessful = $updateStatement->affected_rows == 1 ? true : false;
            $updateStatement -> fetch();

            if ($updateWasSuccessful){
                echo "Edit Successfully!";
                if($isAdmin==1){
                     echo "<script>setTimeout(\"location.href = 'adminMod.php';\",1000);</script>";
                }else{
                     echo "<script>setTimeout(\"location.href = 'userMod.php';\",1000);</script>";
                }
            }else{
                echo "Fail";
            }

            $ModifieddOn = date('Y-m-d H:i:s');

            $insert_edit_query= "INSERT INTO edit (B_Id, Email_Address, Modified_On) VALUES(?, ?, ?) ";
            $insert_edit_Statement = $databaseConnection -> prepare($insert_edit_query);
            $insert_edit_Statement -> bind_param('iss', $b_id, $r_email, $ModifieddOn);
            $insert_edit_Statement -> execute();
            $insert_edit_Statement -> store_result();
            $insertWasSuccessful = $insert_edit_Statement->affected_rows == 1 ? true : false;
            $insert_edit_Statement -> fetch();
        }else{
            echo "Sorry, we left with ". $availTable." available table(s) in this location.";
        }
    }
?>

<?php
         echo '<table align="left" cellspacing="5" cellpadding="8">
            <tr>
                <td align="left"><b>BId</b></td>
                <td align="left"><b>Email Address</b></td>
                <td align="left"><b>Time</b></td>
                <td align="left"><b>Date</b></td>
                <td align="left"><b>No Table</b></td>
                <td align="left"><b>Location</b></td>
                <td align="left"><b>Remark</b></td>
            </tr>'; 

        echo'<tr><td align="left">' .
                $UID             . '</td><td align="left">' .
                $r_email    . '</td><td align="left">' .
                $time             . '</td><td align="left">' .
                $date             . '</td><td align="left">' .
                $no_table           . '</td><td align="left">' .
                $location         . '</td><td align="left">' .
                $remark           . '</td><td align="left">' ;
    echo '</tr>';
?>
<div id="main">
    <h1>Fill in the following to update your booking</h1>

    <form id="editBooking" action="edit.php?ID=<?php echo "$UID" ?>" method="post">
        <fieldset>
        <legend>update</legend>
            <label for="location">Location: </label>
            <select name="location" id="location">
                <option value="" disabled>Select Location</option>
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
            <label for="bookingDate">Date: </label>
            <input type="date" id="txtDate" name="date" min="2014-10-20" value= ""/>
            <br><br>
            <label for="bookingTime">Time: </label>
            <select name="time" id="time">
                <option value="" disabled>Lunch</option>
                <option value="1130">11:30</option>
                <option value="1200">12:00</option>
                <option value="1230">12:30</option>
                <option value="" disabled>Dinner</option>
                <option value="1800">18:00</option>
                <option value="1830">18:30</option>
                <option value="1900">19:00</option>
            </select>
            <br><br>
            <label for="numTable">No. of Table: </label>
            <select name="numTable" id="numTable">
                <?php
                    for($i=1;$i<=5;$i++){
                        echo "<option value=\"".$i."\">".$i."</option><br>";
                    }
                ?>
            </select>
            <br><br>
            <label for="remark">Remark: </label>
            <textarea name="remark" id="txtremark" rows="5" cols="40" onkeyup="textCounter(this.form.remark, this.form.countDisplay)" onkeydown="textCounter(this.form.remark, this.form.countDisplay)"></textarea>
            <input name="countDisplay" type="text" size="3" value="80" disabled /> Characters Remaining
            <br><br>
            <input type="submit" value="Submit" name="submit" id="submit"/>
        </fieldset>
    </form>

</div>


<?php
    include ("Includes/footer.php");    

?>

<script type="text/javascript">
    $(document).ready(function () {
        var message = "";
        var today = new Date();
        today.setDate(today.getDate() + 1);
        var d= today.toISOString().split('T')[0];
        $("#txtDate")[0].setAttribute('min', d);
        $("#editBooking").submit(function (event) {
            if ($("#location").val().length == 0) {
                message = message + "Location is required.\n";
            }
            if ($("#txtDate").val().length == 0) {
                message = message + "Date is required.\n";
            }
            if ($("#time").val().length == 0) {
                message = message + "Booking time is required.\n";
            }
            if ($("#numTable").val().length == 0) {
                message = message + "No. of Table is required.\n";
            }

            if (message.length > 0) {
                alert(message);
                event.preventDefault();
            }
            message = "";
        });
    })
 
	var maxLength = 80;
		
	function textCounter(ta, cd){
		if(ta.value.length > maxLength){
			ta.value = ta.value.substring(0, maxLength);
		}else{
			cd.value = maxLength - ta.value.length;
		}
	}

</script>