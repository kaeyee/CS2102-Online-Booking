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

        $query = "SELECT * FROM edit";
        $statement = $databaseConnection -> prepare($query);
        $statement -> execute();
        $statement -> bind_result($B_Id, $Email_Address, $Modified_On);

       
            // create table's titles
            echo '<table align="left" cellspacing="5" cellpadding="8">
            <tr>
                <td align="left"><b>B_Id</b></td>
                <td align="left"><b>Email_Address</b></td>
                <td align="left"><b>Modified_On</b></td>
            </tr>'; 
        
        while($statement -> fetch()){
            echo'<tr><td align="left">' .
                $B_Id             . '</td><td align="left">' .
                $Email_Address    . '</td><td align="left">' .
                $Modified_On      . '</td><td align="left">' ;

                echo '</tr>';
        }
        echo '</table>';

?>
