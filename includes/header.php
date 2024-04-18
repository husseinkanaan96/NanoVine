<?php 
    session_start(); 
    function getCurrentPage(){
        return  substr($_SERVER["SCRIPT_NAME"],strrpos($_SERVER["SCRIPT_NAME"],"/")+1);
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <!-- icon -->
    <link rel="icon" href="images/icon.png" type="image/icon">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

    <title>NanoVine | <?php echo $title; ?></title>
</head>

<body>
    <header>
        <div class="navContainer">
            <div>
                <?php if(!isset($_SESSION['username'])){ ?>
                    <a href="login.php" class="log"><p>Login | Signup</p></a>
                <?php } else { ?>
                    <div class="userContainer">
                        <i class="fa fa-user-o user" aria-hidden="true"></i>
                        <p><?php echo $_SESSION['username'] ?></p>
                    </div>
                <?php } ?>
            </div>
            
            <?php if(getCurrentPage() != 'personal_reviews.php'){ ?>
                <form  id="form">
                    <input type="text" placeholder="Search" id="search" class="search">
                </form>
            <?php } else { ?>
                <div onclick="window.location.href='index.php'" class="home">
                    <i class="fa fa-home" aria-hidden="true"></i>
                    <p >NanoVine</p>
                </div>
            <?php } ?>
        </div>
        
    </header>
