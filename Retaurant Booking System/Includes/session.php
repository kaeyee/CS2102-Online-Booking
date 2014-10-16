<?php
    session_start();
    require_once ("DB/connectDB.php");

    function logged_on()
    {
        return isset($_SESSION['lName']);   
    }

    function is_admin()
    {
        global $databaseConnection;
        $query ="SELECT Is_Admin FROM user WHERE Email_Address = ? LIMIT 1";
        $statement = $databaseConnection -> prepare($query);
        $statement-> bind_param('s', $_SESSION['email']);
        $statement-> execute();
        $result= $statement-> get_result();
        return $result;
    }
?>