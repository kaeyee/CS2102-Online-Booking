<?php
    require_once ("Includes/session.php");
    require_once ("DB/DBCre.php");
    require_once ("DB/connectDB.php");
    include("Includes/header.php");

    //need to be add after a logout function is done
    //if(!empty($_SESSION['email'])){
    //    header("Location: index.php");
    //}

    if (isset($_POST['submit'])){
        $email = $_POST['email'];
        $password = $_POST['password'];

        $query ="SELECT Last_Name, Email_Address, Is_Admin from user WHERE Email_Address = ? AND Password = ? LIMIT 1";
        $statement = $databaseConnection -> prepare($query);
        $statement -> bind_param('ss', $email, $password);
        $statement -> execute();
        $statement ->store_result();

        if($statement->num_rows ==1)
        {
            // why get last name?
            $statement-> bind_result($_SESSION['lName'], $_SESSION['email'], $_SESSION['isAdmin']);
            $statement -> fetch();
            header("Location:booking.php"); 
        }
        else
        {
            echo "<label class='error'>Email Address/ Password is incorrect!!";
        }
    }
?>
<div id="main">
    <h2>Log In</h2>     
    <form id="loginForm" action="login.php" method="post">
        <fieldset>
            <legend>Login</legend>
            <label for="email">Email Address: </label>
            <input type="text" id="email" name="email" />
            <br><br>
            <label for="password">Password: </label>
            <input type="password" id="password" name="password"/>
            <br><br>
            <input type="submit" id="btnSubmit" value="Submit" name="submit"/>
        </fieldset>
    </form>
</div>
<?php
    include ("Includes/footer.php");    
?>
