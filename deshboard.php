<?php
session_start();

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Deshboard</title>
    <link rel="stylesheet" href="deshboard.css">
</head>
<body>
    <div>
         <h2>Deshboard</h2>
        <h4>Welcome <?php echo htmlspecialchars($_SESSION['first_name']); ?> <?php echo htmlspecialchars($_SESSION['last_name']); ?> to Desboard </h4>
        <h4>Your Email ID is: <?php echo htmlspecialchars($_SESSION['email']); ?></h4>
        <h4>Your Mobile Number is: <?php echo htmlspecialchars($_SESSION['mobile_number']); ?></h4>
        <!--<h4>Welcome <?php echo htmlspecialchars($_SESSION['username']); ?> to Desboard </h4> -->
    </div>
</body>
</html> 