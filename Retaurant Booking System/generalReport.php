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
        This report includes all the booking records of customers on each date and each location.
    </div>
    <hr/>
    <div>
        <div>
        <table align="left" cellspacing="5" cellpadding="8">
            <tr>
                <th>Email Address</th>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Phone Number</th>
                <th>Location</th>
                <th>Date</th>
                <th>Total Number of Table</th>
            </tr>
            <?php
                $query = "SELECT
	                            A.Email_Address,
	                            First_Name,
	                            Last_Name,
	                            Phone_Number,
	                            Location,
	                            Date,
	                            SUM(No_Table) As Total_Table
                            FROM
	                            booking_record A,
	                            user B
                            WHERE 
	                            A.Email_Address = B.Email_Address
                            GROUP BY
	                            A.Email_Address,
	                            First_Name,
	                            Last_Name,
	                            Phone_Number,
	                            Location,
	                            Date
                            ORDER by
	                            A.Email_Address;";
                $statement = $databaseConnection ->prepare($query);
                $statement -> bind_param('s',  $email);
                $statement -> execute();
                $statement -> bind_result( $email, $fName, $lName, $pNum, $location, $date, $totalTable);
                while($statement ->fetch()){
                    echo "<tr>";
                    echo "<td align='center'>".$email."</td>";
                    echo "<td align='center'>".$fName."</td>";
                    echo "<td align='center'>".$lName."</td>";
                    echo "<td align='center'>".$pNum."</td>";
                    echo "<td align='center'>".$location."</td>";
                    echo "<td align='center'>".$date."</td>";
                    echo "<td align='center'>".$totalTable."</td>";
                    echo "</td>";
                    echo "</tr>";
                }
        ?>
        </table>
        </div>
        
        
    </div>
</div>
