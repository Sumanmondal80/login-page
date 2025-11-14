<?php
session_start();

include "db.php";

if (isset($_POST['login'])) {
    $email = $_POST['login_email'];
    $password = $_POST['login-password'];



    $sql = "SELECT * FROM userdetails WHERE email='$email'";
    $result = mysqli_query($conn, $sql);

    if ($row = mysqli_fetch_assoc($result)) {
        if (($password === $row['password'])) {
            // $_SESSION['userid'] = $row['id'];
            $_SESSION['email'] = $row['email'];
            $_SESSION['first_name'] = $row['firstName'];
            $_SESSION['last_name'] = $row['lastName'];
            $_SESSION['mobile_number'] = $row['mobile'];
            header("Location: deshboard.php");
            exit();
        } else {
            echo " Incorrect password.";
        }
    } else {
        echo " User not found.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
    <link rel="stylesheet" href="login.css">
</head>

<body>
    <div class="container">
        <div class="form-box">
            <h2>Login</h2>
            <form method="POST" action="">
                <div class="input-group">
                    <div class="input-field">
                        <label for="login-email">Email:</label>
                        <input type="email" id="login_email" name="login_email" placeholder="Enter your email ID"
                            required><br>
                    </div>
                    <div class="input-field">
                        <label for="login-password">Password:</label>
                        <input type="password" id="login-password" name="login-password" placeholder="Enter Password"
                            required><br>
                    </div>
                    <div class="btn">
                        <a href="index.php" class="signup-btn">SignUp</a>
                        <!-- <button type="button" name="login" class="login-btn" onclick="login()">Login</button> -->
                        <button type="submit" name="login" class="login-btn">Login</button>
                    </div>
                </div>
            </form>
            <p id="message"></p>
        </div>
    </div>
    <script src="index.js"></script>
</body>

</html>