<?php include 'includes/header.php' ?>

    <?php include 'card.php' ?>
    <?php include 'includes/navbar.php' ?>

    <div class="container">

        <div class="row">

            <div class="col-md-8">
                <?php include 'includes/content.php'?>
            </div>

            <div class="col-md-4">

                <?php include 'includes/sidebar.php'?>

            </div>

        </div>

        <hr>
    <?php
    if(isset($_SESSION['username'])) {

        if (isset($_GET['p_id'])) {

            $url_post_id = $_GET['p_id'];

            echo "<h1 href='admin/posts.php?source=edit_post&p_id={$url_post_id}'>Edit Post</h1>";

        }
    }
    ?>

       <?php include "includes/footer.php"; ?>