<?php
    $title='Home';
    include_once 'includes/header.php';
?>

<div id="tags"></div>

<div id="myNav" class="overlay">

    <!-- Button to close the overlay navigation -->
    <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
    
    <!-- Overlay content containing trailers-->
    <div class="overlay-content" id="overlay-content"></div>
    
    <a href="javascript:void(0)" class="arrow left-arrow" id="left-arrow">&#8656;</a> 
    
    <a href="javascript:void(0)" class="arrow right-arrow" id="right-arrow" >&#8658;</a>

    </div>
<main id="main"></main>

<div class="pagination">
    <div class="page" id="prev">Previous Page</div>
    <div class="current" id="current">1</div>
    <div class="page" id="next">Next Page</div>

</div>

<script src="script.js"></script>


<?php include_once 'includes/footer.php'; ?>