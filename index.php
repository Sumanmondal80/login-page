<?php
if (isset($_POST['submit'])) {
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $email = $_POST['mail'];
    $mobile = $_POST['phno'];
    // $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
    $password = $_POST['password'];
    $cpassword = $_POST['cpassword'];

    if ($password !== $cpassword) {
        echo "Passwords do not match!";
        // exit();
    }


    $host = 'localhost';
    $user = 'root';
    $pass = '';
    $dbname = 'registration';

    $conn = mysqli_connect($host, $user, $pass, $dbname);
    // userExistance
    $checkemail = "SELECT * FROM userdetails where email='$email'";
    $checkemobile = "SELECT * FROM userdetails where mobile='$mobile'";
    $result1 = mysqli_query($conn, $checkemail);
    $result2 = mysqli_query($conn, $checkemobile);
    if (mysqli_num_rows($result1) > 0) {
        echo "Email already exists!";
    } else if (mysqli_num_rows($result2) > 0) {
        echo " Phone Number already exists!";
    } else {
        $sql = "INSERT INTO userdetails(firstName,lastName,email,mobile,password) values ('$fname','$lname','$email','$mobile','$password')";
        // mysqli_query($conn, $sql);
        if (mysqli_query($conn, $sql)) {
            header("Location: login.php");
            exit();
        } else {
            echo "Error: " . mysqli_error($conn);
        }
    }

}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register Page</title>
    <link rel="stylesheet" href="index.css">
    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-LN+7fdVzj6u52u30Kp6M/trliBMCMKTyK833zpbD+pXdCLuTusPj697FH4R/5mcr" crossorigin="anonymous"> -->
</head>

<body>
    <div class="container">
        <div class="form-box">
            <h2>Register Page</h2>
            <form method="POST" action="">
                <div class="input-field">
                    <label for="fname">First Name:</label>
                    <input type="text" placeholder=" Enter your First Name" id="fname" name="fname" required><br>
                </div>
                <div class="input-field">
                    <label for="lname">Last Name:</label>
                    <input type="text" placeholder="Enter your Last Name" id="lname" name="lname" required><br>
                </div>
                <div class="input-field">
                    <label for="email">Email ID:</label>
                    <input type="email" placeholder="Enter your Email ID" id="mail" name="mail" required><br>
                </div>
                <div class="input-field">
                    <label for="phno">Phone Number:</label>
                    <input type="number" placeholder="Enter your Phone Number" id="phno" name="phno" required><br>
                </div>
                <div class="input-field">
                    <label for="password">Password:</label>
                    <input type="password" placeholder="Enter your Password" id="password" name="password" required><br>
                </div>
                <div class="input-field">
                    <label for="cpassword">Conform Password:</label>
                    <input type="password" placeholder="Conform Password" id="cpassword" name="cpassword" required><br>
                </div>

                <div class="signup-btn">
                    <!-- <label for="signup">SIGNUP</label> -->
                    <input type="submit" name="submit" value="Sign Up">
                </div>
                <p id="message"></p>
            </form>
        </div>

    </div>
    <script>
        document.querySelector("form").addEventListener("submit", function (e) {
            const password = document.getElementById("password").value;
            const cpassword = document.getElementById("cpassword").value;
            const message = document.getElementById("message");

            if (password !== cpassword) {
                e.preventDefault(); // stop form from submitting
                message.style.color = "red";
                message.innerText = "Passwords do not match!";
            } else {
                message.innerText = "";
            }
        });
    </script>
    <script src="index.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ndDqU0Gzau9qJ1lfW4pNLlhNTkCfHzAVBReH9diLvGRem5+R9g2FzA8ZGN954O5Q"
        crossorigin="anonymous"></script>
</body>

</html>