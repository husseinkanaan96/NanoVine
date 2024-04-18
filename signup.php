<?php 
    if(isset($_POST['signup'])){
        require_once 'db/functions.php';

        $fn = $_POST['first_name'];
        $ln = $_POST['last_name'];
        $email = $_POST['email'];
        $pass = $_POST['password'];

        $hashed = md5($pass);
        
        create_user($fn, $ln, $email, $hashed);
        $user = getUser($email, $hashed);

        session_start();
        $_SESSION['id'] = $user[0]['account_id'];
        $_SESSION['username'] = $fn . " " . $ln;
        header('Location: index.php');
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="images/icon.png" type="image/icon">
    <link rel="stylesheet" href="style.css">
    <title>Signup</title>
</head>
<body>
    <nav class="index">
        <a href="index.php">Nanovine</a>
    </nav>

    <main class="container">
        <h1 class="title">LOGIN</h1>
        <div>
            <form action="signup.php" method="POST" class="login">
                <input type="text" name="first_name" placeholder="first name">
                <input type="text" name="last_name" placeholder="last name">
                <input type="email" name="email" placeholder="email">
                <input type="password" name="password" placeholder="password">
                <input type="submit" name="signup" value="Sign up">
            </form>
        </div>
        <a style="color: white;" href="login.php">Already have an account ?</a>
    </main>
</body>
</html>