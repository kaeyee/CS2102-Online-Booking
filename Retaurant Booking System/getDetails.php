<?php
    require_once ("Includes/session.php");
    require_once ("DB/DBCre.php");
    require_once ("DB/connectDB.php");

    $email = $_SESSION['email'];
    $query = "SELECT First_Name, Last_Name, Phone_Number FROM user WHERE Email_Address =? LIMIT 1";
    $statement = $databaseConnection -> prepare($query);
    $statement -> bind_param('s', $email);
    $statement -> execute();
    $statement -> store_result();

    if($statement -> num_rows == 1){
        $statement -> bind_result($fName, $lName, $phoneNum);
        $statement -> fetch();

        $arr = array('email'=> $email, 'fName'=> $fName, 'lName'=>$lName, 'phoneNum'=> $phoneNum);
    echo json_encode($arr);
    }
?>
