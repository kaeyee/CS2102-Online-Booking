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
    <div>
        &nbsp;
    </div>
    <div>
       <h1>Report for Booking Record:</h1> 
        This report includes all the booking records of a location on a specific date.
    </div>
    <hr/>
    <div>
        &nbsp;
    </div>
    <div>
        <div>
            <form id="searchForm" action="reportByLocation.php" method="post">
                <fieldset>
                    <legend>Generate Report for Booking Record based on Location</legend>
                     <label for="location">Location: </label>
                        <select name="location" id="location">
                            <option value="" disabled>Select Location</option>
                            <?php
                            $query = "SELECT location FROM restaurant";
                            $statement = $databaseConnection ->prepare($query);
                            $statement -> execute();
                            $result = $statement->get_result();
                            while($row = $result ->fetch_array(MYSQLI_NUM)) 
                            {
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
        </div>
        <div>
            <?php
             if (isset($_POST['submit']))
            {
                echo "<h2>Report for ".$_POST['location']." </h2>";
            }
            ?>
        </div>
        <div>
        <table align="left" cellspacing="5" cellpadding="8">
            <tr>
                <th>Date</th>
                <th>Time</th>
                <th>Total Number of Table</th>
            </tr>
            <?php
             if (isset($_POST['submit']))
            {
                $location = $_POST['location'];
                $query = "SELECT
	                            Date,
	                            Time,
	                            SUM(No_Table) As Total_Table
                            FROM
	                            booking_record
                            WHERE
	                            Location =?
                            GROUP BY
	                            Date,
	                            Time
                            ORDER BY
	                            Date,
                                Time;";

                $statement = $databaseConnection ->prepare($query);
                $statement -> bind_param('s',  $location);
                $statement -> execute();
                $statement -> bind_result( $date, $time, $totalTable);
                while($statement ->fetch()){
                    echo "<tr>";
                    echo "<td align='center'>".$date."</td>";
                    echo "<td align='center'>".$time."</td>";
                    echo "<td align='center'>".$totalTable."</td>";
                    echo "</td>";
                    echo "</tr>";
                }
            }
        ?>
        </table>
        </div>
        
        
    </div>
</div>
