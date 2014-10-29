<?php
    require_once ("Includes/session.php");
    require_once ("DB/DBCre.php");
    require_once ("DB/connectDB.php");
    include("Includes/header.php");
?>
<div>
    This record has passed, It can't be edited! Redirecting to Edit Page in 3 seconds.
    
</div>

<?php
 if($isAdmin==1){
                     echo "<script>setTimeout(\"location.href = 'adminMod.php';\",1800);</script>";
                }else{
                     echo "<script>setTimeout(\"location.href = 'userMod.php';\",1800);</script>";
                }
?>