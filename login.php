<?php



include 'db.php';

session_start();
if(isset($_SESSION['logged_in']) && $_SESSION['logged_in'] === true) {
    header("Location: admin.php");
    exit;

}

$error = "";

if($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = mysqli_real_escape_string($conn, $_POST['username']);    
    $password = mysqli_real_escape_string($conn, $_POST['password']);

    $sql = "SELECT * FROM users WHERE username = '$username' LIMIT 1";
    $result = mysqli_query($conn, $sql);

    if(mysqli_num_rows($result) === 1) {
        $user = mysqli_fetch_assoc($result);

        if(password_verify($password, $user['password'])) {
            $_SESSION['logged_in'] = true;
            $_SESSION['username'] = $user['username'];
            header("Location: admin.php");
            exit;
        } else {
            $error = "Invalid password";
        }
        

    } else {
        $error = "Invalid username";

    }
    


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

<h2>Login</h2>

<?php if($error): ?>

<p style="color:red">
    <?php echo $error; ?>
</p>

<?php endif; ?>


<form method="POST" action="">      

        <label for="username">Username:</label><br>
        <input value="<?php echo isset($username) ? $username : ''; ?>"  placeholder="Enter your username" type="text" name="username" required><br><br>
        
        <label for="password">Password:</label><br>
        <input placeholder="Enter your password"  type="password" name="password" required><br><br>       

        <input type="submit" value="Login">
    </form>
</body>
</html>

<?php
mysqli_close($conn);
?>