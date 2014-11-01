<?php
   require_once ("Includes/session.php");
   require_once ("DB/DBCre.php");
   require_once ("DB/connectDB.php");
   include("Includes/header.php");

   if(empty($_SESSION['email'])){
       header("Location: index.php");
    }
    $isAdmin = $_SESSION['isAdmin'];
    $email = ($_SESSION['email']);
         //the parameter is passed by entering the B_Id to the url
     $id = intval($_GET['ID']);          
     $findQuery ="SELECT Email_Address FROM booking_record where B_Id = ?";
     $findStatement = $databaseConnection -> prepare($findQuery);
     $findStatement -> bind_param('i', $id);
     $findStatement -> execute();
     $findStatement -> store_result();
     $findStatement -> bind_result($r_email);
     $findStatement -> fetch();

     //check whether the person is authorized to edit the item
     if($isAdmin==0){       
             if(!($r_email == $email)){
                  header("Location: deleteFail.php");
             }
     }

    $query = "DELETE FROM booking_record where B_Id=?";
 
     $statement = $databaseConnection -> prepare($query);
     $statement -> bind_param('i', $id);
     $statement -> execute();
     $statement -> fetch();

     $deleteWasSuccessful = $statement->affected_rows == 1 ? true : false;
     
     if($deleteWasSuccessful == 1){
       echo "Deleted Sucessfully";
       if($isAdmin==1){
       echo "<script>setTimeout(\"location.href = 'adminMod.php';\",1000);</script>";
       }
       else
       echo "<script>setTimeout(\"location.href = 'userMod.php';\",1000);</script>";
     }
     
  
 
?>
