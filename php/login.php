<?php
session_start();
include_once("dbconnect.php");
if (isset($_POST['submit'])) {
$email = trim($_POST['email']);
$password = trim(sha1($_POST['password']));
$sqllogin = "SELECT * FROM tbl_user WHERE email = '$email' AND password = '$password'";

$select_stmt = $conn->prepare($sqllogin);
$select_stmt->execute();
$row = $select_stmt->fetch(PDO::FETCH_ASSOC);
if ($select_stmt->rowCount() > 0) {
    $_SESSION["session_id"] = session_id();
    $_SESSION["email"] = $email;
    $_SESSION["name"] = $row['name'];
    echo "<script> alert('Login successful')</script>";
    echo "<script> window.location.replace('../php/welcome.php')</script>";
} else {
    session_unset();
    session_destroy();
    echo "<script> alert('Login failed')</script>";
    echo "<script> window.location.replace('../php/login.php')</script>";
}
}
?>

<!DOCTYPE html>
<html>

<head>
    <title>Login Form</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="../js/validate.js"></script>
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
</head>

<body>
    <div class="header">
        <img src="../image/logo1.png" align="left" hspace="40">
        <!--Logo-->
        <h1>Sweet World Enterprise</h1>
    </div>

    <div class="w3-bar w3-deep-purple w3-large">
        <!--Top navigation bar-->
        <a href="../index.html" class="w3-bar-item w3-button">Home</a>
        <a href="#news" class="w3-bar-item w3-button">Products</a>
        <a href="#contact" class="w3-bar-item w3-button">Contact</a>
        <a href="login.html" class="w3-bar-item w3-button w3-right">Login</a>
        <a href="register.php" class="w3-bar-item w3-button w3-right">Register</a>
    </div>
    <div class="main">
        <div class="container">
            <form name="loginForm" action="../php/login.php" onsubmit="return validateLoginForm()" method="post">
                <!--Login validation-->
                <h2>Login</h2>
                <center>
                    <img
                        src="https://www.seekpng.com/png/full/138-1387775_login-to-do-whatever-you-want-login-icon.png">
                    <!--Login Icon-->
                </center>

                <div class="row">
                    <div class="col-25">
                        <label for="email">Email</label>
                        <!--Email-->
                    </div>
                    <div class="col-75">
                        <input type="text" id="idemail" name="email" placeholder="e.g xxx123@gmail.com">
                    </div>
                </div>

                <div class="row">
                    <div class="col-25">
                        <label for="password">Password</label>
                        <!--Password-->
                    </div>
                    <div class="col-75">
                        <input type="password" id="idpassword" name="password" placeholder="Password">
                    </div>
                </div>

                <div class="form-group">
                    <input class="submit" type="submit" name="submit" value="Login">
                    <!--Login Button-->
                </div>

                <br>
                Don't have an account? <a href="../html/register.html" class="register">Register Now</a>
                <!--Link to Register Page-->
            </form>
        </div>
    </div>

    <div class="w3-container w3-deep-purple w3-center">
        <!--Bottom navigation bar-->
        <p class="w3-large">Created by Tan Ivy. &copy; 2021</p>
    </div>
</body>

</html>