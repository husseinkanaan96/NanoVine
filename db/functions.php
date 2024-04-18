<?php 

    function connection(){
        $host = 'localhost';
        $user = 'root';
        $pass = '';
        $database = 'movieapp';
        $db = new mysqli($host, $user, $pass, $database);
        return $db;
    }

    if (mysqli_connect_errno()) {
        echo '<p>Error: Could not connect to database.<br/>
        Please try again later.</p>';
        exit;
    }

    function create_user($fn, $ln, $email, $pass){
        $db = connection();
        $query = "INSERT INTO accounts (`first_name`, `last_name`, `email`, `password`)
                  VALUES ('$fn', '$ln', '$email', '$pass')";
        $stmt = $db->query($query);
        return $stmt;
    }

    function getUser($email, $pass){
        $query = "SELECT * FROM accounts WHERE email = '$email' AND password = '$pass'";
        $db = connection();
        return $db->query($query)->fetch_all(MYSQLI_ASSOC);
    }

    function getReviews($name){
        $query = "SELECT distinct r.review, a.first_name, a.last_name
                  FROM reviews r, accounts a WHERE movie_name = '$name'
                  AND a.account_id = r.user_id";
        $db = connection();
        return $db->query($query)->fetch_all(MYSQLI_ASSOC);
    }

    function submitReview($review, $movie_name, $user_id){
        $db = connection();
        $query = "INSERT INTO reviews (`review`, `movie_name`, `user_id`)
                  VALUES ('$review', '$movie_name', $user_id)";
        $stmt = $db->query($query);
        return $stmt;
    }
?>