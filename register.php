<?php

include 'db.php';

$error = "";

if($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);
    $confirm_password = mysqli_real_escape_string($conn, $_POST['confirm_password']);
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<form method="POST" action="">
        <h2>Create your Account</h2>

      

        <label for="username">Username:</label><br>
        <input value="<?php echo isset($username) ? $username : ''; ?>"  placeholder="Enter your username" type="text" name="username" required><br><br>

        <label for="email">Email:</label><br>
        <input  value="<?php echo isset($email) ? $email : ''; ?>" placeholder="Enter your email"  type="email" name="email" required><br><br>

        <label for="password">Password:</label><br>
        <input placeholder="Enter your password"  type="password" name="password" required><br><br>

        <label for="confirm_password">Confirm Password:</label><br>
        <input  placeholder="Confirm your password" type="password" name="confirm_password" required><br><br>

        <input type="submit" value="Register">
    </form>
</body>
</html>