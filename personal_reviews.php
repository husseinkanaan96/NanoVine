<?php
    $title='Reviews';
    include_once 'includes/header.php';
    require_once 'db/functions.php';

    if(!isset($_SESSION['username'])){
        header("Location: login.php");
    }
    
    if(!isset($_GET['name'])){
        header("Location: index.php");
    }

    if(isset($_POST['send_review'])){
        $review = $_POST['review'];
        $movie_name = $_GET['name'];
        $user_id = $_SESSION['id'];

        submitReview($review, $movie_name, $user_id);
    }

    $reviews = getReviews($_GET['name']);
?>

<body>
    
    <main>
        <h1 style="color:white;">Reviews for <?php echo $_GET['name'] ?></h1>

        <div class="reviewsContainer">
            <?php foreach($reviews as $review){ ?>
                <div class="review">
                    <p><?php echo $review['first_name'].' '.$review['last_name']; ?></p>
                    <p><?php echo $review['review'] ?></p>
                </div>
            <?php } ?>
        </div>
            
        
        <div class="reviewsContainer">
            <h2 style="color: white; font-weight:300;">Post a Review</h2>
            <form action="personal_reviews.php?name=<?php echo $_GET['name']?>" method="POST" class="reviewForm" style="gap: 30px;">
                <textarea name="review" cols="30" rows="6"></textarea>
                <input type="submit" name="send_review" value="send review">
            </form>
        </div>
    </main>

</body>

<?php include_once 'includes/footer.php'; ?>