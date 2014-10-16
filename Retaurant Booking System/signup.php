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
        $salutation = $_POST['salutation'];
        $fName = $_POST['fName'];
        $lName = $_POST['lName'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $phoneNum = $_POST['phoneNum'];
        $createdOn = date('Y-m-d H:i:s');

        $query = "INSERT INTO user(Email_Address, First_Name, Last_Name, Salutation, Password, Phone_Number, Created_On) VALUES (?, ?, ?, ?, ?, ?, ?) ";

        $statement = $databaseConnection -> prepare($query);
        $statement -> bind_param('sssssss', $email, $fName, $lName, $salutation, $password, $phoneNum, $createdOn);
        $statement ->execute();
        $statement ->store_result();

        header("Location: index.php");
    }
?>

<div id="main">
    <div>
        <h2>Sign Up to Be Our Member Now!!!</h2>
    </div>
    <form id="signupForm" action="signup.php" method="post" >
        <fieldset>
            <legend>Register</legend>
            <label for="salutation">Salutation:</label>
            <select name="salutation" id="salutation">
                <option value="Dr">Dr</option>
                <option value="Mr">Mr</option>
                <option value="Mrs">Mrs</option>
                <option value="Ms">Ms</option>
            </select>
            <br><br>
            <label for="fName">First Name:</label>
            <input type="text" name="fName" id="fName"/>
            <br><br>
            <label for="lName">Last Name:</label>
            <input type="text" name="lName" id="lName"/>
            <br><br>
            <label for="email">Email Address:</label>
            <input type="text" name="email" id="email"/>
            <br><br>
            <label for="password">Password:</label>
            <input type="password" name="password" id="password"/>
            <br><br>
            <label for="phoneNum">Phone Number:</label>
            <input type="number" name="phoneNum" id="phoneNum"/>
            <br><br>
            <input type="submit" name="submit" id="btnSubmit" value="Submit" onclick="checkEmpty()" />

            <p>
                    <a href="index.php">Cancel</a>
                </p>
        </fieldset>
    </form>

</div>

<?php
    include ("Includes/footer.php");    

?>

<script type="text/javascript">
    $(document).ready(function () {
        $("#signupForm").submit(function (event) {
            if ($("#fName").val().length == 0) {
                alert("First Name is required");
                event.preventDefault();
            }
            else if ($("#lName").val().length == 0) {
                alert("Last Name is required");
                event.preventDefault();
            }
            else if ($("#email").val().length == 0) {
                alert("Email Address is required");
                event.preventDefault();
            }
            else if ($("#password").val().length == 0) {
                alert("Password is required");
                event.preventDefault();
            }
            else if ($("#phoneNum").val().length == 0) {
                alert("Phone Number is required");
                event.preventDefault();
            }
        })
    })
</script>
