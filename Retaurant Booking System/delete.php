<?php
   require_once ("Includes/session.php");
   require_once ("DB/DBCre.php");
   require_once ("DB/connectDB.php");
   include("Includes/header.php");

   if(empty($_SESSION['email'])){
       header("Location: index.php");
    }
 //   if($_POST['id'])

   // $id=$_POST['id'];
    $id = intval($_GET['ID']); 
    echo $id;
    $query = "DELETE FROM booking_record where B_Id=?";
 
     $statement = $databaseConnection -> prepare($query);
     $statement -> bind_param('i', $id);
     $statement -> execute();
     $statement -> fetch();

     $deleteWasSuccessful = $statement->affected_rows == 1 ? true : false;
     
     if($deleteWasSuccessful == 1){
       echo "Deleted Sucessfully";
       echo "<script>setTimeout(\"location.href = 'adminMod.php';\",1000);</script>";
     }
     
  
 
?>
