<?php 
    $err = 0;

    if(isset($_POST['login'])){
        require_once 'db/functions.php';

        $email = $_POST['email'];
        $pass = $_POST['password'];

        $hashed = md5($pass);

        $user = getUser($email, $hashed);
        
        if($user){
            session_start();
            $_SESSION['username'] = $user[0]['first_name'] . " " . $user[0]['last_name'];
            $_SESSION['id'] = $user[0]['account_id'];
            header('Location: index.php');
        } else {
            $err = 1;
        }
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
    <title>Login</title>
</head>
<body>
    <nav class="index">
        <a href="index.php">Nanovine</a>
    </nav>

    <main class="container">
        <h1 class="title">LOGIN</h1>
        <div>
            <form action="login.php" method="POST" class="login">
                <input type="email" name="email" placeholder="your email...">
                <input type="password" name="password" placeholder="your password...">
                <input type="submit" name="login" value="Login">
            </form>
            <?php if($err){ ?>
                <p class="error">Wrong email or password</p>
            <?php } ?>
        </div>
        <a style="color: white;" href="signup.php">Don't have an account ?</a>
    </main>
</body>
</html>